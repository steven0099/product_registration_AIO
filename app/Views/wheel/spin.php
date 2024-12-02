<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spin the Wheel</title>
    <script src="https://cdn.jsdelivr.net/npm/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <h1>Spin the Wheel</h1>
    <canvas id="wheelCanvas" width="500" height="500" style="border: 2px solid black;"></canvas>
    <button id="spinButton">Spin</button>
    <p id="result"></p>

    <script>
        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
        let wheelSegments = [];


        // Fetch wheel segments from the backend
        fetch('/wheel/getSegments')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched Data:', data); // Log the response data to verify the format
                
                if (Array.isArray(data) && data.length > 0) {
                    wheelSegments = data;
                    drawWheel(); // Call drawWheel only if segments are valid
                } else {
                    console.error('Invalid data format, expected an array of segments');
                }
            })
            .catch(error => {
                console.error('Error fetching segments:', error);
            });

        function drawWheel() {
            if (wheelSegments.length === 0) {
                console.error('No segments to draw');
                return;
            }

            const totalOdds = wheelSegments.reduce((sum, segment) => sum + segment.odds, 0);
            let startAngle = 0;

            console.log('Drawing Wheel...'); // Log to ensure the function is being called

            wheelSegments.forEach((segment, index) => {
                const segmentAngle = (segment.odds / totalOdds) * (Math.PI * 2); // Angle based on odds
                drawSegment(startAngle, segmentAngle, segment, index); // Draw the segment
                startAngle += segmentAngle; // Increment start angle for the next segment
            });

            // Draw the pointer after drawing the segments
            drawPointer();
        }

        function drawSegment(startAngle, segmentAngle, segment, index) {
            const centerX = canvas.width / 2;
            const centerY = canvas.height / 2;
            const radius = canvas.width / 2;

            // Alternate colors based on index (odd vs. even)
            const segmentColor = (index % 2 === 0) ? "#FF6347" : "#4682B4"; // Red for even, Blue for odd

            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, startAngle, startAngle + segmentAngle);
            ctx.lineTo(centerX, centerY);
            ctx.fillStyle = segmentColor; // Set the color for the segment
            ctx.fill();

            // Draw the label inside the segment
            ctx.save();
            ctx.translate(centerX, centerY);
            ctx.rotate(startAngle + segmentAngle / 2);
            ctx.textAlign = "center";
            ctx.fillStyle = "white";
            ctx.font = "16px Arial";
            ctx.fillText(segment.label || "No Label", radius / 2, 0); // Handle cases where label is empty
            ctx.restore();
        }

        function drawPointer() {
            const centerX = canvas.width / 2;
            const centerY = 10; // Position the pointer above the wheel
            const pointerSize = 20; // Size of the pointer

            ctx.beginPath();
            ctx.moveTo(centerX - pointerSize, centerY);
            ctx.lineTo(centerX + pointerSize, centerY);
            ctx.lineTo(centerX, centerY - pointerSize);
            ctx.closePath();
            ctx.fillStyle = "red"; // Pointer color
            ctx.fill();
        }

        document.getElementById('spinButton').addEventListener('click', () => {
            if (spinning) return;

            spinning = true;
            spinAnimation(); // Start spinning the wheel

            fetch('/spinwheel/spin')
                .then(response => response.json())
                .then(data => {
                    console.log('Spin result:', data); // Log the data to check its contents
                    if (data && data.label) {
                        document.getElementById('result').textContent = `You won: ${data.label}`;
                    } else {
                        document.getElementById('result').textContent = 'Sorry, try again!';
                    }
                })
                .catch(err => {
                    console.error('Error spinning wheel:', err);
                    document.getElementById('result').textContent = 'Error occurred!';
                });

            setTimeout(() => {
                spinning = false;
            }, 3000); // Spin duration
        });

        let rotationAngle = 0;
        let targetAngle = 0;
        let spinDuration = 3000; // Duration of the spin in milliseconds
        let spinning = false;

        function spinAnimation() {
            if (spinning) return; // Prevent multiple spins at once

            spinning = true;
            const spinSpeed = Math.PI / 20; // Rotation speed (adjust as needed)
            let startTime = Date.now();

            // Set a random target angle based on the total odds (simulating stopping point)
            targetAngle = (Math.random() * (Math.PI * 2)) + (Math.PI * 4); // A multiple of full rotations for randomness

            function animate() {
                const elapsedTime = Date.now() - startTime;
                const progress = Math.min(elapsedTime / spinDuration, 1); // Ensure progress is between 0 and 1

                // Rotate the wheel based on the spin speed and progress
                rotationAngle = spinSpeed * progress + targetAngle * (1 - progress); // Easing effect

                // Redraw the wheel with the updated rotation
                drawWheel();

                if (progress < 1) {
                    requestAnimationFrame(animate); // Continue the animation
                } else {
                    // When animation ends, align the pointer and update the result
                    alignPointerToSegment();
                    spinning = false;
                }
            }

            animate();
        }

        function alignPointerToSegment() {
            const wheelCenter = canvas.width / 2;
            const segmentAngle = (2 * Math.PI) / wheelSegments.length;
            const pointerOffset = rotationAngle % (Math.PI * 2);

            // Calculate the index of the segment that corresponds to the stopping position
            const stoppingIndex = Math.floor(pointerOffset / segmentAngle);
            const selectedSegment = wheelSegments[stoppingIndex];

            // Update result based on the stopping segment
            document.getElementById('result').textContent = `You won: ${selectedSegment.label}`;
        }
    </script>
</body>
</html>

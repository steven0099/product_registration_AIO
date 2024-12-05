<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin the Wheel - AIO</title>
    <style>
        canvas {
            display: block;
            margin: 20px auto;
            background-color: #ffffff;
        }

        button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        #result {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
</head>

<body>
    <h1 style="text-align: center;">Spin the Wheel</h1>
    <canvas id="wheelCanvas" width="500" height="500"></canvas>
    <button id="spinButton">Spin</button>
    <p id="result"></p>

    <!-- Spin sound -->
    <audio id="spinSound" src="/audio/spin-sfx.mp3"></audio>

    <!-- Prize sound -->
    <audio id="prizeSound" src="/audio/prize-sfx.mp3"></audio>

    <script>
        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
        const spinButton = document.getElementById('spinButton');
        const resultDisplay = document.getElementById('result');
        const spinSound = document.getElementById('spinSound');
        const prizeSound = document.getElementById('prizeSound');

        let isSpinning = false;
        let rotationAngle = 0;
        let spinVelocity = 0;
        let segments = [];
        let totalOdds = 0;
        let equalAngle = 2 * Math.PI / segments.length; // Angle per segment, defined globally

        // Draw the wheel with proportional segments
        function drawWheel() {
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const radius = Math.min(centerX, centerY) - 10; // Adjust radius for spacing
        const equalAngle = 2 * Math.PI / segments.length; // Each segment gets an equal angle

        ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas before redrawing

        let currentAngle = rotationAngle; // Start at the current rotation angle

        segments.forEach((segment, index) => {
            ctx.beginPath();
            ctx.moveTo(centerX, centerY); // Move to the center
            ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + equalAngle); // Draw the segment
            ctx.closePath();

            // If there's an image, clip it into the segment
            if (segment.imgElement) {
                ctx.save();
                ctx.clip(); // Clip the image to the segment
                const imgSize = radius * 2; // Adjust image size to segment size
                ctx.drawImage(segment.imgElement, centerX - radius, centerY - radius, imgSize, imgSize);
                ctx.restore();
            } else {
                ctx.fillStyle = '#0daff0'; // Default fill color for segment without an image
                ctx.fill();
            }

            ctx.stroke(); // Outline the segment

            // Draw text label in the center of the segment
            ctx.save();
            ctx.translate(centerX, centerY);
            ctx.rotate(currentAngle + equalAngle / 2);
            ctx.textAlign = "center";
            ctx.fillStyle = "white";
            ctx.fillText(segment.label, radius / 2, 10); // Label in the middle of the segment
            ctx.restore();

            currentAngle += equalAngle; // Update angle for the next segment
        });

        drawPointer(); // Draw the pointer after drawing segments
    }

        // Draw the pointer
        function drawPointer() {
            const centerX = canvas.width / 2;
            const pointerHeight = 20;

            ctx.beginPath();
            ctx.moveTo(centerX - pointerHeight, 10);
            ctx.lineTo(centerX + pointerHeight, 10);
            ctx.lineTo(centerX, pointerHeight + 10);
            ctx.closePath();
            ctx.fillStyle = 'red';
            ctx.fill();
        }

        function preloadImages(segments, callback) {
    let loadedCount = 0;
    const totalImages = segments.filter(s => s.image).length;

    if (totalImages === 0) {
        console.log("No images to preload.");
        callback(); // Proceed even if no images are present
        return;
    }

    segments.forEach(segment => {
        if (segment.image) {
            const img = new Image();
            img.src = `/uploads/images/${segment.image}`; // Correct path
            img.onload = () => {
                segment.imgElement = img; // Store the loaded image
                console.log(`Loaded image: ${segment.image}`); // Log when an image is loaded
                loadedCount++;
                if (loadedCount === totalImages) {
                    callback(); // All images loaded
                }
            };
            img.onerror = () => {
                console.error(`Failed to load image: ${segment.image}`);
                loadedCount++; // Increment even on error to avoid deadlock
                if (loadedCount === totalImages) {
                    callback(); // Proceed even if images failed to load
                }
            };
        } else {
            loadedCount++; // No image for this segment, just increment the count
            if (loadedCount === totalImages) {
                callback();
            }
        }
    });
}


        function loadSegments(newSegments) {
            segments = newSegments.map(segment => ({
                label: segment.label,
                odds: parseFloat(segment.odds),
                image: segment.image
            }));

            totalOdds = segments.reduce((sum, segment) => sum + segment.odds, 0);

            if (totalOdds === 0) {
                console.error("No valid segments to display on the wheel: Total odds is 0.");
                return;
            }

            preloadImages(segments, () => {
                console.log("All images preloaded. Drawing the wheel.");
                drawWheel();
            });
        }

        // Spin the wheel with fixed duration of 10 seconds
// Spin the wheel with fixed duration of 5 seconds (faster)
function spinWheel() {
    if (isSpinning) return;
    isSpinning = true;

    spinSound.play(); // Play spin sound

    const duration = 10; // Reduce duration to 5 seconds for faster spin
    const totalRotation = 10 * Math.PI * 30; // 5 full rotations
    const totalTime = duration * 1000; // Convert to milliseconds

    // Calculate spin velocity and deceleration
    const initialVelocity = totalRotation / totalTime;  // Initial spin speed
    let startTime = Date.now();
    let deceleration = initialVelocity / totalTime;

    function animate() {
        const elapsed = Date.now() - startTime;
        if (elapsed < totalTime) {
            rotationAngle += initialVelocity - deceleration * elapsed; // Adjust rotation angle
            drawWheel(); // Draw the wheel with new rotation angle
            requestAnimationFrame(animate);
        } else {
            isSpinning = false;
            rotationAngle += totalRotation; // Ensure it completes the final rotation
            drawWheel(); // Final wheel drawing
            playPrizeSound(); // Play prize sound when wheel stops
            displayResult(); // Show result when the spin is finished
        }
    }

    animate();
}

        // Play the prize sound when the wheel stops
        function playPrizeSound() {
            prizeSound.play();
        }

        // Display the selected result after the wheel stops
        function displayResult() {
            const selectedSegment = getSelectedSegment();
            if (selectedSegment) {
                resultDisplay.textContent = `Selamat, Anda Mendapatkan ${selectedSegment.label}!`;
            } else {
                resultDisplay.textContent = "No segments selected";
            }
        }

        function getSelectedSegment() {
            const normalizedAngle = (rotationAngle % (2 * Math.PI) + 2 * Math.PI) % (2 * Math.PI);
            let cumulativeAngle = 0;
            for (let segment of segments) {
                const segmentAngle = (2 * Math.PI * segment.odds) / totalOdds;
                cumulativeAngle += segmentAngle;

                if (normalizedAngle >= cumulativeAngle - segmentAngle && normalizedAngle < cumulativeAngle) {
                    return segment;
                }
            }
            return null;
        }

        // Add event listener to spin button
        spinButton.addEventListener('click', spinWheel);

        // Fetch segments from the backend
        fetch('/wheel/getSegments')
            .then(response => response.json())
            .then(data => {
                console.log("Fetched segments data:", data);
                if (data && Array.isArray(data)) {
                    loadSegments(data);
                } else {
                    console.error("Failed to load segments: Invalid format or empty data");
                }
            })
            .catch(error => {
                console.error("Error fetching segments:", error);
            });
    </script>
</body>

</html>

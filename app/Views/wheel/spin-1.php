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

        #resultModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        #modalContent {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #modalContent h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        #modalContent button {
            padding: 10px 20px;
            background-color: #0daff0;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        #modalContent button:hover {
            background-color: #007bbd;
        }
    </style>
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
</head>

<body style="background-color: #00aff0">
    <div class="header-container" style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
        <img src="/images/spin-head.jpeg" alt="Header" style="height:100px; width:500px;">
    </div>

    <div class="wheel-container" style="display: flex; justify-content: center; align-items: center; position: relative;">
        <!-- Left Image -->
        <img src="/images/afe-3.png" alt="Left Image" class="side-image" style="position: absolute; left: 100px; height: 40px; width: 200px;">

        <!-- Wheel Canvas -->
        <canvas id="wheelCanvas" width="500" height="525"></canvas>

        <!-- Right Image -->
        <img src="/images/afe-3.png" alt="Right Image" class="side-image" style="position: absolute; right: 100px; height: 40px; width: 200px;">
    </div>

    <div id="resultModal">
        <div id="modalContent">
            <h2 id="modalPrize"></h2>
        </div>
    </div>
</body>


    <!-- Spin sound -->
    <audio id="spinSound" src="/audio/spin-sfx.mp3"></audio>

    <!-- Prize sound -->
    <audio id="prizeSound" src="/audio/prize-sfx.mp3"></audio>

    <script>
        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
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
    const outerRadius = radius - 30; // Outer radius for image placement
    const equalAngle = 2 * Math.PI / segments.length; // Each segment gets an equal angle

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas before redrawing

    let currentAngle = rotationAngle; // Start at the current rotation angle

    // Add shadow to the border
    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)'; // Shadow color (black with transparency)
    ctx.shadowBlur = 10; // Blur effect for the shadow
    ctx.shadowOffsetX = 3; // Horizontal offset of the shadow
    ctx.shadowOffsetY = 3; // Vertical offset of the shadow

    // Draw the white border around the wheel
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius + 1, 0, 2 * Math.PI); // Outer circle (border)
    ctx.lineWidth = 10; // Set line width for the border
    ctx.strokeStyle = '#fff'; // Set border color to white
    ctx.stroke();
    ctx.lineWidth = 1; // Reset line width for subsequent drawings

    // Remove shadow after border
    ctx.shadowColor = 'transparent'; 

    segments.forEach((segment, index) => {
        // For the first segment, choose a random color between blue and #fdce26
        let color;
        if (index === 0) {
            color = 'blue'; // Randomly pick between blue and #fdce26
        } else {
            // Default color assignment for the rest of the segments
            switch (index % 3) {
                case 0:
                    color = '#fd2654'; // Red
                    break;
                case 1:
                    color = '#fdce26'; // Yellow
                    break;
                case 2:
                    color = 'blue'; // Blue
                    break;
            }
        }

        // Draw the segment with the determined color
        ctx.beginPath();
        ctx.moveTo(centerX, centerY); // Move to the center
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + equalAngle); // Draw the segment
        ctx.closePath();

        ctx.fillStyle = color; // Set the color dynamically
        ctx.fill(); // Fill the segment
        ctx.stroke(); // Outline the segment

        // If there's an image, draw it as a circle at the outer tip of the segment
        if (segment.imgElement) {
            const imgSize = 40; // Size of the image (adjustable)
            const imgX = centerX + Math.cos(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;
            const imgY = centerY + Math.sin(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;

            // Draw the image at the outer tip of the segment
            ctx.save();
            // Clip the image into a circle
            ctx.beginPath();
            ctx.arc(imgX + imgSize / 2, imgY + imgSize / 2, imgSize / 2, 0, 2 * Math.PI);
            ctx.clip(); // Clip to circular area

            ctx.drawImage(segment.imgElement, imgX, imgY, imgSize, imgSize);
            ctx.restore();
        }

        currentAngle += equalAngle; // Update angle for the next segment
    });

    // Draw the small center circle (for placing an image later)
    const centerCircleRadius = 30; // Adjust size of the center circle
    ctx.beginPath();
    ctx.arc(centerX, centerY, centerCircleRadius, 0, 2 * Math.PI); // Draw the circle at the center
    ctx.fillStyle = '#fff'; // Fill with white (or any color)
    ctx.fill();
    ctx.lineWidth = 3; // Border thickness
    ctx.stroke(); // Draw the border for the circle

    drawPointer(); // Draw the pointer after drawing segments
}

function drawPointer() {
    const centerX = canvas.width / 2;
    const pointerHeight = 20;
    const pointerOffset =  5; // Distance the pointer is placed outside the wheel
    const borderThickness = 5; // Thicker border

        ctx.shadowColor = 'rgba(0, 0, 0, 0.5)'; // Shadow color (black with transparency)
    ctx.shadowBlur = 10; // Blur effect for the shadow
    ctx.shadowOffsetX = 3; // Horizontal offset of the shadow
    ctx.shadowOffsetY = 3; // Vertical offset of the shadow
    // Draw the white border first
    ctx.beginPath();
    ctx.moveTo(centerX - pointerHeight - borderThickness, pointerOffset - borderThickness); // Offset for border
    ctx.lineTo(centerX + pointerHeight + borderThickness, pointerOffset - borderThickness); // Offset for border
    ctx.lineTo(centerX, pointerHeight + pointerOffset + borderThickness); // Offset for border
    ctx.closePath();
    ctx.fillStyle = '#fff'; // White border color
    ctx.fill();

    // Now fill the pointer with red color (adjusted to fit inside the border)
    ctx.beginPath();
    ctx.moveTo(centerX - pointerHeight, pointerOffset - 2); // Original pointer position
    ctx.lineTo(centerX + pointerHeight, pointerOffset -2); // Original pointer position
    ctx.lineTo(centerX, pointerHeight + pointerOffset); // Original pointer position
    ctx.closePath();
    ctx.fillStyle = '#f00'; // Red pointer color
    ctx.fill();

    ctx.shadowColor = 'transparent'; 

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

    spinSound.play();

    const duration = 10000; // Spin for 5 seconds
    const randomExtraRotation = Math.random() * 2 * Math.PI; // Randomize final position
    const totalRotation = 10 * 2 * Math.PI + randomExtraRotation; // 10 full spins + random
    const startTime = Date.now();

    function animate() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1); // Clamp progress to [0, 1]

        // Apply an "ease-out" effect for smooth deceleration
        const easedProgress = 1 - Math.pow(1 - progress, 3); // Ease-out cubic function
        rotationAngle = easedProgress * totalRotation;

        drawWheel();

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            isSpinning = false;
            rotationAngle = (rotationAngle % (2 * Math.PI) + 2 * Math.PI) % (2 * Math.PI); // Normalize angle
            drawWheel();
            playPrizeSound();
            displayResult();
        }
    }

    animate();
}


        // Play the prize sound when the wheel stops
        function playPrizeSound() {
            prizeSound.play();
        }

        // Display the selected result after the wheel stops
// Display result in the modal
function displayResult() {
    const selectedSegment = getSelectedSegment();
    const modal = document.getElementById('resultModal');
    const modalPrize = document.getElementById('modalPrize');

    if (selectedSegment) {
        modalPrize.textContent = `Selamat, Anda Mendapatkan ${selectedSegment.label}!`;
    } else {
        modalPrize.textContent = "No segments selected";
    }

    modal.style.display = 'flex';  // Show the modal
}

        function getSelectedSegment() {
    // Normalize the rotation angle to [0, 2π)
    const normalizedAngle = (-(rotationAngle % (2 * Math.PI) + 2 * Math.PI) % (2 * Math.PI));  // Ensure positive angle
    const pointerOffset = -(Math.PI) / 2; // Pointer offset to start at the top (0 degrees)
    let adjustedAngle = (normalizedAngle + pointerOffset + 2 * Math.PI) % (2 * Math.PI);

    // Calculate cumulative angular ranges for each segment
    let cumulativeAngles = [];
    let totalAngle = 0;

    if (adjustedAngle < 0) {
        adjustedAngle += 2 * Math.PI;
    } else if (adjustedAngle >= 2 * Math.PI) {
        adjustedAngle -= 2 * Math.PI;
    }
    // Debugging: show the segment distribution for better understanding
    console.log(`Adjusted Angle: ${adjustedAngle}`);

    for (let i = 0; i < segments.length; i++) {
        const segment = segments[i];
        const segmentAngle = segment.angle || (2 * Math.PI / segments.length); // Default to equal angles if not defined
        totalAngle += segmentAngle;
        cumulativeAngles.push(totalAngle); // Store cumulative end angle of each segment

        // Debugging: Output each segment's calculated angle
        console.log(`Segment ${i}: Angle = ${segmentAngle}, Cumulative Angle = ${totalAngle}`);
    }

    // Debug output: checking cumulative angle calculation
    console.log(`Cumulative Angles: ${cumulativeAngles}`);

    // Determine the segment by finding where the adjusted angle falls
    let selectedIndex = 0;
    for (let i = 0; i < cumulativeAngles.length; i++) {
        if (adjustedAngle < cumulativeAngles[i]) {
            selectedIndex = i;
            break;
        }
    }

    // Debugging outputs
    console.log(`Selected Index: ${selectedIndex}`);
    console.log(`Selected Segment: ${segments[selectedIndex]?.label || "Invalid"}`);

    return segments[selectedIndex];
}




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

            // Trigger spin on "Enter" key
document.addEventListener('keydown', (event) => {
    if (event.key === 'Enter' && !isSpinning) {  // Check if the Enter key is pressed and not spinning
        spinWheel();  // Start spinning
    }
});

// Close modal on "Esc" key
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {  // Check if the Escape key is pressed
        closeModal();  // Close the modal
    }
});

// Function to close the modal
function closeModal() {
    const modal = document.getElementById('resultModal');
    modal.style.display = 'none';  // Hide the modal
}
    </script>
</body>

</html>

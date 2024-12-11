<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin Now! - AIO</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
            font-family: Poppins, sans-serif;
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

        #modalPrizeImage{
    display: contain;
    margin: 0 auto; /* Center the image */
    width: 80%; /* Scale the image proportionally */
    height: 80%;
}

    </style>
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
</head>

<body style="background-color: #00aff0; overflow-y: hidden">

    <div class="wheel-container" style="margin-top:70px; display: flex; justify-content: center; align-items: center; position: relative;">
        <!-- Left Image -->
        <img src="/images/display-2.png" alt="Left Image" class="side-image" style="position: absolute; left: 20px; height: 400px; width: 400px;">

        <!-- Wheel Canvas -->
        <canvas id="wheelCanvas" width="500" height="525"></canvas>

        <!-- Right Image -->
        <img src="/images/display-1.png" alt="Right Image" class="side-image" style="position: absolute; right: 20px; height: 400px; width: 400px;">
    </div>

    <div id="resultModal">
        <div id="modalContent">
        <h2 id="modalMsg"></h2>
        <img id="modalPrizeImage" alt="Prize Image">
            <h2 id="modalPrize"></h2>
        </div>
    </div>
</body>


    <!-- Spin sound -->
    <audio id="spinSound" src="/audio/spin-sfx.mp3"></audio>

    <!-- Prize sound -->
    <audio id="prizeSound" src="/audio/prize-sfx.mp3"></audio>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    <script>
            let csrfName = ''; // The CSRF token name
            let csrfHash = ''; // The CSRF token value
        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
        const resultDisplay = document.getElementById('result');
        const spinSound = document.getElementById('spinSound');
        const prizeSound = document.getElementById('prizeSound');
        const centerImageElement = new Image();
        centerImageElement.src = '/images/centerpiece.png'; // Replace with your PNG path
        const csrfRefreshUrl = '<?= base_url('wheel/getCsrfToken') ?>';


        let isSpinning = false;
        let rotationAngle = 0;
        let spinVelocity = 0;
        let segments = [];
        let totalOdds = 0;
        let equalAngle = 2 * Math.PI / segments.length; // Angle per segment, defined globally
        let idleRotationAngle = 0; // For slow rotation during idle state
        let isIdle = ''; // Flag to track idle state

        function refreshCsrfToken() {
    return fetch('/wheel/getCsrfToken', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update the global CSRF variables
        csrfName = data.csrfName;
        csrfHash = data.csrfHash;
    })
    .catch(error => {
        console.error('Failed to refresh CSRF token:', error);
    });
}



        // Draw the wheel with proportional segments
        function drawWheel() {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 10; // Adjust radius for spacing
    const outerRadius = radius - 55; // Outer radius for image placement
    const equalAngle = 2 * Math.PI / segments.length; // Each segment gets an equal angle

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas before redrawing

    let currentAngle = rotationAngle; // Start at the current rotation angle

    // Add shadow to the border
    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
    ctx.shadowBlur = 10;
    ctx.shadowOffsetX = 3;
    ctx.shadowOffsetY = 3;

    // Draw the white border around the wheel
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius + 1, 0, 2 * Math.PI); // Outer circle (border)
    ctx.lineWidth = 10; // Border width
    ctx.strokeStyle = '#fff'; // Border color
    ctx.stroke();
    ctx.lineWidth = 1; // Reset line width

    // Remove shadow for inner drawings
    ctx.shadowColor = 'transparent';

    segments.forEach((segment, index) => {
        // Define the segment color dynamically
        let color;
        if (index === 0 && segments.length % 3 != 0) {
            color = '#0daff0'; // First segment special color
        } else {
            // Alternating colors for the rest
            switch (index % 3) {
                case 0:
                    color = '#fd2654'; // Red
                    break;
                case 1:
                    color = '#fdce26'; // Yellow
                    break;
                case 2:
                    color = '#0daff0'; // Blue
                    break;
            }
        }

        // Draw the segment
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + equalAngle);
        ctx.closePath();

        ctx.fillStyle = color;
        ctx.fill();
        

        // Draw the image for the segment (if available)
        if (segment.imgElement) {
            const imgSize = 90; // Image size
            const imgX = centerX + Math.cos(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;
            const imgY = centerY + Math.sin(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;

            ctx.save();
            ctx.beginPath();
            ctx.arc(imgX + imgSize / 2, imgY + imgSize / 2, imgSize / 2, 0, 2 * Math.PI);
            ctx.drawImage(segment.imgElement, imgX, imgY, imgSize, imgSize);

        }

        currentAngle += equalAngle; // Move to the next segment
    });

    // Draw the center circle (placeholder for an image)
// Draw the center circle (placeholder for an image)
const centerCircleRadius = 45; // Size of the center circle
ctx.save(); // Save the current context state

// Add shadow to the center circle (push it outward)
ctx.shadowColor = 'rgba(0, 0, 0, 0.5)'; // Shadow color
ctx.shadowBlur = 50; // Increase blur to make the shadow larger
ctx.shadowOffsetX = 0; // Horizontal shadow offset (pushes the shadow to the right)
ctx.shadowOffsetY = 0; // Vertical shadow offset (pushes the shadow downward)

// Draw the white center circle with the shadow
ctx.beginPath();
ctx.arc(centerX, centerY, centerCircleRadius, 0, 2 * Math.PI);
ctx.fillStyle = '#fff'; // White center circle
ctx.fill();
ctx.lineWidth = 3; // Border thickness
ctx.stroke();

ctx.restore(); // Restore the context state to remove the shadow

// Draw the center image (without shadow)
drawCenterImage(); // Your function to draw the center image

// Draw the pointer on top
drawPointer();

}


function drawPointer() {
    const centerX = canvas.width / 2;
    const pointerHeight = 22;
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
                id: segment.id,
                label: segment.label,
                odds: parseFloat(segment.odds),
                image: segment.image,
                modal_img: segment.modal_img,
                stock: segment.stock
            }));

            totalOdds = segments.reduce((sum, segment) => sum + segment.odds, 0);

            if (totalOdds === 0) {
                console.error("No valid segments to display on the wheel: Total odds is 0.");
                return;
            }

            preloadImages(segments, () => {
                console.log("All images preloaded. Drawing the wheel.");
                drawWheel();
                setTimeout(() => {startIdleAnimation();}, 0);
            });
        }

        // Spin the wheel with fixed duration of 10 seconds
        function spinWheel() {
    if (isSpinning) return;
    isSpinning = true;
    isIdle = false; // Stop idle animation
    stopIdleAnimation();

    spinSound.play();

    console.log("Picking segment..."); // Debugging log

    const selectedSegment = pickSegmentByOdds();
    console.log("Selected Segment:", selectedSegment); // Debugging log

    const targetAngle = getTargetAngle(selectedSegment);
    const finalAngle = targetAngle; // No extra rotations
    const totalRotation = (2 * Math.PI * 20) + (-(targetAngle + 1/2*Math.PI));
    const duration= 10000;
    const startTime = Date.now();
    function animate() {
        const elapsed = Date.now() - startTime; // Calculate elapsed time
        const progress = Math.min(elapsed / duration, 1); // Normalize progress between 0 and 1

        // Easing for smooth animation
        const easedProgress = 1 - Math.pow(1 - progress, 3); // Ease-out cubic

        // Calculate current rotation angle based on easing progress
        rotationAngle = (easedProgress * totalRotation) % (2 * Math.PI); // Normalize to [0, 2π]

        drawWheel(); // Draw the wheel with the new rotation

        if (isSpinning && progress < 1) {
            requestAnimationFrame(animate); // Continue animation if not finished
        } else {
            isSpinning = false;
            startIdleAnimation();
            rotationAngle = totalRotation % (2 * Math.PI); // Finalize the rotation angle within range
            drawWheel(); // Draw the final position of the wheel
            displayResult(selectedSegment); // Display the result (the segment the wheel landed on)
        }
    }

    animate(); // Start the animation loop
}
        // Play the prize sound when the wheel stops
        function playPrizeSound() {
            prizeSound.play();
        }

        // Display the selected result after the wheel stops
// Display result in the modal
function displayResult(selectedSegment) {
    const modal = document.getElementById('resultModal');
    const modalMsg = document.getElementById('modalMsg');
    const modalPrize = document.getElementById('modalPrize');
    const modalPrizeImage = document.getElementById('modalPrizeImage'); // Get the image element

    modalMsg.textContent = `Selamat! Anda Mendapatkan`;
    modalPrize.textContent = `${selectedSegment.label}!`;

    // Set the prize image if available
    if (selectedSegment.modal_img) {
        modalPrizeImage.src = `uploads/images/${selectedSegment.modal_img}`; // Path to the prize image
        modalPrizeImage.style.display = 'block'; // Ensure the image is visible
    } else {
        modalPrizeImage.style.display = 'none'; // Hide the image if not available
    }

    modal.style.display = 'flex'; // Show the modal
    playPrizeSound();
    triggerConfetti();
    handlePrizeRoll(selectedSegment);
}

function getSelectedSegment() {
    // Normalize the rotation angle to [0, 2π)
    const normalizedAngle = (-(rotationAngle % (2 * Math.PI) + 2 * Math.PI) % (2 * Math.PI));  // Ensure positive angle
    const pointerOffset = -(Math.PI) / 2; // Pointer offset to start at the top (0 degrees)
    let adjustedAngle = (normalizedAngle + pointerOffset + 2 * Math.PI) % (2 * Math.PI);

    if (adjustedAngle < 0) {
        adjustedAngle += 2 * Math.PI;
    } else if (adjustedAngle >= 2 * Math.PI) {
        adjustedAngle -= 2 * Math.PI;
    }
    console.log(`Adjusted Angle: ${adjustedAngle}`);

    let cumulativeAngles = [];
    let totalAngle = 0;

    // Calculate and log the cumulative angles for each segment
    for (let i = 0; i < segments.length; i++) {
        const segment = segments[i];
        const segmentAngle = segment.angle || (2 * Math.PI / segments.length); // Default to equal angles if not defined
        totalAngle += segmentAngle;
        cumulativeAngles.push(totalAngle); // Store cumulative end angle of each segment

        // Debugging: Output each segment's calculated angle
        console.log(`Segment ${i}: Angle = ${segmentAngle}, Cumulative Angle = ${totalAngle}`);
    }

    // Debugging: Output the cumulative angle array
    console.log(`Cumulative Angles: ${cumulativeAngles}`);

    // Determine the segment by finding where the adjusted angle falls
    let selectedIndex = 0;
    for (let i = 0; i < cumulativeAngles.length; i++) {
        if (adjustedAngle < cumulativeAngles[i]) {
            selectedIndex = i;
            break;
        }
    }

    console.log(`Selected Index: ${selectedIndex}`);
    console.log(`Selected Segment: ${segments[selectedIndex]?.label || "Invalid"}`);

    return segments[selectedIndex];
}
function pickSegmentByOdds() {
    const totalOdds = segments.reduce((sum, segment) => sum + parseFloat(segment.odds), 0); // Calculate total cumulative odds
    const random = Math.random() * (totalOdds / 100); // Scale random value to the total odds
    console.log('Random value:', random); // Log random value for debugging

    let cumulativeOdds = 0;

    console.log('Segments available:', segments);
    for (const segment of segments) {
        const odds = parseFloat(segment.odds); // Ensure odds is treated as a number
        cumulativeOdds += odds / 100; // Accumulate odds
        console.log(`Cumulative odds: ${cumulativeOdds}, Segment odds: ${odds}`); // Log cumulative odds for each segment

        if (random < cumulativeOdds) {
            console.log(`Picked segment: ${segment.label}, ID: ${segment.id}`); // Log the picked segment with ID
            return segment;
        }
    }

    // If no segment is picked, return the last segment as fallback
    console.log('Fallback to last segment');
    return segments[segments.length - 1];
}



function getTargetAngle(segment) {
    const segmentIndex = segments.indexOf(segment); // Find the index of the segment
    if (segmentIndex === -1) {
        console.error("Segment not found:", segment);
        return 0; // Fallback in case the segment is not found
    }

    const equalAngle = 2 * Math.PI / segments.length; // Angle for each segment
    return segmentIndex * equalAngle + equalAngle / 2; // Target angle for the center of the segment
}
function drawCenterImage() {
    const imgSize = 60; // Adjust size as needed
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const imgX = centerX - imgSize / 2;
    const imgY = centerY - imgSize / 2;

    if (centerImageElement) {
        ctx.drawImage(centerImageElement, imgX, imgY+10, imgSize, (imgSize - 20));
    }
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
    if ((event.key === ' ' || event.key === 'Spacebar') && !isSpinning) {  // Check if Spacebar (or ' ') is pressed and not spinning
        event.preventDefault();  // Prevent default Spacebar action (e.g., scrolling)
        spinWheel();  // Start spinning
    }
});

// Close modal on "Esc" key

// Close modal on "Esc" key and refresh the page or content
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {  // Check if the Escape key is pressed
        closeModal();  // Close the modal
    }
});


// Trigger a confetti burst when needed
function triggerConfetti() {
    const confettiSettings = {
        particleCount: 300,
        spread: 90, // Narrow spread for sides
        gravity: 1,
        decay:0.95,
        colors: ['#0daff0', '#fdce26', '#fd2654'],
        shapes: ['square', 'circle'],
    };

    // Burst from the leftmost part
    confetti({
        ...confettiSettings,
        origin: { x: 0, y: 1 }, // Left center of the screen
        angle: 45, // Upward direction
    });

    // Burst from the rightmost part
    confetti({
        ...confettiSettings,
        origin: { x: 1, y: 1 }, // Right center of the screen
        angle: 135, // Upward direction
    });


}
async function handlePrizeRoll(selectedSegment) {
    // Refresh CSRF token before making the request
    await refreshCsrfToken();

    fetch(`/wheel/rollPrize/${selectedSegment.id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            [csrfName]: csrfHash, // Add the refreshed CSRF token to the request body
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Prize Rolled:', data.segment.label);

            // Check if stock hits 0
            if (data.segment.stock === 0) {
                console.log(`Removing segment: ${selectedSegment.label} (stock: 0)`);

                // Remove the segment from the segments array
                segments = segments.filter(segment => segment.id !== selectedSegment.id);

                // Redraw the wheel without the removed segment
                drawWheel();
            }
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => {
        console.error('API Request Failed:', error);
    });
}

function closeModal() {
    const modal = document.getElementById('resultModal');
    modal.style.display = 'none';  // Hide the modal
    console.log("Modal hidden");
}

function startIdleAnimation() {

    function idleAnimate() {
        if (isIdle) return; // Stop the idle animation if the flag is false

        idleRotationAngle += 0.005; // Adjust for slower rotation
        rotationAngle = idleRotationAngle % (2 * Math.PI); // Keep the angle within 0-2π

        drawWheel(); // Redraw the wheel with the new idle rotation angle

        requestAnimationFrame(idleAnimate); // Continue the animation
    }

    idleAnimate(); // Start the idle animation loop
}

function stopIdleAnimation() {
    isIdle = false; // Stop the idle animation
}
    </script>
</body>

</html>

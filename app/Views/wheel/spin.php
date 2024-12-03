<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin the Wheel</title>
    <style>
        canvas {
            display: block;
            margin: 20px auto;
            background-color: #f0f0f0; /* Add a background color for visibility */
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
</head>
<body>
    <h1 style="text-align: center;">Spin the Wheel</h1>
    <canvas id="wheelCanvas" width="500" height="500"></canvas>
    <button id="spinButton">Spin</button>
    <p id="result"></p>

    <script>
        const canvas = document.getElementById('wheelCanvas');
        const ctx = canvas.getContext('2d');
        const spinButton = document.getElementById('spinButton');
        const resultDisplay = document.getElementById('result');



        let isSpinning = false;
        let rotationAngle = 0;
        let spinVelocity = 0;
        let segments = [];
        let totalOdds = 0;
        let equalAngle = 2 * Math.PI / segments.length;  // Angle per segment, defined globally

        // Draw the wheel with proportional segments
// Function to draw the wheel with randomized segment positions
// Function to draw the wheel
function drawWheel() {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 10;  // Adjust radius for spacing
    const equalAngle = 2 * Math.PI / segments.length;  // Angle per segment
    

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas before redrawing

    let currentAngle = rotationAngle;  // Start at the current rotation angle

    segments.forEach(segment => {
        // Use equal angle for each segment's width
        const segmentAngle = equalAngle;

        // Draw the segment
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + segmentAngle);
        ctx.closePath();

        // Alternate colors
        ctx.fillStyle = segments.indexOf(segment) % 2 === 0 ? '#f4f4f4' : '#0daff0';
        ctx.fill();
        ctx.stroke();

        // Add text
        ctx.save();
        ctx.translate(centerX, centerY);
        ctx.rotate(currentAngle + segmentAngle / 2);
        ctx.textAlign = 'right';
        ctx.fillStyle = '#000';
        ctx.font = '14px Arial';
        ctx.fillText(segment.label, radius - 20, 0);
        ctx.restore();

        currentAngle += segmentAngle;  // Update angle for the next segment
    });

    drawPointer(); // Draw the pointer after the segments
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

        // Load segments into the wheel
// Load segments into the wheel
// Function to shuffle the segments array (to randomize the order)
function shuffleSegments(segments) {
    for (let i = segments.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [segments[i], segments[j]] = [segments[j], segments[i]];  // Swap elements
    }
}

// Function to assign random starting angles to shuffled segments
function assignRandomAngles() {
    let currentAngle = 0;  // Start from 0

    segments.forEach((segment, index) => {
        const segmentAngle = (2 * Math.PI * segment.odds) / totalOdds;
        const randomOffset = Math.random() * (2 * Math.PI);  // Random offset for each segment
        segment.startAngle = currentAngle + randomOffset;  // Apply random offset
        currentAngle += segmentAngle;  // Update the current angle for the next segment
    });
}

// Load segments into the wheel with random positioning
function loadSegments(newSegments) {
    segments = newSegments.map(segment => {
        const odds = parseFloat(segment.odds);
        if (isNaN(odds) || odds <= 0) {
            console.error(`Invalid odds value for segment ${segment.label}: ${segment.odds}`);
            segment.odds = 0;  // Assign 0 if invalid
        } else {
            segment.odds = odds;
        }
        return segment;
    });

    // Calculate total odds (sum of all segment odds)
    totalOdds = segments.reduce((sum, segment) => sum + segment.odds, 0);

    if (totalOdds === 0) {
        console.error("No valid segments to display on the wheel: Total odds is 0.");
        return;
    }

    shuffleSegments(segments); // Shuffle segments for randomness
    assignRandomAngles(); // Assign random starting angles
    drawWheel();  // Draw the wheel with the new shuffled and randomized segments
}



function spinWheel() {
    if (isSpinning) return;
    isSpinning = true;

    spinVelocity = Math.random() * 15 + 15; // Increased initial velocity
    let deceleration = Math.random() * (0.11 - 0.02) + 0.02; // Random base deceleration
    let angle = 0;
    let currentSegmentIndex = 0;


    
// Adjust deceleration based on segment odds and add a random factor
function adjustDeceleration(odds) {
    let decelerationFactor = 0.04;  // Base deceleration
    
    // Modify the deceleration based on odds
    if (odds < 10) {
        decelerationFactor *= 0.8;
    } else if (odds < 1) {
        decelerationFactor *= 0.05;
    } else if (odds > 20) {
        decelerationFactor *= 1.33;
    } else if (odds > 30) {
        decelerationFactor *= 1.5;
    }

    decelerationFactor += Math.random() * 0.02 - 0.01;  // Small random variation
    return decelerationFactor;
}


// Inside the animation loop
function animate() {
    angle += 5;  // Increment by 5 degrees per frame
    angle = angle % 360;  // Keep it within 0-360 range

    let cumulativeAngle = 0;
    for (let i = 0; i < segments.length; i++) {
        const segmentAngle = equalAngle;
        cumulativeAngle += segmentAngle;
        if (angle <= cumulativeAngle) {
            currentSegmentIndex = i;
            break;
        }
    }

    // Adjust deceleration based on the odds of the current segment
    const odds = segments[currentSegmentIndex].odds;
    let dynamicDeceleration = adjustDeceleration(odds);

    // When the wheel stops spinning
    if (spinVelocity <= 0) {
        isSpinning = false;
        spinVelocity = 0;

        const normalizedAngle = (rotationAngle % (2 * Math.PI) + 2 * Math.PI) % (2 * Math.PI);

        let cumulativeAngle = 0;
        let selectedSegment = null;

        for (let segment of segments) {
            const segmentAngle = equalAngle;
            cumulativeAngle += segmentAngle;

            if (normalizedAngle >= cumulativeAngle - segmentAngle && normalizedAngle < cumulativeAngle) {
                selectedSegment = segment;
                break;
            }
        }

        if (selectedSegment) {
            resultDisplay.textContent = `You won: ${selectedSegment.label}`;
        } else {
            resultDisplay.textContent = "No segments selected";
        }

        return;
    }

    rotationAngle += spinVelocity;  // Update the rotation angle
    spinVelocity -= dynamicDeceleration;  // Apply the dynamic deceleration

    drawWheel();  // Redraw the wheel with updated angle

    requestAnimationFrame(animate);  // Continue animation until the wheel stops
}


    animate();
}


        // Add event listener to spin button
// Add event listener to spin button
spinButton.addEventListener('click', spinWheel);

// Fetch segments from the backend
fetch('/wheel/getSegments')
    .then(response => response.json())
    .then(data => {
        console.log("Fetched segments data:", data);
        if (data && Array.isArray(data)) {
            loadSegments(data); // Load and randomize segments
        } else {
            console.error("Failed to load segments: Invalid format or empty data");
        }
    })
    .catch(error => {
        console.error("Error fetching segments:", error);
    });
            // Assuming you've fetched the result from the backend with 'segment' and 'angle'
// Fetch the winning segment and angle from the backend
fetch('/spinwheel/spin')
    .then(response => response.json())
    .then(data => {
        const { segment, angle } = data;
        
        // Convert the backend angle to radians, adjusting based on total odds
        const finalAngle = angle * (2 * Math.PI) / totalOdds;
        
        // Animate the spin and ensure it lands on the correct segment
        rotateWheelToAngle(finalAngle);
    })
    .catch(error => {
        console.error("Error fetching spin result:", error);
    });

// Function to rotate the wheel to the final angle (with extra spins for effect)
function rotateWheelToAngle(finalAngle) {
    const targetRotation = finalAngle + (2 * Math.PI * 10); // Extra spins for effect
    rotateWheel(targetRotation);
}

// Function to rotate the wheel to a given angle
function rotateWheel(angle) {
    rotationAngle = angle;  // Set the final rotation angle
    drawWheel();  // Redraw the wheel with the new rotation angle
}


    </script>
</body>
</html>

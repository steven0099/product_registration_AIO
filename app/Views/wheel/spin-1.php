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
            margin: 1px auto;
            margin-bottom:5px;
            position:absolute;
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

        #resultModal, #jackpotModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            font-family: Poppins, sans-serif;
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
    width: 60%; /* Scale the image proportionally */
    height: 60%;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.left-column {
    display: flex;
    flex-direction: column;
    width: 300px;
    height: 600px; /* Adjust as needed */
    background-color: #209dd8;
    margin-top:20px;
    position: relative;
    right:500px;
}

.upper-half {
    flex: 1 1 45%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #209dd8; /* Optional background for better visibility */
}

.prize-image {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
}

.bottom-half {
    flex: 1 1 55%;
    padding: 15px;
    overflow-y: auto;
    background-color: #209dd8; /* Optional background */
}

.prize-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center; /* Center the items horizontally */
}

.prize-list li {
    display: flex;
    justify-content: center; /* Center the text horizontally */
    align-items: center; /* Center the text vertically */
    position: relative;
    font-weight: bold;
    padding: 8px; /* Adjust padding for consistent size */
    border: 1px solid #ddd;
    border-radius: 20px;
    background-color: #fff;
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: center;
    color: #333;
    width: 100%; /* Ensures equal width for all items */
    max-width: 400px; /* Optional: set a max width to control size */
    box-sizing: border-box; /* Ensure padding doesn't affect box size */
}


.pointer-canvas {
    position: absolute;
    left: -20px; /* Position the pointer outside the box */
    top: 50%;
    transform: translateY(-50%) rotate(270deg); /* Rotate pointer to point right */
}

    </style>
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
</head>

<body style="background-color: #209dd8; overflow-y: hidden; overflow-x: hidden">

    <div class="wheel-container" style="margin-top:10px; display: flex; justify-content: center; align-items: center; position: relative;">
    <div class="left-column">
    <!-- Upper Half: Image -->
    <div class="upper-half">
        <img src="/images/spin-banner.png" alt="Prize Display" class="prize-image" style="width:80%">
    </div>

    <!-- Bottom Half: Prize List -->
    <div class="bottom-half">
        <ul id="prizeList" class="prize-list"></ul>
    </div>
</div>


        <!-- Wheel Canvas -->
        <canvas id="wheelCanvas" width="550" height="575"></canvas>

        <!-- Right Image -->
        <img src="../images/banner-eco.png" alt="Right Image" class="side-image" style="position: absolute; right: -10px; height: 90%; width: 400px;">

    <div id="resultModal">
        <div id="modalContent">
        <h2 id="modalMsg"></h2>
        <img id="modalPrizeImage" alt="Prize Image">
            <h2 id="modalPrize"></h2>
        </div>
    </div>

    <div id="jackpotModal" class="modal">
    <div class="modal-content">
        <!-- Content will be dynamically injected here -->
    </div>
</div>
</div>
<img src="/images/brand-footer.png" alt="Footer" style="position: absolute; bottom: 0; height: 60px; width: 100%; left:0">
</body>


    <!-- Spin sound -->
    <audio id="spinSound"></audio>

    <!-- Prize sound -->
    <audio id="prizeSound"></audio>
    <video id="jackpotVideo" controls style="width: 100%; display: none"></video>
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
        centerImageElement.src = '/images/e_Happy.png'; // Replace with your PNG path
        const csrfRefreshUrl = '<?= base_url('wheel/getCsrfToken') ?>';

        let imgRotationAngle = 0;
        let jackpotTexture = '';
        let isSpinning = false;
        let isPrize = false;
        let rotationAngle = 0;
        let spinVelocity = 0;
        let segments = [];
        let totalOdds = 0;
        let equalAngle = 2 * Math.PI / segments.length; // Angle per segment, defined globally
        let idleRotationAngle = 0; // For slow rotation during idle state
        let isIdle = ''; // Flag to track idle state
        let scaleFactor = 1; // Initial scale factor (no scaling)
let scalingDirection = 1; // 1 for expanding, -1 for contracting
const scaleSpeed = 0.003; // Speed of scaling (adjust as needed)
const scaleMax = 1.2; // Maximum scale factor (when the image is expanded)
const scaleMin = 1; // Minimum scale factor (original size)

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
    const outerRadius = radius - 80; // Outer radius for image placement
    const equalAngle = 2 * Math.PI / segments.length; // Each segment gets an equal angle

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas before redrawing

    let currentAngle = rotationAngle; // Start at the current rotation angle

    // Add shadow to the border
    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
    ctx.shadowBlur = 5;
    ctx.shadowOffsetX = 0;
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
        } else if (segment.jackpot == "Yes") {
            color = '#e61e25';
        } else {
            // Alternating colors for the rest
            switch (index % 3) {
                case 0:
                    color = '#26fd54'; // Green
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

        if (segment.jackpot === "Yes" && jackpotTexture) {
            ctx.fillStyle = '#e61e25';; // Set the base color
            ctx.fill();

            ctx.save(); // Save the current context state
            ctx.translate(centerX+180, centerY+200); // Move to the center of the wheel
            ctx.rotate(rotationAngle); // Rotate the texture with the wheel
            ctx.translate(-centerX, -centerY); // Move back to the original position

            let pattern = ctx.createPattern(jackpotTexture, 'repeat');
            ctx.fillStyle = pattern; // Set the pattern as the fill style
            ctx.scale(0.25, 0.25); // Scale the pattern (50% smaller)
            ctx.clip(); // Clip the segment area
            ctx.fill(); // Fill the clipped area with the rotated pattern
            ctx.restore(); // Restore the canvas state
        } else {
            ctx.fillStyle = color;
            ctx.fill();
        }

        if (segment.imgElement) {
    const imgSize = 120; // Image size
    const imgX = centerX + Math.cos(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;
    const imgY = centerY + Math.sin(currentAngle + equalAngle / 2) * outerRadius - imgSize / 2;
    const backgroundImgElement = new Image();
backgroundImgElement.src = '/images/sunray.png'; // Replace with your PNG path

backgroundImgElement.onload = () => {
    // Draw the background when the image is loaded
    if (segment.jackpot === 'Yes') {
        ctx.save();
        ctx.beginPath();
        ctx.drawImage(imgX, imgY, imgSize, imgSize);
        ctx.restore();
    }
};


    // Draw the segment image on top of the background
    ctx.save();
    ctx.beginPath();
    ctx.drawImage(segment.imgElement, imgX, imgY, imgSize, imgSize);
    ctx.restore();
}


        currentAngle += equalAngle; // Move to the next segment
    });

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
                stock: segment.stock,
                jackpot: segment.jackpot
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
    const totalRotation = (2 * Math.PI * 20) + (-(targetAngle + 1 / 2 * Math.PI)); // Add extra rotations
    const duration = 10000; // Spin duration (10 seconds)

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

            if (selectedSegment.jackpot == 'Yes') {
                displayJackpotResult(selectedSegment); // Unique behavior for jackpot
                handlePrizeRoll(selectedSegment);
                isPrize = true;
            } else {
                displayResult(selectedSegment); // Regular behavior for other prizes
                isPrize = true;
            }
        }
    }

    animate(); // Start the animation loop
}

function displayJackpotResult(segment) {
    const modal = document.getElementById('jackpotModal'); // Reference to the modal
    const modalContent = modal.querySelector('.modal-content'); // Modal content container

    // Clear existing content
    modalContent.innerHTML = '';

    // Show initial "Press Enter to Start" message
    const startText = document.createElement('div');
    startText.textContent = `Selamat! Anda Mendapatkan Hadiah Jackpot`;
    startText.style.fontSize = '2rem';
    startText.style.textAlign = 'center';
    modalContent.appendChild(startText);

    // Create and append the prize image
    const startImg = document.createElement('img'); // Use 'img' instead of 'div'
    startImg.src = `../uploads/images/${segment.modal_img}`; // Path to the prize image
    startImg.style.display = 'block';
    startImg.style.margin = '20px auto'; // Center the image
    startImg.style.maxWidth = '60%'; // Ensure it scales within the modal
    startImg.style.maxHeight = '60%'; // Ensure it scales within the modal
    modalContent.appendChild(startImg);

    // Create and append the prize label
    const startPrize = document.createElement('div');
    startPrize.textContent = `${segment.label}`;
    startPrize.style.fontSize = '2rem';
    startPrize.style.textAlign = 'center';
    startPrize.style.marginTop = '10px';
    modalContent.appendChild(startPrize);

    let countdown = 10; // 3-second countdown
    let countdownInterval; // To store the interval reference

    // Function to start the countdown
    function startCountdown() {
        // Replace the "Press Enter" message with the countdown
        startText.textContent = `Bersiap... (${countdown})`;
        startImg.style.display = 'none';
        startPrize.textContent = ``;

        countdownInterval = setInterval(() => {
            countdown -= 1;
            if (countdown <= 0) {
                clearInterval(countdownInterval);

                // Replace with jackpot video
                showJackpotVideo(segment, modalContent);
            } else {
                startText.textContent = `Bersiap... (${countdown})`;
            }
        }, 1000);

        // Remove the keydown event listener after starting the countdown
        document.removeEventListener('keydown', handleKeydown);
    }

    // Keydown event handler to check for "Enter" key
    function handleKeydown(event) {
        if (event.key === ' ' || event.key === 'Spacebar') {
            startCountdown(); // Start the countdown when "Enter" is pressed
        }
    }

    // Add the keydown event listener
    document.addEventListener('keydown', handleKeydown);

    modal.style.display = 'block'; // Show the modal
}

function showJackpotVideo(segment, modalContent) {
    // Clear existing content
    modalContent.innerHTML = '';

    const jackpotTitle = document.createElement('div');
    jackpotTitle.style.fontSize = '1.5rem';
    jackpotTitle.style.textAlign = 'center';
    jackpotTitle.style.marginBottom = '30px';
    modalContent.appendChild(jackpotTitle);

    // Add title for jackpot prize
    jackpotTitle.textContent = `Waktu Berjalan:`;

    // Update the video source using settings
    updateJackpotVideo(modalContent); // Call the function that updates the video source

    // Add a 5-minute countdown
    const countdownTimer = document.createElement('div');
    countdownTimer.style.fontSize = '1.5rem';
    countdownTimer.style.textAlign = 'center';
    countdownTimer.style.marginTop = '20px';
    modalContent.appendChild(countdownTimer);

    let timeRemaining = 5 * 1; // 5 minutes in seconds
    let isTimeUp = false; // Flag to track when the time is up

    const countdownInterval = setInterval(() => {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        countdownTimer.textContent = ``;
        if (timeRemaining <= 0) {
            clearInterval(countdownInterval);
            isTimeUp = true; // Set the flag when time is up
            modalContent.innerHTML = '<div style="text-align:center; font-size:40px; margin-top: 20px;">Waktu Habis! Selamat!</div>';
            playPrizeSound();
            triggerConfetti();
        } else {
            timeRemaining -= 1;
        }
    }, 1000);

    // Add Esc key listener
    document.addEventListener('keydown', function handleEscKey(event) {
        if (event.key === 'Escape' && isTimeUp) {
            closeJackpotModal();
            document.removeEventListener('keydown', handleEscKey); // Remove listener after modal is closed
        }
    });
}
// Function to close the jackpot modal
function closeJackpotModal() {
    const modal = document.getElementById('jackpotModal');
    if (modal) {
        modal.style.display = 'none';
    }
}

// Function to dynamically update the video source
function updateJackpotVideo(modalContent) {
    // Ensure the video element exists in the modal
    let video = modalContent.querySelector('video');
    if (!video) {
        // Create the video element if it doesn't exist
        video = document.createElement('video');
        video.autoplay = true;
        video.controls = false;
        video.style.display = 'block';
        video.style.width = '100%';
        modalContent.appendChild(video);
    }

    // Update the video source dynamically using the settings
    fetch('/wheel-settings') // Call your endpoint
        .then(response => response.json())
        .then(settings => {
            if (settings && settings.jackpot_vid) {
                video.src = `/video/${settings.jackpot_vid}`; // Update with the actual video file path
            }
        })
        .catch(error => console.error('Error fetching settings:', error));
}

function closeJackpotModal(){
    const modal = document.getElementById('jackpotModal');
    modal.style.display = 'none';  // Hide the modal
    console.log("Modal hidden");
    isPrize = false;
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
        modalPrizeImage.src = `../uploads/images/${selectedSegment.modal_img}`; // Path to the prize image
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
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const imgSize = 80; // Adjust size for the center image

    if (centerImageElement) {
        ctx.save(); // Save the current context state

        // Rotate the canvas around the center for the idle animation
        
        // in case idle animation needed
        ctx.translate(centerX, centerY); // Move to center
        ctx.scale(scaleFactor, scaleFactor); // Scale the image
        

        // Draw the center image (rotating)
        const imgX = -imgSize / 2;
        const imgY = -imgSize / 2;
        ctx.drawImage(centerImageElement, imgX, imgY, imgSize, (imgSize - 10));

        ctx.restore(); // Restore the context state
        scaleFactor += scalingDirection * scaleSpeed; // Increase or decrease the factor

        // Reverse scaling direction when reaching max or min
        if (scaleFactor >= scaleMax || scaleFactor <= scaleMin) {
            scalingDirection *= -1; // Reverse the direction
        }
    }
}


        // Fetch segments from the backend
        document.addEventListener("DOMContentLoaded", function () {
    // Fetch segments from the backend
    fetch('/wheel/getSegments')
        .then(response => response.json())
        .then(data => {
            console.log("Fetched segments data:", data);
            if (data && Array.isArray(data)) {
                populatePrizeList(data);
                loadSegments(data);
            } else {
                console.error("Failed to load segments: Invalid format or empty data");
            }
        })
        .catch(error => {
            console.error("Error fetching segments:", error);
        });

});
function populatePrizeList(segments) {
    const prizeList = document.getElementById('prizeList');

    // Clear any existing list items
    prizeList.innerHTML = '';

    // Create and append list items for each segment
    segments.forEach(segment => {
        const listItem = document.createElement('li');

        // Add data-id for unique identification
        listItem.setAttribute('data-id', segment.id);

        // Create a canvas for the pointer
        const canvas = document.createElement('canvas');
        canvas.width = 40; // Adjust size as needed
        canvas.height = 40;
        canvas.classList.add('pointer-canvas');

        // Draw the pointer on the canvas
        drawPointerOnCanvas(canvas);

        // Append the pointer and label to the list item
        listItem.appendChild(canvas);
        listItem.appendChild(document.createTextNode(segment.label || 'Unnamed Prize'));
        prizeList.appendChild(listItem);
    });
}


function drawPointerOnCanvas(canvas) {
    const ctx = canvas.getContext('2d');
    const centerX = canvas.height / 2;
    const pointerHeight = 15;
    const pointerOffset = 10;
    const borderThickness = 1;

    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)'; // Shadow color (black with transparency)
    ctx.shadowBlur = 6; // Blur effect for the shadow
    ctx.shadowOffsetX = 0; // Horizontal offset of the shadow
    ctx.shadowOffsetY = 0; // Vertical offset of the shadow
    // Draw the white border
    ctx.beginPath();
    ctx.moveTo(centerX - pointerHeight - borderThickness+5, pointerOffset - borderThickness);
    ctx.lineTo(centerX + pointerHeight + borderThickness-5, pointerOffset - borderThickness);
    ctx.lineTo(centerX, pointerHeight + pointerOffset + borderThickness);
    ctx.closePath();
    ctx.fillStyle = '#fff';
    ctx.fill();

    // Draw the red pointer
    ctx.beginPath();
    ctx.moveTo(centerX - pointerHeight+6, pointerOffset);
    ctx.lineTo(centerX + pointerHeight-6, pointerOffset);
    ctx.lineTo(centerX, pointerHeight-2 + pointerOffset);
    ctx.closePath();
    ctx.fillStyle = '#fd2654';
    ctx.fill();
    ctx.shadowColor = 'transparent';
}
// Close modal on "Esc" key
document.addEventListener('keydown', (event) => {
    if ((event.key === 'Enter') && !isSpinning && !isPrize) {  // Check if Spacebar (or ' ') is pressed and not spinning
        event.preventDefault();  // Prevent default Spacebar action (e.g., scrolling)
        spinWheel();  // Start spinning
    }
});

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

                // Remove the segment from the prize list
                removePrizeFromList(selectedSegment.id);

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

function removePrizeFromList(segmentId) {
    const prizeList = document.getElementById('prizeList');
    
    // Find the list item with the matching data-id
    const listItem = prizeList.querySelector(`li[data-id="${segmentId}"]`);
    if (listItem) {
        prizeList.removeChild(listItem); // Remove the matched list item
    } else {
        console.error(`List item with segmentId ${segmentId} not found.`);
    }
}

function closeModal() {
    const modal = document.getElementById('resultModal');
    modal.style.display = 'none';  // Hide the modal
    console.log("Modal hidden");
    isPrize = false;
}

function startIdleAnimation() {

    function idleAnimate() {
        if (isIdle) return; // Stop the idle animation if the flag is false

        idleRotationAngle += 0.01; // Adjust for slower rotation
        imgRotationAngle = idleRotationAngle % (2 * Math.PI); // Keep the angle within 0-2π

        drawWheel(); // Redraw the wheel with the new idle rotation angle

        requestAnimationFrame(idleAnimate); // Continue the animation
    }

    idleAnimate(); // Start the idle animation loop
}

function stopIdleAnimation() {
    isIdle = false; // Stop the idle animation
}

document.addEventListener('DOMContentLoaded', () => {
    fetch('/wheel-settings') // Call your endpoint
        .then(response => response.json())
        .then(settings => {
            if (settings) {
                // Update the media sources dynamically for audio
                const spinSound = document.getElementById('spinSound');
                const prizeSound = document.getElementById('prizeSound');
                spinSound.src = `../audio/${settings.spin_sfx}`;
                prizeSound.src = `../audio/${settings.prize_sfx}`;

                // Update the video dynamically
                const jackpotVideo = document.getElementById('jackpotVideo'); // Assuming you have a <video> element with id 'jackpotVideo'
                if (jackpotVideo) {
                    jackpotVideo.src = `../video/${settings.jackpot_vid}`;
                }

                // Fetch and preload the jackpot texture
                if (settings.jackpot_bg) {
                    const jackpotTextureImg = new Image();
                    jackpotTextureImg.src = `../images/${settings.jackpot_bg}`; // Dynamically set the texture source
                    jackpotTextureImg.onload = () => {
                        jackpotTexture = jackpotTextureImg; // Assign to the global variable
                        console.log('Jackpot texture loaded.');
                        drawWheel(); // Redraw the wheel after the texture is loaded
                    };
                }
            }
        })
        .catch(error => console.error('Error fetching settings:', error));
});

    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
    <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:auto; width:100%; position: fixed; top: 0; z-index: 1030; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15), inset 0 0 30px rgba(255, 255, 255, 0.01);">

<div class="navbar-brand mx-auto" style="position: absolute; left: 50%; transform: translateX(-50%);">
<a href="/catalog">    
<img src="/images/logo.png" alt="Logo" style="max-width: 150px; height: 50px;">
</a>
</div>

<!-- Right section (User Dropdown) -->
<!-- User Dropdown -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= session()->get('name') ? esc(session()->get('name')) : 'Guest'; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <?php if (session()->get('role') == 'superadmin'): ?>
            <a href="/superadmin/dashboard" class="dropdown-item">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
            <?php elseif (session()->get('role') == 'admin'): ?>
            <a href="/admin/dashboard" class="dropdown-item">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
        <?php endif; ?>
        <?php if (session()->get('name') != null): ?>        
            <div class="dropdown-divider"></div>
            <a href="/reset/reset-password" class="dropdown-item">
                <i class="fas fa-key mr-2"></i> Ganti Password
            </a>
        <?php endif; ?>    
        <?php if (session()->get('name') == null): ?>        
            <div class="dropdown-divider"></div>
            <a href="/register" class="dropdown-item">
                <i class="fas fa-key mr-2"></i> Daftar
            </a>
        <?php endif; ?>  
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
        </div>
    </li>
</ul>
</nav>

</head>

<body style="margin-top:60px">
    <h1 style="text-align: center;">Spin the Wheel</h1>
    <canvas id="wheelCanvas" width="475" height="475"></canvas>

    <!-- Modal for prize announcement -->
    <div id="resultModal">
        <div id="modalContent">
            <h2 id="modalPrize"></h2>
        </div>
    </div>

    <script>
    let isSpinning = false;
    let rotationAngle = 0;
    let segments = [];
    let targetSegmentIndex = -1;
    let spinDuration = 10000;
    let totalOdds = 0;
    let flashSegmentIndex = -1;  // Index of the segment that's flashing

    const canvas = document.getElementById('wheelCanvas');
    const ctx = canvas.getContext('2d');
    const resultModal = document.getElementById('resultModal');
    const modalPrize = document.getElementById('modalPrize');
    const closeModal = document.getElementById('closeModal');
    const spinButton = document.getElementById('spinButton');

    // Preload images for segments
    function preloadImages(segments, callback) {
        let loadedCount = 0;
        const totalImages = segments.filter(s => s.image).length;

        if (totalImages === 0) {
            callback();
            return;
        }

        segments.forEach(segment => {
            if (segment.image) {
                const img = new Image();
                img.src = `/uploads/images/${segment.image}`;

                img.onload = () => {
                    segment.imgElement = img;
                    loadedCount++;
                    if (loadedCount === totalImages) {
                        callback();
                    }
                };

                img.onerror = () => {
                    loadedCount++;
                    if (loadedCount === totalImages) {
                        callback();
                    }
                };
            } else {
                loadedCount++;
                if (loadedCount === totalImages) {
                    callback();
                }
            }
        });
    }

// Alternate colors for segments
function getSegmentColor(index) {
    const colors = ['#f4f4f4', '#0daff0']; // Alternate between these colors
    return colors[index % colors.length]; // Alternate based on index
}

// Draw the wheel and highlight the flashing segment
// Draw the wheel and highlight the flashing segment
function drawWheel() {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 10;
    const anglePerSegment = 2 * Math.PI / segments.length;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    segments.forEach((segment, index) => {
        const startAngle = index * anglePerSegment;
        const endAngle = startAngle + anglePerSegment;

        // Determine color for flashing effect (only one segment highlighted)
        const angleOffset = rotationAngle % (2 * Math.PI); // Current rotation angle
        const distanceToSegmentStart = (startAngle - angleOffset + 2 * Math.PI) % (2 * Math.PI);
        const distanceToSegmentEnd = (endAngle - angleOffset + 2 * Math.PI) % (2 * Math.PI);

        let isFlashing = false;

        // Flash only the closest segment
        if (flashSegmentIndex === index) {
            isFlashing = true;
        }

        // Draw the segment
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.closePath();

        // Set fill color based on conditions
        if (isFlashing) {
            ctx.fillStyle = '#0d2a46'; // Flashing color
        } else if (index === targetSegmentIndex) {
            ctx.fillStyle = '#0000ff'; // Selected segment color (blue)
        } else {
            ctx.fillStyle = getSegmentColor(index); // Alternate color
        }
        
        ctx.fill();
        ctx.stroke();

        // Draw image if exists
        const img = segment.imgElement;
        if (img) {
            const imageAngle = startAngle + anglePerSegment / 2;
            const imageX = centerX + (radius - 50) * Math.cos(imageAngle);  // Adjust the '150' to move image further from the center
            const imageY = centerY + (radius - 50) * Math.sin(imageAngle);  // Adjust the '150' for further positioning

            // Create a circular clipping region for the image
            ctx.save();
            ctx.beginPath();
            ctx.arc(imageX, imageY, 40, 0, 2 * Math.PI); // Radius of the circle (25)
            ctx.clip();

            // Draw the image inside the circle
            ctx.drawImage(img, imageX - 40, imageY - 40, 80, 80);  // Adjust image size (50x50)
            ctx.restore();
        }
    });
}


    // Preload sound files
    const spinSound = new Audio('/audio/spin-sfx.mp3');
    const prizeSound = new Audio('/audio/prize-sfx.mp3');

    // Function to play the spin sound during the spin
    function playSpinSound() {
        spinSound.play();
    }

    // Function to play the prize announcement sound after the spin finishes
    function playPrizeSound() {
        prizeSound.play();
    }

    // Function to smoothly spin the wheel
    function smoothSpin() {
        if (!isSpinning) return;

        isSpinning = true;
        const selectedSegment = selectSegmentBasedOnOdds(); // Pick the target segment based on odds
        const anglePerSegment = 2 * Math.PI / segments.length;
        const targetAngle = (selectedSegment * anglePerSegment) + (anglePerSegment / 2); // Middle of target segment
        const totalRotations = 25; // Number of full spins
        const finalAngle = (2 * Math.PI * totalRotations) + targetAngle; // Final rotation angle
        const startAngle = rotationAngle; // Starting angle
        const startTime = Date.now();

        // Play spin sound
        playSpinSound();

        function animate() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / spinDuration, 1); // Progress of the spin (0 to 1)
            const easedProgress = 1 - Math.pow(1 - progress, 3); // Ease-out effect

            rotationAngle = startAngle + (finalAngle - startAngle) * easedProgress; // Calculate current angle
            drawWheel(); // Redraw the wheel with updated rotation angle

            // Find and highlight the closest segment (only one segment flashes)
            const angleOffset = rotationAngle % (2 * Math.PI);
            flashSegmentIndex = findClosestSegment(angleOffset, anglePerSegment);

            if (progress < 1) {
                requestAnimationFrame(animate); // Continue animation if not finished
            } else {
                isSpinning = false; // Mark as finished
                targetSegmentIndex = selectedSegment; // Set the target segment
                drawWheel(); // Draw the final state

                // Delay showing the modal and playing the prize sound
                setTimeout(() => {
                    playPrizeSound(); // Play prize sound
                    showPrizeModal(segments[selectedSegment].label); // Show prize modal
                }, 100);
            }
        }

        requestAnimationFrame(animate); // Start the animation loop
    }

    // Function to find the closest segment to the current angle
    function findClosestSegment(angleOffset, anglePerSegment) {
        let closestSegment = -1;
        let minDistance = Infinity;

        segments.forEach((segment, index) => {
            const startAngle = index * anglePerSegment;
            const endAngle = startAngle + anglePerSegment;

            const distanceToSegmentStart = Math.abs((startAngle - angleOffset + 2 * Math.PI) % (2 * Math.PI));
            const distanceToSegmentEnd = Math.abs((endAngle - angleOffset + 2 * Math.PI) % (2 * Math.PI));

            const distance = Math.min(distanceToSegmentStart, distanceToSegmentEnd);

            if (distance < minDistance) {
                minDistance = distance;
                closestSegment = index;
            }
        });

        return closestSegment;
    }

    // Function to select a segment based on odds
    function selectSegmentBasedOnOdds() {
        const randomValue = Math.random() * totalOdds;
        let cumulativeOdds = 0;

        for (let i = 0; i < segments.length; i++) {
            cumulativeOdds += segments[i].odds;
            if (randomValue <= cumulativeOdds) {
                return i;
            }
        }
        return -1;
    }

    function showPrizeModal(prize) {
        modalPrize.textContent = `Selamat, Anda Mendapatkan ${prize}!`;
        resultModal.style.display = 'flex';
    }

    // Close modal
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {  // Check if the pressed key is Enter
        resultModal.style.display = 'none';
        targetSegmentIndex = -1; // Reset the green segment
        flashSegmentIndex = -1; // Reset the flashing segment
        rotationAngle = 0;
        isSpinning = false;
        drawWheel(); // Redraw the wheel with no flashing segment
        }
    });

    // Handle start of the spin
    function startSpin() {
        if (isSpinning) return;

        isSpinning = true;
        targetSegmentIndex = -1;
        flashSegmentIndex = -1; // No flashing segment initially
        smoothSpin();
    }

    // Load segments data
    function loadSegments(newSegments) {
        segments = newSegments.map(segment => ({
            label: segment.label,
            odds: parseFloat(segment.odds),
            image: segment.image
        }));

        totalOdds = segments.reduce((sum, segment) => sum + segment.odds, 0);

        if (totalOdds === 0) {
            console.error("No valid segments to display on the wheel.");
            return;
        }

        preloadImages(segments, () => {
            drawWheel();
        });
    }

    // Fetch segments data from server
    fetch('/wheel/getSegments')
        .then(response => response.json())
        .then(data => loadSegments(data))
        .catch(error => console.error('Error loading segments:', error));

    // Attach event listener to the spin button
    document.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {  // Check if the pressed key is Enter
        startSpin();
    }
});


</script>

</body>
</html>

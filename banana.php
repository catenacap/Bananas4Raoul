<?php
// PHP settings for error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the banana image URL
$bananaImageUrl = "https://static.vecteezy.com/system/resources/previews/029/200/344/non_2x/banana-transparent-background-free-png.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flying Bananas</title>
    <style>
        .flier {
            pointer-events: none;
        }

        .flier > img {
            position: fixed;
            top: 0;
            left: 0;
            animation: fly 50s linear infinite;
            z-index: 999999;
            width: 50px; /* Set fixed width to 50px */
            height: auto; /* Maintain aspect ratio */
        }

        @keyframes fly {
            0%, 98.001% {
                transform: translateX(-200%) translateY(100vh) rotate(0deg); /* Start position with no rotation */
            }

            15% {
                transform: translateX(100vw) translateY(-100%) rotate(180deg); /* Rotate 180deg while moving */
            }

            15.001%, 18% {
                transform: translateX(100vw) translateY(-30%) rotate(360deg); /* Rotate fully by 360deg */
            }

            40% {
                transform: translateX(-200%) translateY(3vh) rotate(-180deg); /* Rotate backward while moving */
            }

            40.001%, 43% {
                transform: translateX(-200%) translateY(-100%) rotate(-360deg); /* Rotate fully by -360deg */
            }

            65% {
                transform: translateX(100vw) translateY(50vh) rotate(540deg); /* Continue rotating while moving */
            }

            65.001%, 68% {
                transform: translateX(20vw) translateY(-200%) rotate(720deg); /* Continue rotating more */
            }

            95% {
                transform: translateX(10vw) translateY(100vh) rotate(1080deg); /* Finish rotation as it exits */
            }
        }
    </style>
</head>
<body>

<button id="toggleButton" onclick="toggleBananas()">Launch Bananas</button>

<script>
    let bananasFlying = false;
    let bananaElements = [];

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function launchBananas() {
        for (let i = 0; i < 30; i++) { // Launch 30 bananas instead of 10
            let banana = document.createElement('div');
            banana.classList.add('flier');

            let bananaImage = document.createElement('img');
            bananaImage.src = '<?php echo $bananaImageUrl; ?>';
            bananaImage.style.width = '50px'; // Resize width to 50px
            bananaImage.style.height = 'auto'; // Maintain aspect ratio

            // Randomize animation delay and position
            let delay = getRandomInt(0, 5) + 's';
            let top = getRandomInt(0, window.innerHeight) + 'px';
            let left = getRandomInt(0, window.innerWidth) + 'px';

            bananaImage.style.animationDelay = delay;
            bananaImage.style.top = top;
            bananaImage.style.left = left;

            banana.appendChild(bananaImage);
            document.body.appendChild(banana);
            bananaElements.push(banana); // Keep track of the banana elements
        }
    }

    function removeBananas() {
        bananaElements.forEach(banana => banana.remove());
        bananaElements = []; // Clear the banana array
    }

    function toggleBananas() {
        if (bananasFlying) {
            // Stop flying and remove all bananas
            removeBananas();
            document.getElementById("toggleButton").textContent = "Launch Bananas";
        } else {
            // Start flying bananas
            launchBananas();
            document.getElementById("toggleButton").textContent = "Stop Bananas";
        }
        bananasFlying = !bananasFlying;
    }
</script>

</body>
</html>

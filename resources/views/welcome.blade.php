<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | Vardhaman-Charitable-Trust</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #080A52;
            color: #fff;
            overflow: hidden;
        }

        .logo {
            color: #EB2188;
            font-weight: bold;
            font-size: 3rem;
        }

        .content {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .animate__animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .animate__bounceIn {
            animation-name: bounceIn;
        }

        .animate__zoomIn {
            animation-name: zoomIn;
        }

        .animate__delay-1s {
            animation-delay: 1s;
        }

        .animate__delay-2s {
            animation-delay: 2s;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: radial-gradient(circle, #080A52, #EB2188, #fff);
            background-size: 600% 600%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="content">
        <div class="text-center mb-4 animate__animated animate__bounceIn">
            <h1 class="logo">Vardhaman-Charitable-Trust</h1>
        </div>
        <div class="text-center animate__animated animate__zoomIn animate__delay-1s">
            <h2>Coming Soon</h2>
        </div>
        <div class="text-center animate__animated animate__zoomIn animate__delay-2s">
            <p>We are currently working on our website. Stay tuned for more updates!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

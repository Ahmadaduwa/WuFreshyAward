<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WU Freshy Awards</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            z-index: 10;
        }

        .text-Vdo {
            font-weight: 500;
            font-size: 36px;
            margin-bottom: 1vh;
            color: #ffffff;
        }

        video {
            max-width: 100%;
            max-height: 60vh;
        }

        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        @media (max-width: 915px) {
            video {
                width: 80%;
                height: auto;
            }
        }

        /* เพิ่ม CSS สำหรับปุ่มย้อนกลับ */
        .back-button {
            position: fixed;
            top: 20px;
            left: 0;
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 100;
        }

        .back-button:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <!-- เพิ่มปุ่มย้อนกลับ -->
    <a href="/" class="back-button">&#8592; กลับ</a>

    <div class="video-container">
        <div class="text-Vdo">คลิปวิดีโอแนะนำการใช้งานเว็บไซต์</div>
        <video controls allowfullscreen>
            <source src="Bulb.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="bg-animation">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div id='stars4'></div>
    </div>
</body>

</html>
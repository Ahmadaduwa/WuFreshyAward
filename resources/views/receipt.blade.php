<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองตั๋ว</title>
    <link rel="stylesheet" href="./css/receipt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        .back-button {
            position: fixed;
            top: 20px;
            left: 0;
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            /* ขนาดปุ่มปกติ */
            border: none;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 100;
        }

        .back-button:hover {
            background-color: #f0f0f0;
        }

        /* เพิ่ม Media Queries สำหรับโทรศัพท์มือถือ */
        @media (max-width: 768px) {
            .back-button {
                padding: 8px 15px;
                /* ขนาดปุ่มเมื่อบนมือถือ */
                font-size: 14px;
                /* ขนาดตัวอักษรเล็กลง */
            }
        }
    </style>
</head>

<body>
    <!-- logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="back-button" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> &#8592; ล็อกเอาท์</a>

    <div class="head">
        <div class="hover">
            <a>WU</a>
            <a>Freshy</a>
            <a>Awards</a>
        </div>
        <div class="ticket-box" id="capture-area">
            <div class="header">
                ระบบจองตั๋วที่นั่ง
            </div>
            <div class="content">
                <div class="info">
                    <p align="center" class="p-info">ข้อมูลนักศึกษา</p>
                    <p class="info-p">รหัสนักศึกษา : 67101113</p>
                    <p class="info-p">ชื่อ : {{ session('username') }}</p>
                    <p class="info-p">โซนที่จอง : 2</p>
                    <p class="info-p">ที่นั่งที่จอง : F24</p>
                    <div class="buttons">
                        <a href="{{ route('home') }}">
                            <button class="btn share">ออกจากหน้านี้</button>
                        </a>
                        <button id="capture-btn" class="btn exit">เซฟรูปในเครื่อง</button>

                    </div>
                </div>
                <div class="qrcode">
                    <p class="p-qr">QRCode</p>
                    <div id="GenerateQRcode"
                        style="display: flex; justify-content: center; align-items: center; height: 200px;"></div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>
    </section>
    <div class="bg-animation">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div id='stars4'></div>
    </div><!-- / STAR ANIMATION --></div>

    <script src="./js/receipt.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        function generateQRCode() {
            var id = '66131103kuhkuhr5'; //16 ตัว
            document.getElementById('GenerateQRcode').innerHTML = '';
            var qrcode = new QRCode(document.getElementById('GenerateQRcode'), {
                text: id,
                width: 128,
                height: 128
            });
        }
        window.onload = function() {
            generateQRCode();
        };
    </script>
</body>

</html>

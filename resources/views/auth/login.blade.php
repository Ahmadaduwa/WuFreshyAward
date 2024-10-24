<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .invalid-feedback {
            display: block;
            margin: 10px 0;
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <p class="title">WU Freshy Awards</p>
        <div>
            <p align="left" class="Login">ลงชื่อเข้าใช้งาน</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form">
                    <input class="input" placeholder="รหัสนักศึกษา" name="username" required="" type="text"
                        value="{{ old('username') }}">
                    <span class="input-border"></span>
                </div>
                <div class="form" style="margin-bottom: 25px">
                    <input class="input" placeholder="รหัสผ่าน" name="password" required="" type="password">
                    <span class="input-border"></span>
                </div>

                @if ($errors->any())
                    <div class="invalid-feedback" role="alert">
                        <strong>กรุณากรอกรหัสใหม่</strong>
                    </div>
                @endif


                <button type="submit" style="margin: 0%">ลงชื่อเข้าใช้งาน</button>
            </form>
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
    </div><!-- / STAR ANIMATION -->
</body>

</html>

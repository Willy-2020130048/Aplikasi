<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 5px;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .content {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .content p {
            margin: 0 0 10px;
        }
        .password-box {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            font-size: 14px;
            color: #999;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            Password Account Anda
        </div>
        <div class="content">
            <p>Hallo {{$data['user'][0]->nama_lengkap}},</p>
            <p>Password account anda mengalami perubahan</p>
            <div class="password-box">
                {{$data['password']}}
            </div>
            <p>Kami menyarankan Anda untuk segera mengganti kata sandi ini setelah login pertama Anda untuk memastikan keamanan akun Anda.</p>
            <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi tim dukungan kami.</p>
            <p>Salam hormat,</p>
            <p>IPDI</p>
        </div>
    </div>
</body>
</html>

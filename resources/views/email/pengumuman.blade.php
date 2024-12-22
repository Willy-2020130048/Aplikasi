<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Pengumuman Workshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: white;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 0.9em;
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pengumuman PITNAS IPDI Ke-32</h2>
        </div>
        <div class="content">
            <p>Yth. Peserta PITNAS IPDI Ke-32,</p>
            <p>Berikut kami sampaikan link {{$data['acara']}} PITNAS IPDI Ke-32:</p>
            <p><a href='{{$data['link']}}' target="_blank">Klik di sini untuk mengakses LMS</a></p>
            <p>Kami sudah mengundang peserta di akun Plataran Sehat pada acara {{$data['jenis_acara']}}. Demi kelancaran acara PITNAS nanti, kami mohon kepada peserta untuk memastikan kembali akun Plataran Sehat dan diharapkan sudah terbiasa dalam mengakses pembelajaran di Plataran Sehat.</p>
            <p>Mohon dipastikan juga bahwa tidak ada kegiatan pembelajaran yang telah diikuti sebelumnya yang belum diselesaikan serta tidak sedang mengikuti kegiatan pembelajaran lainnya pada tanggal PITNAS diselenggarakan.</p>
            <p>{{$data['catatan']}}</p>
            <p>Terima kasih,</p>
            <p>Panitia PITNAS</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Panitia PITNAS</p>
        </div>
    </div>
</body>
</html>

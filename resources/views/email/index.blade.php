<!DOCTYPE html>
<html lang="id">

<head>

</head>

<body style="color: black">
    <h3>FORM PITNAS IPDI</h3>
    <h4>Nomor Pendaftaran PITNAS</h4>
    <p>{{ $data['detail']->id }}</p>
    <h4>Nama Lengkap</h4>
    <p>{{ $data['partisipan']->nama_lengkap }}</p>
    <h4>Jenis Kelamin</h4>
    <p>{{ $data['partisipan']->jenis_kelamin }}</p>
    <h4>Nama Rumah Sakit</h4>
    <p>{{ $data['instansi']->nama_unit }}</p>
    <h4>NIRA IPDI</h4>
    <p>{{ $data['partisipan']->nira }}</p>
    <h4>Email Anda</h4>
    <p>{{ $data['partisipan']->email }}</p>
    <h4>Product</h4>
    <p>{{ $data['acara']->nama_acara }}</p>
    <h4>Harga</h4>
    <p>{{ $data['acara']->harga_acara }}</p>

    <p>{{ $data['body'] }}</p>
</body>

</html>

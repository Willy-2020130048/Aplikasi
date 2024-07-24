<!DOCTYPE html>
<html lang="id">

<head>

</head>

<body style="color: black">
    <h3>Bukti Pendaftaran Acara</h3>
    <h3>{{ $data['acara']->nama_acara }}</h3>
    <h3>Nomor Pendaftaran PITNAS</h3>
    <h3>
    {{$data['acara']->jenis_acara == "Workshop" ? "WS" : "Sim"}}{{$data['acara']->workshop == "Audit Klinis Dialisis" ? "1AKD" : ""}}{{$data['acara']->workshop == "Health Technology Dialisis" ? "2HTD" : ""}}{{$data['acara']->workshop == "CAPD" ? "3CAPD" : ""}}{{ $data['detail']->id}}</h3>
    <h4>Nama Lengkap</h4>
    <p>{{ $data['partisipan']->nama_lengkap }}</p>
    <h4>Jenis Kelamin</h4>
    <p>{{ $data['partisipan']->jenis_kelamin }}</p>
    <h4>Nama Rumah Sakit</h4>
    <p>{{ $data['instansi'][0]->nama_unit }}</p>
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

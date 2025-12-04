<?php
// Data CV
$nama = "Giovanni Azzahra";
$tempat_lahir = "Jambi";
$tanggal_lahir = "06 Maret 2009";
$alamat = "Sadu";
$telepon = "083121755855";
$email = "giovanni@gmail.com";
$agama = "Islam";
$kewarganegaraan = "Indonesia";
$status = "Belum Menikah";

// Pendidikan
$pendidikan = [
    "SDN 131 SKB (2014-2020)",
    "SMPN 36 KOTA BANDUNG (2020-2024)",
    "SMKN 1 SOREANG (2024-2027)",
];

// Pengalaman
$pengalaman = [
    "Menjadi Sekretaris PMR",
    "Menjadi Anggota OSIS 1 periode"
];

// Hobi
$hobi = [
    "Main game",
    "Nonton",
    "Menyanyi"
];

// Kontak
$kontak = [
    "Phone" => " 083121755855",
    "Email" => " giovanni@gmail.com",
    "Instagram" => "giovannii_azhr"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CV <?= $nama ?></title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            margin:0;
            padding:40px;
            background:#f7f7f7;
        }
        .cv-container{
            width:700px;
            margin:auto;
            background:white;
            padding:40px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h2{
            margin-bottom:5px;
        }

        .header{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .header img{
            width:110px;
            height:110px;
            object-fit:cover;
            border-radius:50%;
            border:4px solid #ddd;
        }

        .section-title{
            font-weight:600;
            font-size:20px;
            margin-top:25px;
            color:#333;
            border-left:5px solid #555;
            padding-left:10px;
        }

        ul{
            margin-top:5px;
            line-height:1.6;
        }

        .list-mini li{
            margin-bottom:3px;
        }
    </style>
</head>
<body>

<div class="cv-container">
    
    <!-- Header -->
    <div class="header">
        <h1><?= $nama ?></h1>
        <img src="foto.jpeg" alt="Foto">
    </div>

    <!-- Data Pribadi -->
    <h2 class="section-title">DATA PRIBADI</h2>
    <ul class="list-mini">
        <li>Tempat, Tanggal Lahir : <?= Jambi ?>, <?= 06-03-2009?></li>
        <li>Alamat : <?= Sadu ?></li>
        <li>Nomor Telepon : <?= 083121755855 ?></li>
        <li>Email : <?= giovanni@gmail.com ?></li>
        <li>Agama : <?= Islam ?></li>
        <li>Kewarganegaraan : <?= Indonesia ?></li>
        <li>Status : <?= Belum menikah ?></li>
    </ul>

    <!-- Pendidikan -->
    <h2 class="section-title">PENDIDIKAN</h2>
    <ul>
        <?php foreach ($pendidikan as $p): ?>
            <li><?= $p ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Pengalaman -->
    <h2 class="section-title">PENGALAMAN</h2>
    <ul>
        <?php foreach ($pengalaman as $p): ?>
            <li><?= $p ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Hobi -->
    <h2 class="section-title">HOBI</h2>
    <ul>
        <?php foreach ($hobi as $h): ?>
            <li><?= $h ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Kontak -->
    <h2 class="section-title">KONTAK</h2>
    <ul>
        <?php foreach ($kontak as $key => $value): ?>
            <li><strong><?= $key ?>:</strong> <?= $value ?></li>
        <?php endforeach; ?>
    </ul>

</div>

</body>
</html>
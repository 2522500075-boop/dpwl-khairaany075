<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php foreach ($datamhs as $mhs) : ?>
        <ul>
            <li>Nama: <?= $mhs['nama']; ?> - NIM: <?= $mhs['nim']; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>
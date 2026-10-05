<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NO.</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>ALAMAT</th>
            <th>NO.TELP</th>
        </tr>
        <?php $no = 1; foreach ($datamhs as $mhs) : ?>
        <tr>
            <td><?= $no++; ?>.</td>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['alamat']; ?></td>
            <td><?= $mhs['telp']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
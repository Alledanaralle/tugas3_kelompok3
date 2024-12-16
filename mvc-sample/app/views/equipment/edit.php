<!-- app/views/equipment/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Alat Kebugaran</title>
</head>
<body>
    <h2>Edit Alat Kebugaran</h2>
    <form action="/equipment/update/<?php echo $equipment['id_equipment']; ?>" method="POST">
        <label for="nama_alat">Nama Alat:</label><br>
        <input type="text" id="nama_alat" name="nama_alat" value="<?php echo $equipment['nama_alat']; ?>" required>
</br>
        <label for="jenis_alat">Jenis Alat:</label><br>
        <input type="text" id="jenis_alat" name="jenis_alat" value="<?php echo $equipment['jenis_alat']; ?>" required>
</br>
        <label for="kondisi">Kondisi:</label><br>
        <input type="text" id="kondisi" name="kondisi" value="<?php echo $equipment['kondisi']; ?>" required>
</br>

        <br><button type="submit">Update</button></br>
    </form>

    <a href="/equipment/index">Kembali ke Daftar Alat</a>
</body>
</html>

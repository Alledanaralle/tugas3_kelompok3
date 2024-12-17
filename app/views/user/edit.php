<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
</head>

<body>
    <h2>Edit Kelas</h2>
    <form action="/user/update/<?php echo $user['id_class']; ?>" method="POST">
        <label for="nama_kelas">Nama kelas:</label>
        <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $user['nama_kelas']; ?>" required>
        <br>
        <label for="waktu">Waktu:</label>
        <input type="text" id="waktu" name="waktu" value="<?php echo $user['waktu']; ?>" required>
        <br>
        <label for="id_trainer">Trainer:</label>
        <select name="id_trainer" id="id_trainer" required>
            <?php foreach ($trainers as $trainer) : ?>
                <option value="<?= $trainer['id_trainer'] ?>"
                    <?php echo ($trainer['id_trainer'] == $user['id_trainer']) ? 'selected' : ''; ?>>
                    <?= $trainer['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="kuota">Kuota:</label>
        <input type="text" id="kuota" name="kuota" value="<?php echo $user['kuota']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/user/index">Back to List</a>
</body>

</html>
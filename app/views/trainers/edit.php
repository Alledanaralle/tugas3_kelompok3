<!-- app/views/trainer/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Trainer</title>
</head>

<body>
    <h2>Edit Trainer</h2>

    <!-- Formulir untuk mengedit data pelatih -->
    <form action="/trainer/update/<?php echo $trainer['id_trainer']; ?>" method="POST">

        <!-- Input untuk nama pelatih dengan nilai yang sudah ada -->
        <tr>
            <td>Nama:</td>
            <td><input type="text" id="nama" name="nama" value="<?php echo $trainer['nama']; ?>" required></td>
        </tr>

        <!-- Dropdown untuk memilih spesialisasi dengan nilai yang sudah ada -->
        <tr>
            <td>Spesialisasi:</td>
            <td>
                <select name="spesialisasi" id="spesialisasi" required>
                    <!-- Menampilkan spesialisasi yang dipilih sebelumnya -->
                    <option value="Pilih Spesialisasi">Pilih Spesialisasi</option>
                    <option value="Bodybuilding" <?php if ($trainer['spesialisasi'] == 'Bodybuilding') echo 'selected'; ?>>Bodybuilding</option>
                    <option value="Weight Loss" <?php if ($trainer['spesialisasi'] == 'Weight Loss') echo 'selected'; ?>>Weight Loss</option>
                    <option value="CrossFit" <?php if ($trainer['spesialisasi'] == 'CrossFit') echo 'selected'; ?>>CrossFit</option>
                    <option value="Yoga" <?php if ($trainer['spesialisasi'] == 'Yoga') echo 'selected'; ?>>Yoga</option>
                    <option value="Cardio Training" <?php if ($trainer['spesialisasi'] == 'Cardio Training') echo 'selected'; ?>>Cardio Training</option>
                    <option value="Strength Training" <?php if ($trainer['spesialisasi'] == 'Strength Training') echo 'selected'; ?>>Strength Training</option>
                    <option value="Personal Training" <?php if ($trainer['spesialisasi'] == 'Personal Training') echo 'selected'; ?>>Personal Training</option>
                </select>
            </td>
        </tr>
        <!-- Input untuk jadwal dengan nilai yang sudah ada -->
        <tr>
            <td>Jadwal:</td>
            <td><input type="text" id="jadwal" name="jadwal" value="<?php echo $trainer['jadwal']; ?>" required><br></td>
        </tr>

        <!-- Tombol untuk menyimpan perubahan -->
        <tr>
            <td><button type="submit">Update</button></td>
        </tr>
    </form>

    <!-- Link untuk kembali ke daftar pelatih -->
    <a href="/trainer/index">Back to List</a>
</body>

</html>
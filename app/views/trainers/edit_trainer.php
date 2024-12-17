<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trainer</title>
    <style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #2c3e50;
    margin-top: 30px;
    font-size: 24px;
    font-weight: bold;
}

form {
    background: #f8fbff;
    max-width: 400px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #34495e;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #dcdfe6;
    border-radius: 5px;
    font-size: 14px;
    margin-bottom: 15px;
    color: #333;
    background-color: #fff;
}

input[type="text"]:focus,
select:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

.button-container {
    display: flex;
    justify-content: center; /* Menyusun tombol secara horizontal di tengah */
    align-items: center;
    margin-top: 10px;
    gap: 20px; /* Menambahkan jarak 20px antara tombol */
}


.button-container a,
.button-container button {
    width: 48%; /* Membuat tombol memiliki lebar hampir sama */
    text-decoration: none;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s, color 0.3s;
}

button[type="submit"] {
    background-color: #000; /* Warna hitam */
    color: #fff;
}

button[type="submit"]:hover {
    background-color: #333; /* Hitam lebih terang saat hover */
}

a {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3)); /* Gradasi transparan */
    border: 2px solid #000; /* Border hitam */
    color: #000; /* Teks hitam */
    font-weight: bold; /* Teks tebal */
    text-align: center;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

a:hover {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)); /* Gradasi hitam pekat saat hover */
    color: #fff; /* Teks putih saat hover */
}


</style>
</head>

<body>
    <h2>Edit Trainer</h2>

    <!-- Formulir untuk mengedit data pelatih -->
    <form action="/trainers/update/<?php echo $trainer['id_trainer']; ?>" method="POST">
        <!-- Input Nama -->
        <label for="nama">Nama Pelatih:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $trainer['nama']; ?>" required>

        <!-- Dropdown Spesialisasi -->
        <label for="spesialisasi">Spesialisasi:</label>
        <select name="spesialisasi" id="spesialisasi" required>
            <option value="Bodybuilding" <?php if ($trainer['spesialisasi'] == 'Bodybuilding') echo 'selected'; ?>>Bodybuilding</option>
            <option value="Weight Loss" <?php if ($trainer['spesialisasi'] == 'Weight Loss') echo 'selected'; ?>>Weight Loss</option>
            <option value="CrossFit" <?php if ($trainer['spesialisasi'] == 'CrossFit') echo 'selected'; ?>>CrossFit</option>
            <option value="Yoga" <?php if ($trainer['spesialisasi'] == 'Yoga') echo 'selected'; ?>>Yoga</option>
            <option value="Cardio Training" <?php if ($trainer['spesialisasi'] == 'Cardio Training') echo 'selected'; ?>>Cardio Training</option>
            <option value="Strength Training" <?php if ($trainer['spesialisasi'] == 'Strength Training') echo 'selected'; ?>>Strength Training</option>
            <option value="Personal Training" <?php if ($trainer['spesialisasi'] == 'Personal Training') echo 'selected'; ?>>Personal Training</option>
        </select>

        <!-- Input Jadwal -->
        <label for="jadwal">Jadwal Pelatih:</label>
        <input type="text" id="jadwal" name="jadwal" value="<?php echo $trainer['jadwal']; ?>" required>

        <!-- Tombol Update dan Back to List -->
        <div class="button-container">
        <a href="/trainers/index_trainer">Kembali</a>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>

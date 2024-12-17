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
            color: #2c3e50; /* Biru tua elegan */
            margin-top: 20px;
        }

        form {
            background: #fff;
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form tr {
            margin-bottom: 15px;
        }

        td {
            display: block;
            margin-bottom: 10px;
            color: #34495e;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #3498db; /* Biru fokus */
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button[type="submit"] {
            background-color: #3498db; /* Warna biru gym */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #2980b9; /* Warna biru lebih gelap saat hover */
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #e74c3c; /* Warna merah */
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
            width: 100%;
            transition: color 0.3s;
        }

        a:hover {
            color: #c0392b; /* Warna merah lebih gelap */
        }
    </style>
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
            <td><input type="text" id="jadwal" name="jadwal" value="<?php echo $trainer['jadwal']; ?>" required></td>
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

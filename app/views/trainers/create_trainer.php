<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatih Baru</title>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #dcdfe6;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
            background-color: #fff;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #2980b9;
            outline: none;
            box-shadow: 0 0 4px rgba(41, 128, 185, 0.5);
        }

        .button-container {
            display: flex;
            gap: 10px; /* Jarak antara tombol */
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        button[type="submit"] {
            background-color: #2c3e50;
            color: #fff;
            border: none;
        }

        button[type="submit"]:hover {
            background-color: #1a252f;
        }

        button[type="button"] {
            background-color: transparent;
            border: 2px solid #2c3e50;
            color: #2c3e50;
        }

        button[type="button"]:hover {
            background-color: #2c3e50;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Halaman untuk menambahkan pelatih baru -->
    <h2>Tambah Pelatih Baru</h2>

    <!-- Formulir untuk memasukkan data pelatih -->
    <form action="/trainer/store" method="POST">
        <!-- Input untuk nama pelatih -->
        <label for="nama">Nama Pelatih:</label>
        <input type="text" id="nama" name="nama" required>

        <!-- Dropdown untuk spesialisasi -->
        <label for="spesialisasi">Spesialisasi:</label>
        <select name="spesialisasi" id="spesialisasi" required>
            <option value="" disabled selected>Pilih Spesialisasi</option>
            <option value="Bodybuilding">Bodybuilding</option>
            <option value="Weight Loss">Weight Loss</option>
            <option value="CrossFit">CrossFit</option>
            <option value="Yoga">Yoga</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Strength Training">Strength Training</option>
            <option value="Personal Training">Personal Training</option>
        </select>

        <!-- Input untuk jadwal -->
        <label for="jadwal">Jadwal Pelatih:</label>
        <input type="text" id="jadwal" name="jadwal" required>

        <!-- Tombol Simpan dan Batal -->
        <div class="button-container">
            <button type="button" onclick="window.location.href='/trainer/index_trainer';">Batal</button>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>

</html>

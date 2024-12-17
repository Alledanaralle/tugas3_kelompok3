<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat Kebugaran Baru</title>
    <style>
        /* Global styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #ffffff;
            color: #2c3e50;
        }

        /* Title styling */
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form styling */
        form {
            background-color: #f4f8fc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            color: #2c3e50;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #b0c4de;
            border-radius: 4px;
            background-color: #ffffff;
            color: #2c3e50;
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            border-color: #2c3e50;
            outline: none;
        }

        /* Tombol styling */
        .button-container {
            display: flex;
            justify-content: space-between; /* Mengatur tombol kiri dan kanan */
            gap: 10px; /* Memberikan jarak antara tombol */
        }

        button, .btn-link {
            background-color: #2c3e50; /* Biru navy */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            text-decoration: none; /* Hilangkan garis bawah untuk link */
            display: inline-block;
            width: 48%; /* Menyusun tombol agar keduanya memiliki lebar yang sama */
        }

        /* Tombol Simpan dan Kembali */
        button {
            background-color: #2c3e50;
        }

        .btn-link {
            width: 48%; /* Tombol Kembali 48% */
            background-color: transparent;
            border: 2px solid #2c3e50; /* Border tombol Kembali sesuai dengan warna tombol Simpan */
            color: #2c3e50; /* Warna teks tombol Kembali mengikuti warna tombol Simpan */
        }

        button:hover, .btn-link:hover {
            background-color: #1f2d3d; /* Biru navy lebih gelap saat hover */
            color : white;
        }
    </style>
</head>
<body>
    <h2>Tambah Alat Kebugaran Baru</h2>
    <form action="/equipment/store" method="POST">
        <label for="nama_alat">Nama Alat:</label>
        <input type="text" name="nama_alat" id="nama_alat" required>

        <label for="jenis_alat">Jenis Alat:</label>
        <input type="text" name="jenis_alat" id="jenis_alat" required>

        <label for="kondisi">Kondisi:</label>
        <select name="kondisi" id="kondisi" required>
            <option value="Baik">Baik</option>
            <option value="Perbaikan">Perbaikan</option>
            <option value="Rusak">Rusak</option>
            <option value="Terjual">Terjual</option>
        </select>

        <!-- Container untuk tombol -->
        <div class="button-container">
            <a href="/equipment/index-equipment" class="btn-link">Kembali</a>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alat Kebugaran</title>
    <style>
        /* Global styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Latar belakang putih */
            color: #2c3e50; /* Biru navy untuk teks */
        }

        /* Title styling */
        h2 {
            color: #2c3e50; /* Biru navy untuk heading */
            text-align: center;
            margin: 30px 0;
        }

        /* Form container styling */
        form {
            background-color: #f4f8fc; /* Biru sangat muda */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto; /* Tengah */
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            color: #2c3e50; /* Biru navy */
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #b0c4de; /* Biru muda */
            border-radius: 4px;
            background-color: #ffffff; /* Putih */
            color: #2c3e50; /* Biru navy */
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            border-color: #2c3e50; /* Fokus warna biru navy */
            outline: none;
        }

        /* Button styling */
        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button {
            width: 48%;
            background-color: #2c3e50; /* Biru navy */
            color: #ffffff; /* Putih */
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1f2d3d; /* Biru navy lebih gelap saat hover */
        }

        /* Link styling */
        a {
            width: 48%;
            display: inline-block;
            text-align: center;
            color: #2c3e50; /* Biru navy */
            font-weight: bold;
            text-decoration: none;
            background-color: transparent;
            border: 2px solid #2c3e50; /* Border mengikuti warna tombol Simpan */
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
        }

        a:hover {
            color: #ffffff; /* Teks menjadi putih saat hover */
            background-color: #1f2d3d; /* Biru navy lebih gelap saat hover */
            border-color: #1f2d3d; /* Border menjadi lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <h2>Edit Alat Kebugaran</h2>
    <form action="/equipment/update/<?php echo $equipment['id_equipment']; ?>" method="POST">
        <label for="nama_alat">Nama Alat:</label>
        <input type="text" id="nama_alat" name="nama_alat" value="<?php echo htmlspecialchars($equipment['nama_alat'] ?? ''); ?>" required>

        <label for="jenis_alat">Jenis Alat:</label>
        <input type="text" id="jenis_alat" name="jenis_alat" value="<?php echo htmlspecialchars($equipment['jenis_alat'] ?? ''); ?>" required>

        <label for="kondisi">Kondisi:</label>
        <select id="kondisi" name="kondisi" required>
            <option value="Baik" <?php echo ($equipment['kondisi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
            <option value="Perbaikan" <?php echo ($equipment['kondisi'] == 'Perbaikan') ? 'selected' : ''; ?>>Perbaikan</option>
            <option value="Rusak" <?php echo ($equipment['kondisi'] == 'Rusak') ? 'selected' : ''; ?>>Rusak</option>
            <option value="Terjual" <?php echo ($equipment['kondisi'] == 'Terjual') ? 'selected' : ''; ?>>Terjual</option>
        </select>

        <div class="button-container">
            <a href="/equipment/index-equipment">Kembali</a>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>

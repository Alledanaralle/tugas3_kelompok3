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
            background-color: #ffeef5; /* Soft pink background */
            color: #5e354a; /* Dark pink for text */
        }

        /* Title styling */
        h2 {
            color: #d45d79; /* Strong pink for heading */
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form styling */
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Lebar maksimum form */
            margin: 0 auto; /* Tengah */
        }

        label {
            font-weight: bold;
            color: #5e354a;
            display: block; /* Agar label berada di atas input */
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%; /* Input mengikuti lebar form */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f3d2e1;
            border-radius: 4px;
            background-color: #fde4ed;
            color: #5e354a;
            box-sizing: border-box; /* Menjaga padding tidak melebihi lebar */
        }

        input[type="text"]:focus {
            border-color: #d45d79;
            background-color: #fbd2de;
            outline: none;
        }

        button {
            display: block; /* Agar tombol berada di tengah */
            width: 100%; /* Tombol mengikuti lebar form */
            background-color: #f8aacb;
            color: #5e354a;
            border: 1px solid #f3a6c1;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        button:hover {
            background-color: #d88aaa;
            border-color: #d45d79;
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
        <input type="text" name="kondisi" id="kondisi" required>

        <br><br><button type="submit">Simpan</button>
    </form>
</body>
</html>

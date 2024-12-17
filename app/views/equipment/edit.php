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
            background-color: #ffeef5; /* Soft pink background */
            color: #5e354a; /* Dark pink for text */
        }

        /* Title styling */
        h2 {
            color: #d45d79; /* Strong pink for heading */
            text-align: center; /* Centered title */
            margin: 30px 0;
        }

        /* Form container styling */
        form {
            background-color: #ffffff; /* White background for form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto; /* Center the form horizontally */
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            color: #5e354a; /* Dark pink text */
            display: block; /* Ensure label is above input */
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f3d2e1; /* Light pink border */
            border-radius: 4px;
            background-color: #fde4ed; /* Very light pink background */
            color: #5e354a; /* Dark pink text */
            box-sizing: border-box; /* Padding doesn't affect width */
        }

        input[type="text"]:focus {
            border-color: #d45d79; /* Strong pink border on focus */
            background-color: #fbd2de; /* Slightly darker pink on focus */
            outline: none;
        }

        /* Button styling */
        button {
            width: 100%;
            background-color: #f8aacb; /* Soft pink for button background */
            color: #5e354a; /* Dark pink text */
            border: 1px solid #f3a6c1; /* Light pink border */
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, border-color 0.3s;
        }

        button:hover {
            background-color: #d88aaa; /* Slightly darker pink */
            border-color: #d45d79; /* Dark pink border on hover */
        }

        /* Link styling */
        a {
            display: block;
            text-align: center;
            color: #c94a6a; /* Medium pink */
            font-weight: bold;
            text-decoration: none;
            margin-top: 15px;
        }

        a:hover {
            color: #9c3552; /* Darker pink on hover */
            text-decoration: underline;
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
        <input type="text" id="kondisi" name="kondisi" value="<?php echo htmlspecialchars($equipment['kondisi'] ?? ''); ?>" required>

        <button type="submit">Update</button>
    </form>

    <a href="/equipment/index">Kembali ke Daftar Alat</a>
</body>
</html>

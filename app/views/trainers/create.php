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

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
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
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <!-- Halaman untuk menambahkan pelatih baru -->
    <h2>Tambah Pelatih Baru</h2>

    <!-- Formulir untuk memasukkan data pelatih -->
    <form action="/trainers/store" method="POST">
        <table class="table table-borderless">
            <!-- Input untuk nama pelatih -->
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <!-- Dropdown untuk memilih spesialisasi -->
            <tr>
                <td>Spesialisasi:</td>
                <td>
                    <select name="spesialisasi" id="spesialisasi" required>
                        <option value="Pilih Spesialisasi">Pilih Spesialisasi</option>
                        <option value="Bodybuilding">Bodybuilding</option>
                        <option value="Weight Loss">Weight Loss</option>
                        <option value="CrossFit">CrossFit</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Cardio Training">Cardio Training</option>
                        <option value="Strength Training">Strength Training</option>
                        <option value="Personal Training">Personal Training</option>
                    </select>
                </td>
            </tr>

            <!-- Input untuk jadwal pelatih -->
            <tr>
                <td>Jadwal:</td>
                <td><input type="text" name="jadwal" id="jadwal" required></td>
            </tr>
            <!-- Tombol untuk menyimpan data -->
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>

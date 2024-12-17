<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelatih</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        /* Tombol Tambah Pelatih */
        a.tambah-pelatih {
            display: inline-block;
            background-color: #e74c3c; /* Warna merah */
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px;
        }

        a.tambah-pelatih:hover {
            background-color: #c0392b; /* Warna merah lebih gelap saat hover */
        }

        /* Tabel dengan warna biru kalem dan abu-abu */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: linear-gradient(135deg, #B0C4DE, #778899); /* Biru kalem ke abu-abu */
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Header tabel */
        th, td {
            text-align: center;
            padding: 12px 15px;
        }

        th {
            background-color: rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        /* Baris dengan warna berbeda */
        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        tr:nth-child(odd) {
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* Efek hover pada baris tabel */
        tr:hover {
            background-color: rgba(255, 255, 255, 0.4); /* Perubahan warna lebih jelas saat hover */
            cursor: pointer; /* Ubah kursor menjadi pointer */
            transition: background-color 0.3s ease; /* Tambahkan transisi halus */
        }

        /* Link Aksi (Edit dan Delete) */
        a.action-link {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 3px;
        }

        a.action-link:hover {
            background-color: #555;
        }

        a.edit {
            background-color: #f39c12; /* Warna oranye */
        }

        a.delete {
            background-color: #c0392b; /* Warna merah */
        }

    </style>
</head>
<body>
    <h2><big>Daftar Pelatih</big></h2>
    <a href="/trainer/create" class="tambah-pelatih">++ Tambah Pelatih Baru ++</a>
    
    <!-- Tabel Daftar Pelatih -->
    <table border="0" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Id Trainer</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainers as $trainer): ?>
                <tr>
                    <td><?= htmlspecialchars($trainer['id_trainer'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trainer['nama']) ?></td>
                    <td><?= htmlspecialchars($trainer['spesialisasi']) ?></td>
                    <td><?= htmlspecialchars($trainer['jadwal']) ?></td>
                    <td>
                        <a href="/trainer/edit/<?php echo $trainer['id_trainer']; ?>" class="action-link edit">Edit</a>
                        <a href="/trainer/delete/<?php echo $trainer['id_trainer']; ?>" class="action-link delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

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
        /* Tabel dengan kombinasi biru dan mustard */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #FDF8E4; /* Warna dasar mustard pucat */
    color: #333;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Header tabel */
th {
    background-color: #2C3E50; /* Warna biru tua */
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
}

/* Sel tabel */
td {
    background-color: #FDF8E4; /* Warna mustard pucat */
    color: #2C3E50; /* Warna teks biru tua */
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Efek zebra striping pada baris */
tr:nth-child(even) {
    background-color: #E8E6D1; /* Warna mustard yang sedikit lebih gelap */
}

tr:nth-child(odd) {
    background-color: #FDF8E4; /* Warna mustard pucat */
}

/* Efek hover pada baris tabel */
tr:hover {
    background-color: #3498DB; /* Warna biru terang */
    color: #fff; /* Warna teks putih */
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Link Aksi (Edit dan Delete) */
a.action-link {
    color: #fff;
    text-decoration: none;
    margin: 0 5px;
    padding: 5px 8px;
    border-radius: 3px;
}

a.edit {
    background-color: #F39C12; /* Warna mustard/oranye */
}

a.delete {
    background-color: #C0392B; /* Warna merah */
}

a.action-link:hover {
    background-color: #2C3E50; /* Warna biru tua saat hover */
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
    <h2>Daftar Pelatih</h2>
    <a href="/trainers/create" class="tambah-pelatih">Tambah Pelatih Baru</a>
    
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
                        <a href="/trainers/edit/<?php echo $trainer['id_trainer']; ?>" class="action-link edit">Edit</a>
                        <a href="/trainers/delete/<?php echo $trainer['id_trainer']; ?>" class="action-link delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

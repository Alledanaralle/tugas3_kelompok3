<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelatih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 85%;
            margin: 20px auto;
            overflow: hidden;
        }

        .card-header {
            background-color: #2C3E50;
            color: #fff;
            padding: 15px;
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
        }

        .card-body {
            padding: 20px;
            background-color: #FDFEFE;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #FDFEFE;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
        }

        th {
            background-color: #A6C0E4;
            color: #fff;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #2C3E50;
        }

        tr:nth-child(even) {
            background-color: rgb(255, 255, 255);
        }

        tr:hover {
            background-color: rgb(243, 243, 243);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Tombol Custom */
        .btn-custom {
            background-color: #A6C0E4;
            /* Biru Soft */
            color: #2C3E50;
            font-weight: bold;
            border: none;
        }

        .btn-custom:hover {
            background-color: #7FA9D5;
            /* Biru Lebih Gelap */
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="card">
        <!-- Card Header -->
        <div class="card-header">Daftar Pelatih</div>

        <!-- Card Body -->
        <div class="card-body">
            <!-- Tombol Tambah Pelatih Baru -->
            <a href="/trainers/create_trainer" class="btn btn-success mb-3">
                <i class="fas fa-user-plus"></i> Tambah Pelatih Baru
            </a>

            <!-- Tabel Daftar Pelatih -->
            <table>
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
                                <a href="/trainers/edit/<?php echo $trainer['id_trainer']; ?>" class="btn btn-info me-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/trainers/delete/<?php echo $trainer['id_trainer']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Tombol Back to Dashboard -->
            <div class="mt-3">
                <a href="/dashboard" class="btn btn-custom">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</body>

</html>

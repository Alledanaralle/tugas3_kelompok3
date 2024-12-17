<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Tema warna merah abu-abu */
        body {
            background-color: #f8f9fa;
        }
        .card-header {
            background: linear-gradient(to right, #8b0000, #a9a9a9);
            color: white;
        }
        .table thead {
            background-color: #a9a9a9;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #f5c6cb;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn i {
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h2 class="text-center">Daftar Pengguna</h2>
            </div>
            <div class="card-body">
                <a href="/member/create" class="btn btn-success mb-3">
                    <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
                </a>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID Member</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Paket Langganan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($member as $member): ?>
                            <tr>
                                <td><?= htmlspecialchars((string)($member['id_member'] ?? '')) ?></td>
                                <td><?= htmlspecialchars((string)($member['nama'] ?? '')) ?></td>
                                <td><?= htmlspecialchars((string)($member['usia'] ?? '')) ?></td>
                                <td><?= htmlspecialchars((string)($member['jenis_kelamin'] ?? '')) ?></td>
                                <td><?= htmlspecialchars((string)($member['paket_langganan'] ?? '')) ?></td>
                                <td>
                                    <a href="/member/edit/<?php echo $member['id_member']; ?>" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/member/delete/<?php echo $member['id_member']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
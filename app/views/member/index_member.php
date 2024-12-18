<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-header {
            background: rgb(0, 0, 0);
            color: white;
        }
        .table thead th {
            background-color: rgb(120, 125, 131);
            color: white;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn i {
            margin: 0 auto;
        }
        .table-responsive {
            overflow-y: auto;
            max-height: 400px;
        }
        .warna-card-footer {
            background-color: white;
        }
        /* Input Search Styling */
        #searchInput {
            width: 300px;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h2 class="text-center">Daftar Member</h2>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <!-- Kolom kiri: tombol tambah member -->
                    <div class="col-md-6 d-flex align-items-center">
                        <a href="/member/create_member" class="btn btn-success">
                            <i class="fas fa-user-plus"></i> Tambah Member Baru
                        </a>
                    </div>
                    <!-- Kolom kanan: input pencarian -->
                    <div class="col-md-6 text-end">
                        <input type="text" id="searchInput" placeholder="Cari Member..." onkeyup="searchTable()" class="form-control d-inline-block">
                    </div>
                </div>

                <!-- Membuat tabel responsif -->
                <div class="table-responsive">
                    <table id="trainerTable" class="table table-responsive table-hover table-bordered">
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
                                        <a href="/member/edit_member/<?php echo $member['id_member']; ?>" class="btn btn-info me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/member/delete_member/<?php echo $member['id_member']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer warna-card-footer">
                    <a href="/dashboard" class="btn btn-dark">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Pencarian -->
    <script>
        function searchTable() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let rows = document.querySelectorAll('#trainerTable tbody tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }
    </script>
</body>
</html>

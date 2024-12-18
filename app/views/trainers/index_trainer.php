<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelatih</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Card Styling */
        .card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 1200px;
            margin: 20px auto;
            overflow: hidden;
        }

        .card-header {
            background-color: #2C3E50;
            color: #ffffff;
            font-size: 1.5rem;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }

        /* Table Container Styling */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        th {
            background-color: #A6C0E4;
            color: #ffffff;
            padding: 12px;
        }

        td {
            padding: 12px;
            color: #2C3E50;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f3f3f3;
            transition: background-color 0.3s ease;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #A6C0E4;
            color: #2C3E50;
            font-weight: bold;
            border: none;
        }

        .btn-custom:hover {
            background-color: #7FA9D5;
            color: #ffffff;
        }

        /* Flex Container */
        .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
    <!-- Card Container -->
    <div class="container">
        <div class="card">
            <!-- Header -->
            <div class="card-header">Daftar Pelatih</div>

            <!-- Body -->
            <div class="card-body">
                <!-- Pencarian & Tambah Pelatih Container -->
                <div class="action-container">
                    <!-- Tambah Pelatih Button -->
                    <a href="/trainers/create_trainer" class="btn btn-success">
                        <i class="fas fa-user-plus"></i> Tambah Pelatih Baru
                    </a>

                    <!-- Input Pencarian -->
                    <input type="text" id="searchInput" placeholder="Cari Pelatih..." onkeyup="searchTable()" class="form-control ms-3">
                </div>

                <!-- Tabel -->
                <div class="table-container table-responsive">
                    <table class="table table-hover align-middle" id="trainerTable">
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
                                    <!-- Edit Button -->
                                    <a href="/trainers/edit/<?php echo $trainer['id_trainer']; ?>" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <a href="/trainers/delete/<?php echo $trainer['id_trainer']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Back to Dashboard -->
                <div class="mt-3">
                    <a href="/dashboard" class="btn btn-custom">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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

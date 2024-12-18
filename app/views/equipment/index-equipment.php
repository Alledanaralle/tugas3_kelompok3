<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat Kebugaran</title>
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
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
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

        a.tambah-pelatih {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        a.tambah-pelatih:hover {
            background-color: #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #FDFEFE;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            margin-bottom: 20px;
        }

        th {
            background-color: #A6C0E4;
            color: #fff;
            padding: 12px;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #2C3E50;
        }

        tr:nth-child(even) {
            background-color: rgb(255, 255, 255);
        }

        tr:nth-child(odd) {
            background-color: #FFFFFF;
        }

        tr:hover {
            background-color: rgb(210, 213, 216);
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a.action-link {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a.edit {
            background-color: #F39C12;
        }

        a.delete {
            background-color: #C0392B;
        }

        a.action-link:hover {
            background-color: #2C3E50;
        }
    </style>
</head>
<body>
  
    <!-- Card Container -->
    <div class="card">
        <div class="card-header">Daftar Alat Kebugaran</div>
        <div class="card-body">
            <a href="/equipment/create-equipment" class="btn btn-success mb-3">
                <i class="fas fa-user-plus"></i> Tambah Alat Baru
            </a>
            <table>
                <thead>
                    <tr>
                        <th>ID Equipment</th>
                        <th>Nama Alat</th>
                        <th>Jenis Alat</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipment as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars((string)($item['id_equipment'] ?? '')) ?></td>
                            <td><?= htmlspecialchars((string)($item['nama_alat'] ?? '')) ?></td>
                            <td><?= htmlspecialchars((string)($item['jenis_alat'] ?? '')) ?></td>
                            <td><?= htmlspecialchars((string)($item['kondisi'] ?? '')) ?></td>
                            <td>
                                <a href="/equipment/edit/<?php echo htmlspecialchars($item['id_equipment'] ?? ''); ?>" class="btn btn-info me-2"><i class="fas fa-edit"></i></a>
                                <a href="/equipment/delete/<?php echo htmlspecialchars($item['id_equipment'] ?? ''); ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Back To Dashboard Button -->
            <a href="./../dashboard" class="btn btn-primary" style="background-color:rgb(130, 153, 185); color: white; border-color: navy;">
                Back To Dashboard
            </a>
        </div>
    </div>
</body>
</html>

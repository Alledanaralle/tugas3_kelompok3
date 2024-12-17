<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat Kebugaran</title>
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
        }

        /* Link styling */
        a {
            color: #c94a6a; /* Medium pink */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #9c3552; /* Darker pink for hover effect */
            text-decoration: underline;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff; /* White background for table */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        thead th {
            background-color: #f8aacb; /* Soft pink for table header */
            color: #5e354a; /* Dark pink for text in header */
            text-align: left;
            padding: 10px;
        }

        tbody td {
            padding: 10px;
            border: 1px solid #f3d2e1; /* Light pink border */
        }

        tbody tr:nth-child(even) {
            background-color: #fde4ed; /* Very light pink for even rows */
        }

        tbody tr:hover {
            background-color: #fbd2de; /* Slightly darker pink for hover effect */
        }

        /* Button link styling in table */
        tbody td a {
            padding: 5px 10px;
            border: 1px solid #f3a6c1; /* Light pink border for buttons */
            border-radius: 4px;
            background-color: #f8aacb; /* Soft pink for button background */
            color: #5e354a; /* Dark pink text for buttons */
            text-decoration: none;
            font-size: 14px;
        }

        tbody td a:hover {
            background-color: #d88aaa; /* Slightly darker pink on hover */
            border-color: #d45d79; /* Match hover border color with button */
        }

        /* Add new equipment link */
        a[href="/equipment/create"] {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #f8aacb; /* Soft pink */
            color: #5e354a; /* Dark pink */
            border-radius: 5px;
            font-size: 16px;
        }

        a[href="/equipment/create"]:hover {
            background-color: #d88aaa; /* Slightly darker pink */
        }
    </style>
</head>
<body>
    <h2>Daftar Alat Kebugaran</h2>
    <a href="/equipment/create">Tambah Alat Baru</a><br>
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
                        <a href="/equipment/edit/<?php echo $item['id_equipment']; ?>">Edit</a> |
                        <a href="/equipment/delete/<?php echo $item['id_equipment']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<!-- app/views/equipment/index.php -->
<h2>Daftar Alat Kebugaran</h2>
<a href="/equipment/create">Tambah Alat Baru</a><br>
<table border="1" cellpadding="10" cellspacing="0"></br>
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

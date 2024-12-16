<!-- app/views/trainer/index.php -->
<h2>Daftar Pelatih</h2>
<a href="/trainer/create">Tambah Pelatih Baru</a> <br><br>
<table border="1" cellpadding="10" cellspacing="0">
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
                    <a href="/trainer/edit/<?php echo $trainer['id_trainer']; ?>">Edit</a> |
                    <a href="/trainer/delete/<?php echo $trainer['id_trainer']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

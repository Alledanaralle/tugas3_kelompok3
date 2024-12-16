<!-- app/views/member/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/member/create">Tambah Pengguna Baru</a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
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
                    <a href="/member/edit/<?php echo $member['id_member']; ?>">Edit</a> | 
                    <a href="/member/delete/<?php echo $member['id_member']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

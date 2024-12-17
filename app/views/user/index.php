<!-- app/views/user/index.php -->
<h2>Daftar Kelas</h2>
<a href="/user/create">Tambah Kelas Baru</a>
<ul>
    <?php
    foreach ($users as $user): ?>
        <div>
            <p>
                <?= htmlspecialchars((string)($user['nama_kelas'] ?? '')) ?> -
                <?= htmlspecialchars((string)($user['waktu'] ?? '')) ?> -
                <?= htmlspecialchars((string)($user['id_trainer'] ?? '')) ?> -
                <?= htmlspecialchars((string)($user['kuota'] ?? '')) ?>
                <a href="/user/edit/<?= $user['id_class']; ?>">Edit</a> |
                <a href="/user/delete/<?= $user['id_class']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
<!-- app/views/user/index.php -->
<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="min-h-dvh flex flex-col items-start px-[2%] pt-8 bg-[#fff] text-black">
    <div class="w-full border rounded-md h-full p-4">
        <h2 class="text-2xl font-[500] mb-4">Daftar Kelas</h2>
        <a href="/user/create" class="bg-black text-white px-4 py-2 rounded hover:bg-black-100 mb-4 inline-block">Tambah Kelas Baru</a>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 border-b">
                        <th class="px-4 py-3 text-left">Nama Kelas</th>
                        <th class="px-4 py-3 text-left">Waktu</th>
                        <th class="px-4 py-3 text-left">ID Trainer</th>
                        <th class="px-4 py-3 text-left">Kuota</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr class="border-b">
                        <td class="px-4 py-3"><?= htmlspecialchars((string)($user['nama_kelas'] ?? '')) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars((string)($user['waktu'] ?? '')) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars((string)($user['id_trainer'] ?? '')) ?></td>
                        <td class="px-4 py-3"><?= htmlspecialchars((string)($user['kuota'] ?? '')) ?></td>
                        <td class="px-4 py-3">
                            <a href="/user/edit/<?= $user['id_class']; ?>" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded mr-2">Edit</a>
                            <a href="/user/delete/<?= $user['id_class']; ?>" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($user)): ?>
                            <tr class="border-b">
                                <td colspan="5" class="text-center py-3">Tidak ada kelas terbaru</td>
                            </tr>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a class="bg-black p-2 mt-4 text-white rounded" href="./../dashboard">Back To Dashboard</a>
</body>

</html>
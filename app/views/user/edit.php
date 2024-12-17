<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-[#ddd] text-black flex justify-center items-center">
    <form class="p-4 w-[95%] max-w-[30rem] flex flex-col bg-white rounded-md" action="/user/update/<?php echo $user['id_class']; ?>" method="POST">
        <h2 class="text-center mb-10 text-2xl sm:text-3xl font-[500]">Edit Kelas</h2>
        <div class="mb-4">
            <label for="nama_kelas">Nama kelas:</label>
            <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $user['nama_kelas']; ?>" required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="waktu">Waktu:</label>
            <input type="text" id="waktu" name="waktu" value="<?php echo $user['waktu']; ?>" required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="id_trainer">Trainer:</label>
            <select name="id_trainer" id="id_trainer" required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
                <?php foreach ($trainers as $trainer) : ?>
                    <option value="<?= $trainer['id_trainer'] ?>" <?php echo ($trainer['id_trainer'] == $user['id_trainer']) ? 'selected' : ''; ?>>
                        <?= $trainer['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="kuota">Kuota:</label>
            <input type="text" id="kuota" name="kuota" value="<?php echo $user['kuota']; ?>" required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="flex gap-2">
            <a href="/user/index" class="bg-white text-black font-[500] border-2 border-black text-center px-6 py-2 w-full rounded">Batal</a>
            <button type="submit" class="bg-black text-white px-6 py-2 w-full rounded">Update</button>
        </div>
    </form>
</body>

</html>
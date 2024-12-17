<!-- app/views/user/create.php -->
<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet" />
</head>

<body class="min-h-dvh bg-white text-black flex justify-center align-center">
    <form class="p-3 w-[95%] max-w-[30rem] flex flex-col align-center" action="/user/store" method="POST">
        <h2>Tambah Kelas Baru</h2>
        <label for="nama_kelas">Nama kelas:</label>
        <input type="text" name="nama_kelas" id="nama_kelas" required>
        <label for="waktu">Waktu:</label>
        <input type="text" name="waktu" id="waktu" required>
        <label for="id_trainer">Trainer:</label>
        <select name="id_trainer" id="id_trainer" required>

            <?php foreach ($trainers as $trainer) : ?>
                <option value="<?= $trainer['id_trainer'] ?>">
                    <?= $trainer['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="kuota">Kuota:</label>
        <input type="text" name="kuota" id="kuota" required>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
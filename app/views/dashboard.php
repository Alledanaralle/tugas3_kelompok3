<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amba Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet" />
</head>

<body class="bg-white text-black min-h-dvh">
    <header class="w-full px-[7%] py-3 z-20 fixed top-0 left-0 shadow border-b-[1px] border-[#3b3b3b2e] flex justify-between items-center bg-white">
        <!--<button type="button" onclick="openSidebar()" class="ri-menu-line"></button>-->
        <h2 class="text-2xl sm:text-3xl font-medium">
            Amba Gym
        </h2>
    </header>
    <section class="pt-20 gap-4 grid px-[2%] z-10 h-auto grid-cols-[repeat(auto-fit,minmax(250px,1fr))]">
        <?php
        $menuDash = [
            ['title' => 'Total Member', 'value' => $totalMembers, 'icon' => 'ri-user-line'],
            ['title' => 'Pelatih Aktif', 'value' => $totalTrainers, 'icon' => 'ri-user-star-line'],
            ['title' => 'Kelas Tersedia', 'value' => $totalClasses, 'icon' => 'ri-calendar-line'],
            ['title' => 'Equipment Items', 'value' => $totalEquipments, 'icon' => 'ri-pen-nib-fill'],
        ];

        foreach ($menuDash as $menu) {
            echo '
                <div class="border-[1px] py-6 px-8 border-[#3b3b3b2e] rounded-md w-full">
                    <p class="w-full flex justify-between">' . $menu['title'] . ' <i class="' . $menu['icon'] . '"></i></p>
                    <p class="font-[500] mt-3 text-2xl sm:text-3xl">' . $menu['value'] . '</p>
                </div>
            ';
        }
        ?>
    </section>
    <section class="px-[2%] pt-4 z-10 h-auto">
        <div class="w-full rounded-md h-full border-[1px] p-6 border-[#3b3b3b2e]">
            <h2 class="text-2xl sm:text-3xl font-medium">
                Recent Member
            </h2>
            <div class="overflow-x-auto mt-6">
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="border-b">
                        <tr class="font-[500]">
                            <td class="px-4 py-2 text-left">No</td>
                            <td class="px-4 py-2 text-left">Nama</td>
                            <td class="px-4 py-2 text-left">Usia</td>
                            <td class="px-4 py-2 text-left">Jenis Kelamin</td>
                            <td class="px-4 py-2 text-left">Paket Langganan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latestMembers as $index => $member): ?>
                            <tr class="border-b hover:bg-gray-200">
                                <td class="px-4 py-2"><?= $index + 1 ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($member['nama']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($member['usia']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($member['jenis_kelamin']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($member['paket_langganan']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($latestMembers)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada member terbaru</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="px-[2%] pt-4 z-10 h-auto">
        <div class="w-full max-w-[35rem] rounded-md h-full border-[1px] p-6 border-[#3b3b3b2e]">
            <h2 class="text-2xl sm:text-3xl font-medium">
                Popular Classes
            </h2>
            <div class="overflow-x-auto mt-6">
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="border-b">
                        <tr class="font-[500]">
                            <td class="px-4 py-2 text-left">Nama Kelas</td>
                            <td class="px-4 py-2 text-left">Waktu</td>
                            <td class="px-4 py-2 text-left">Kuota</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($popularClasses as $index => $classes): ?>
                            <tr class="border-b hover:bg-gray-200">
                                <td class="px-4 py-2"><?= htmlspecialchars($classes['nama_kelas']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($classes['waktu']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($classes['kuota']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($popularClasses)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada Popular Classes</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="px-[2%] py-4 z-10 h-auto">
        <div class="w-full rounded-md h-full border-[1px] p-6 border-[#3b3b3b2e]">
            <h2 class="text-2xl sm:text-3xl font-medium">
                Equipment Status
            </h2>
            <div class="overflow-x-auto mt-6">
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="border-b">
                        <tr class="font-[500]">
                            <td class="px-4 py-2 text-left">Nama Alat</td>
                            <td class="px-4 py-2 text-left">Jenis Alat</td>
                            <td class="px-4 py-2 text-left">Kondisi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipmentStatus as $index => $status): ?>
                            <tr class="border-b hover:bg-gray-200">
                                <td class="px-4 py-2"><?= htmlspecialchars($status['nama_alat']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($status['jenis_alat']) ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($status['kondisi']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($equipmentStatus)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada Equipments</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
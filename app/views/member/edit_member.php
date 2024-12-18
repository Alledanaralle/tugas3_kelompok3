<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <h2>Edit Member</h2> -->
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Edit Member</h5>
            </div>
            <div class="card-body">
    <form action="/member/update_member/<?php echo $member['id_member']; ?>" method="POST">
    <table class="table table-borderless">
        <tr>
        <td>Nama </td>
        <td><input type="text" id="nama" name="nama" value="<?php echo $member['nama']; ?>" required></td>
        </tr>
        <tr>
        <td>Usia </td>
        <td><input type="text" id="usia" name="usia" value="<?php echo $member['usia']; ?>" required></td>
        </tr>
        <tr>
        <td>Jenis Kelamin </td>
        <td>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L" <?php if ($member['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
            <option value="P" <?php if ($member['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Paket Langganan </td>
        <td>
         <select name="paket_langganan" id="paket_langganan" required>
            <option value="Standard" <?php if ($member['paket_langganan'] == 'Standard') echo 'selected'; ?>>Standard</option>
            <option value="Premium" <?php if ($member['paket_langganan'] == 'Premium') echo 'selected'; ?>>Premium</option>
            <option value="VIP" <?php if ($member['paket_langganan'] == 'VIP') echo 'selected'; ?>>VIP</option>
        </select>
        </td>
        </tr>
    </table>
        <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn w-100 btn-dark">Update</button>
                    </div>
    </form>
</body>
</html>
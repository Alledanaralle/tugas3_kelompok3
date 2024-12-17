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
        <td><input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $member['jenis_kelamin']; ?>" required></td>
        </tr>
        <tr>
        <td>Paket Langganan </td>
        <td><input type="text" id="paket_langganan" name="paket_langganan" value="<?php echo $member['paket_langganan']; ?>" required></td>
        </tr>
    </table>
        <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn w-100 btn-dark">Update</button>
                    </div>
    </form>
</body>
</html>
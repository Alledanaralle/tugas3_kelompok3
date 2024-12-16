<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
</head>
<body>
    <h2>Edit Member</h2>
    <form action="/member/update/<?php echo $member['id_member']; ?>" method="POST">
    <table class="table table-borderless">
        <tr>
        <td>Nama :</td>
        <td><input type="text" id="nama" name="nama" value="<?php echo $member['nama']; ?>" required></td>
        </tr>
        <tr>
        <td>Usia :</td>
        <td><input type="text" id="usia" name="usia" value="<?php echo $member['usia']; ?>" required></td>
        </tr>
        <tr>
        <td>Jenis Kelamin :</td>
        <td><input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $member['jenis_kelamin']; ?>" required></td>
        </tr>
        <tr>
        <td>Paket Langganan :</td>
        <td><input type="text" id="paket_langganan" name="paket_langganan" value="<?php echo $member['paket_langganan']; ?>" required></td>
        </tr>
        <tr>
        <td><button type="submit">Update</button></td>
        </tr>
    </form>
    <a href="/member/index">Back to List</a>
</body>
</html>
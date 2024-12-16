<!-- app/views/trainer/create.php -->
<!-- Halaman untuk menambahkan pelatih baru -->
<h2>Tambah Pelatih Baru</h2>

<!-- Formulir untuk memasukkan data pelatih -->
<form action="/trainer/store" method="POST">
    <table class="table table-borderless">
        <!-- Input untuk nama pelatih -->
        <tr>
            <td>Nama:</td>
            <td><input type="text" name="nama" id="nama" required></td>
        </tr>
        <!-- Dropdown untuk memilih spesialisasi -->
        <tr>
            <td>Spesialisasi:</td>
            <td>
                <select name="spesialisasi" id="spesialisasi" required>
                    <option value="Pilih Spesialisasi">Pilih Spesialisasi</option>
                    <option value="Bodybuilding">Bodybuilding</option>
                    <option value="Weight Loss">Weight Loss</option>
                    <option value="CrossFit">CrossFit</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Cardio Training">Cardio Training</option>
                    <option value="Strength Training">Strength Training</option>
                    <option value="Personal Training">Personal Training</option>
                </select>
            </td>
        </tr>

        <!-- Input untuk jadwal pelatih -->
        <tr>
            <td>Jadwal:</td>
            <td><input type="text" name="jadwal" id="jadwal" required></td>
        </tr>
        <!-- Tombol untuk menyimpan data -->
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
</form>
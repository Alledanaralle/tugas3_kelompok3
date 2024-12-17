<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Tambah Pengguna Baru</h5>
            </div>
            <div class="card-body">
                <form action="/member/store" method="POST">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama </td>
                            <td><input type="text" name="nama" id="nama" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td> Usia </td>
                            <td><input type="text" name="usia" id="usia" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin </td>
                            <td>
                                <select name="jenis_kelamin" id="" value="<?= @$x['jenis_kelamin'] ?>" class="form-select" required>
                                    <option value="<?= @$x['jenis_kelamin'] ?>" required>--Pilih Jenis Kelamin--</option>
                                    <option value="P"> P</option>
                                    <option value="L"> L</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Paket Langganan</td>
                            <td>
                                <select name="paket_langganan" id="" value="<?= @$x['paket_langganan'] ?>" class="form-select" required>
                                    <option value="<?= @$x['paket_langganan'] ?>" required>--Pilih Paket Langganan--</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn btn-dark w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

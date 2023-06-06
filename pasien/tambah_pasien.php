<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
?>

<div align="center">
    <h3>Tambah data pasien</h3>
</div>
<hr>
<div class="container-fluid">
    <form action="" method="POST">
        <div>
            <label for="">Nama</label>
            <input class="form-control" type="text" style="text-transform: capitalize;" placeholder="Masukkan nama" name="nama"
                aria-label="default input example" autofocus required>
        </div>
        <div>
            <label for="">No BPJS</label>
            <input class="form-control" type="text" placeholder="Masukkan no BPJS" name="bpjs"
                aria-label="default input example" required>
        </div>
        <div>
            <label for="">NIK</label>
            <input class="form-control" type="text" placeholder="Masukkan NIk" name="nik"
                aria-label="default input example" required>
        </div>
        <div>
            <label for="">Tanggal lahir</label>
            <input class="form-control" type="date" name="tgl_lahir" aria-label="default input example" required>
        </div>
        <div>
            <label for="">alamat</label>
            <input class="form-control" type="text" name="alamat" placeholder="Masukkan alamat"
                aria-label="default input example" required>
        </div>
        <input type="hidden" value="0" name="s_pasien">
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fa-solid fa-rotate-left"></i> Reset</button>
            <a class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
    </form>
    <br>
</div>
</body>

</html>

<?php
if(isset($_POST['simpan'])){
    ?>
    <script type="text/javascript">
        swal({
            title: "Berhasil!",
            text: "Pop-up berhasil ditampilkan",
            icon: "success",
            button: true

        });
        var url = "http://prolanis.rf.gd/"; // url tujuan
        var count = 1; // dalam detik
        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#kata').html('<b>Halaman Ini Akan Otomatis Di Redirect KE </b> ' + url + ' dalam ' + waktu + ' detik.');
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = url;
            }
        }
        countDown();
    </script>
<?php

$nama = addslashes($_POST['nama']);
    mysqli_query($koneksi,"INSERT INTO tb_pasien set
    nama= '$nama',
    bpjs= '$_POST[bpjs]',
    nik= '$_POST[nik]',
    tgl_lahir= '$_POST[tgl_lahir]',
    alamat= '$_POST[alamat]',
    s_pasien= '$_POST[s_pasien]'");
}



?>
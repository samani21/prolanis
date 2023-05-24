<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
$id = $_GET['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE id='$id'");
$data = mysqli_fetch_array($ambil)
?>

<div align="center">
    <h3>Edit data pasien</h3>
</div>
<hr>
<div class="container-fluid">
    <form action="" method="POST">
        <div>
            <label for="">Nama</label>
            <input class="form-control" type="text" style="text-transform: capitalize;" value="<?php echo $data['nama'] ?>" placeholder="Masukkan nama" name="nama"
                aria-label="default input example" autofocus require>
        </div>
        <div>
            <label for="">No BPJS</label>
            <input class="form-control" type="text" value="<?php echo $data['bpjs'] ?>" placeholder="Masukkan no BPJS" name="bpjs"
                aria-label="default input example" require>
        </div>
        <div>
            <label for="">NIK</label>
            <input class="form-control" type="text" value="<?php echo $data['nik'] ?>" placeholder="Masukkan NIk" name="nik"
                aria-label="default input example" require>
        </div>
        <div>
            <label for="">Tanggal lahir</label>
            <input class="form-control" type="date" value="<?php echo $data['tgl_lahir'] ?>" name="tgl_lahir" aria-label="default input example" require>
        </div>
        <div>
            <label for="">alamat</label>
            <input class="form-control" type="text" value="<?php echo $data['alamat'] ?>" name="alamat" placeholder="Masukkan alamat"
                aria-label="default input example" require>
        </div>
        <input type="hidden" value="<?php echo $data['status'] ?>" name="status">
        <hr>
        <div>
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    <br>
    <button class="btn btn-secondary" onclick="history.back()">Kembali</button>
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
        var url = "http://localhost:8080/prolanis/"; // url tujuan
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
    mysqli_query($koneksi,"UPDATE tb_pasien set
    nama= '$nama',
    bpjs= '$_POST[bpjs]',
    nik= '$_POST[nik]',
    tgl_lahir= '$_POST[tgl_lahir]',
    alamat= '$_POST[alamat]',
    status= '$_POST[status]'
    WHERE id = $id");
}



?>
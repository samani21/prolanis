<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
$kembali = date('d-m-Y', strtotime("6 month", strtotime(date("d-m-Y"))));
date_default_timezone_set("Asia/Singapore");

$id = $_GET['id'];
$pasien = $_GET['pasien'];

$ambil = mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE id='$pasien'");
$data = mysqli_fetch_array($ambil)
?>
    <div align="center">
        <h3>Tambah data prolanis</h3>
    </div>
    <hr>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row g-2">
                <div class="col-6">
                    <input type="hidden" value="0" name="sts1">
                    <input type="hidden" value="1" name="sts2">
                    <div>
                        <label for="">Nama</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['nama']?>" placeholder="Masukkan nama" 
                        aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">No BPJS</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['bpjs']?>" placeholder="Masukkan no BPJS" 
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">NIK</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['nik']?>" placeholder="Masukkan NIk" 
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">Tanggal lahir</label>
                        <input class="form-control form-control-sm" type="date"   value="<?php echo $data['tgl_lahir']?>" aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Tanggal Pemeriksaan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo date('d-m-Y') ?>" placeholder="Masukkan TB" name="tgl_pemeriksaan"
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">Rencana Pemeriksaan LAB ulangan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $kembali ?>" placeholder="Masukkan HDL" name="p_ulang"
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">TB</label>
                        <input class="form-control form-control-sm" type="number" placeholder="Masukkan TB" name="tb"
                            aria-label="default input example" autofocus require>
                    </div>
                    <div>
                        <label for="">BB</label>
                        <input class="form-control form-control-sm" type="number" placeholder="Masukkan BB" name="bb"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">BMI</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan BMI" name="bmi"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Lingkar Perut</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Lingkar Perut" name="perut"
                            aria-label="default input example" require>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="">Tekanan Darah</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Tekanan Darah" name="t_darah"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">GDP</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan GDP" name="gdp"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Cholest Total</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Cholest Total" name="cholest"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">LDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan LDL" name="ldl"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">BMI</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan BMI" name="bmi"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">HDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan HDL" name="hdl"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">TRIGLISERIDA</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan TRIGLISERIDA" name="trigliserida"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Fungsi Ginjal</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Fungsi Ginjal" name="f_ginjal"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Status</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Status" name="status"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Keterangan</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Keterangan" name="keterangan"
                            aria-label="default input example" require>
                    </div>
                </div>
                <hr>
                <div>
                    <button type="submit" class="btn btn-success" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa-solid fa-rotate-left"></i> Reset</button>
                    <a class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                </div>
            </div>
        </form>
    </div>
<br>
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

    mysqli_query($koneksi,"INSERT INTO tb_porlanis set
    id_pasien= '$pasien',
    tb= '$_POST[tb]',
    bb= '$_POST[bb]',
    bmi= '$_POST[bmi]',
    perut= '$_POST[perut]',
    t_darah= '$_POST[t_darah]',
    tgl_pemeriksaan= '$_POST[tgl_pemeriksaan]',
    gdp= '$_POST[gdp]',
    cholest= '$_POST[cholest]',
    ldl= '$_POST[ldl]',
    hdl= '$_POST[hdl]',
    trigliserida= '$_POST[trigliserida]',
    f_ginjal= '$_POST[f_ginjal]',
    p_ulang= '$_POST[p_ulang]',
    status= '$_POST[status]',
    keterangan= '$_POST[keterangan]',
    sts1= '$_POST[sts1]'");

mysqli_query($koneksi," UPDATE tb_porlanis set
sts1= '1' WHERE  id_prolanis='$id'");
}



?>
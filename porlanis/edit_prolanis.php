<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
$kembali = date('d-m-Y', strtotime("6 month", strtotime(date("d-m-Y"))));
date_default_timezone_set("Asia/Singapore");
$id = $_GET['id'];
$pasien = $_GET['pasien'];
$ambil = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien WHERE id_prolanis='$id'");
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
                    <input type="hidden" value="<?php echo $data['alamat']?>" name="alamat">
                    <input type="hidden" value="1" name="status1">
                    <input type="hidden" value="<?php echo $data['sts1']?>" name="sts1">
                    <div>
                        <label for="">Nama</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['nama']?>" placeholder="Masukkan nama" name="nama"
                        aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">No BPJS</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['bpjs']?>" placeholder="Masukkan no BPJS" name="bpjs"
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">NIK</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['nik']?>" placeholder="Masukkan NIk" name="nik"
                            aria-label="default input example" require readonly>
                    </div>
                    <div>
                        <label for="">Tanggal lahir</label>
                        <input class="form-control form-control-sm" type="date" name="tgl_lahir"  value="<?php echo $data['tgl_lahir']?>" aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Tanggal Pemeriksaan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['tgl_pemeriksaan'] ?>" placeholder="Masukkan TB" name="tgl_pemeriksaan"
                            aria-label="default input example" require >
                    </div>
                    <div>
                        <label for="">Rencana Pemeriksaan LAB ulangan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['p_ulang'] ?>" placeholder="Masukkan HDL" name="p_ulang"
                            aria-label="default input example" require >
                    </div>
                    <div>
                        <label for="">TB</label>
                        <input class="form-control form-control-sm" type="number" value="<?php echo $data['tb']?>" placeholder="Masukkan TB" name="tb"
                            aria-label="default input example" autofocus require>
                    </div>
                    <div>
                        <label for="">BB</label>
                        <input class="form-control form-control-sm" type="number" value="<?php echo $data['bb']?>" placeholder="Masukkan BB" name="bb"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">BMI</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['bmi']?>" placeholder="Masukkan BMI" name="bmi"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Lingkar Perut</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['perut']?>" placeholder="Masukkan Lingkar Perut" name="perut"
                            aria-label="default input example" require>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="">Tekanan Darah</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Tekanan Darah" name="t_darah" value="<?php echo $data['t_darah']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">GDP</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan GDP" name="gdp" value="<?php echo $data['gdp']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Cholest Total</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Cholest Total" name="cholest" value="<?php echo $data['cholest']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">LDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan LDL" name="ldl" value="<?php echo $data['ldl']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">HDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan HDL" name="hdl" value="<?php echo $data['hdl']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">HbA1C</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan HbA1C" name="hba1c"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">TRIGLISERIDA</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan TRIGLISERIDA" name="trigliserida" value="<?php echo $data['trigliserida']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Fungsi Ginjal</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Fungsi Ginjal" name="f_ginjal" value="<?php echo $data['f_ginjal']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Status</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Status" name="status" value="<?php echo $data['status']?>"
                            aria-label="default input example" require>
                    </div>
                    <div>
                        <label for="">Keterangan</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Keterangan" name="keterangan" value="<?php echo $data['keterangan']?>"
                            aria-label="default input example" require>
                    </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-success" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <a class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                    </div>
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

    mysqli_query($koneksi,"UPDATE tb_porlanis set
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
    hba1c= '$_POST[hba1c]',
    trigliserida= '$_POST[trigliserida]',
    f_ginjal= '$_POST[f_ginjal]',
    p_ulang= '$_POST[p_ulang]',
    status= '$_POST[status]',
    keterangan= '$_POST[keterangan]',
    sts1= '$_POST[sts1]'
    WHERE id_prolanis = $id");
}



?>
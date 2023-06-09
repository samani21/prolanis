<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';

date_default_timezone_set("Asia/Singapore");
$kembali = date('Y-m-d', strtotime("6 month", strtotime(date("d-m-Y"))));

$id = $_GET['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE id='$id'");
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
                    <input type="hidden" value="<?php echo $data['alamat']?>" name="alamat_p">
                    <input type="hidden" value="<?php echo $data['nama']?>" name="nama">
                    <input type="hidden" value="<?php echo $data['bpjs']?>" name="bpjs">
                    <input type="hidden" value="<?php echo $data['nik']?>" name="nik">
                    <input type="hidden" value="<?php echo $data['tgl_lahir']?>" name="tgl_lahir">
                    <input type="hidden" value="1" name="status1">
                    <input type="hidden" value="0" name="sts1">
                    <div>
                        <label for="">Nama</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $data['nama']?>" placeholder="Masukkan nama" name="nama_p"
                        aria-label="default input example"  readonly>
                    </div>
                    <div>
                        <label for="">No BPJS</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['bpjs']?>" placeholder="Masukkan no BPJS" name="bpjs_p"
                            aria-label="default input example"  readonly>
                    </div>
                    <div>
                        <label for="">NIK</label>
                        <input class="form-control form-control-sm" type="text"  value="<?php echo $data['nik']?>" placeholder="Masukkan NIk" name="nik_p"
                            aria-label="default input example"  readonly>
                    </div>
                    <div>
                        <label for="">Tanggal lahir</label>
                        <input class="form-control form-control-sm" type="date" name="tgl_lahir_p"  value="<?php echo $data['tgl_lahir']?>" aria-label="default input example" >
                    </div>
                    <div>
                        <label for="">Tanggal Pemeriksaan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo date('Y-m-d') ?>" placeholder="Masukkan TB" name="tgl_pemeriksaan"
                            aria-label="default input example" >
                    </div>
                    <div>
                        <label for="">Rencana Pemeriksaan LAB ulangan</label>
                        <input class="form-control form-control-sm" type="text" value="<?php echo $kembali ?>" placeholder="Masukkan HDL" name="p_ulang"
                            aria-label="default input example" >
                    </div>
                    <div>
                        <label for="">TB</label>
                        <input class="form-control form-control-sm" type="text" maxlength="5" placeholder="Masukkan TB" name="tb" id="tb"
                            aria-label="default input example" autofocus required>
                    </div>
                    <div>
                        <label for="">BB</label>
                        <input class="form-control form-control-sm" type="text" maxlength="5" placeholder="Masukkan BB" name="bb" id="bb"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">BMI</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan BMI" name="bmi" id="bmi"
                            aria-label="default input example" required  readonly>
                    </div>
                    <div>
                        <label for="">Lingkar Perut</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Lingkar Perut" name="perut"
                            aria-label="default input example" required>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label for="">Tekanan Darah</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Tekanan Darah" name="t_darah" id="t_darah"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">GDP</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan GDP" name="gdp"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">Cholest Total</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Cholest Total" name="cholest"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">LDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan LDL" name="ldl"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">HDL</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan HDL" name="hdl"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">HbA1C</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan HbA1C" name="hba1c"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">TRIGLISERIDA</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan TRIGLISERIDA" name="trigliserida"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">Fungsi Ginjal</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Masukkan Fungsi Ginjal" name="f_ginjal"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <!-- <label for="">Status</label> -->
                        <input class="form-control form-control-sm" type="hidden" placeholder="Masukkan Status" value="-" name="status" id="status"
                            aria-label="default input example" required>
                    </div>
                    <div>
                        <label for="">Keterangan</label>
                        <select class="form-select" size="3" name="keterangan" multiple aria-label="multiple select example" required>
                            <option value="Diabetes melitus">Diabetes melitus</option>
                            <option value="Hipertensi">Hipertensi</option>
                            <option value="Diabetes melitus & Hipertensi">Diabetes melitus & Hipertensi</option>
                        </select>
                    </div>
                    <hr>
                    <div>
                    <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="#" class="btn btn-secondary" onclick="history.back()">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
                            $("#bmi").keyup(function(){   
                                var a= String($("#bmi").val());
                                    if(a >= 30){
                                        var i = 'Tidak Terkontrol';
                                    }
                            $("#status").val(i);
                            });
                            
                            $("#t_darah").keyup(function(){ 
                                var b= String($("#t_darah").val());  
                                    if(b >= '140/80'){
                                        var i = 'Tidak Terkontrol';
                                    }else{
                                        var i = 'Terkontrol'
                                    }
                            $("#status").val(i);
                            });

                            $("#tb").keyup(function(){   
                            var a = parseFloat($("#tb").val());
                            var b = parseFloat($("#bb").val());
                            var t = a/100;
                            var tb = t*t;
                            var i = b/tb;
                            hasil = i.toFixed(2);
                            $("#bmi").val(hasil);
                            });

                            $("#bb").keyup(function(){   
                            var a = parseFloat($("#tb").val());
                            var b = parseFloat($("#bb").val());
                            var t = a/100;
                            var tb = t*t;
                            var i = b/tb;   
                            hasil = i.toFixed(2);
                            $("#bmi").val(hasil);
                            });
        </script>
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
    mysqli_query($koneksi,"UPDATE tb_pasien set
    nama= '$nama',
    bpjs= '$_POST[bpjs]',
    nik= '$_POST[nik]',
    tgl_lahir= '$_POST[tgl_lahir]',
    alamat= '$_POST[alamat]',
    s_pasien= '$_POST[status1]' WHERE  id='$id'");


$nama_p = addslashes($_POST['nama_p']);
    mysqli_query($koneksi,"INSERT INTO tb_porlanis set
    id_pasien= '$id',
    nama_p= '$nama_p',
    bpjs_p= '$_POST[bpjs_p]',
    nik_p= '$_POST[nik_p]',
    tgl_lahir_p= '$_POST[tgl_lahir_p]',
    alamat_p= '$_POST[alamat_p]',
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
    sts1= '$_POST[sts1]'");
}



?>
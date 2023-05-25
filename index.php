<?php
include 'asset/header.php';
include 'asset/koneksi/koneksi.php';
$t = date('d-m-Y');

date_default_timezone_set("Asia/Singapore");
?>

<div class="container-fluid">
    <h3 align="center">Data Prolanis</h3>
    <hr>
    <a href="pasien/tambah_pasien.php" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah pasien</a>
    <a href="cetak.php" class="btn btn-primary"><i class="fa-solid fa-print"></i> Cetak Excel</a>
    <div class="row g-4">
        <div class="col-6">
            <table class="table table-striped table-hover">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No BPJS</th>
                    <th>NIK</th>
                    <th>Tgl lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                        $batas = 10;
                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
         
                        $previous = $halaman - 1;
                        $next = $halaman + 1;
                        
                        $data = mysqli_query($koneksi,"select * from tb_pasien");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
         
                        $data_pegawai = mysqli_query($koneksi,"select * from tb_pasien limit $halaman_awal, $batas");
                        $nomor = $halaman_awal+1;

                        while($data = mysqli_fetch_array($data_pegawai)){
                    ?>

                    <tr>
                        <td><?php echo $nomor++ ?></td>
                        <td style="text-transform: capitalize;"><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['bpjs'] ?></td>
                        <td><?php echo $data['nik'] ?></td>
                        <td><?php echo $data['tgl_lahir'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td>
                            <a href="pasien/detail.php?id=<?php echo $data['id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-address-card"></i> Lihat</a>
                            <?php
                                if($data['s_pasien'] == '0'){
                                    ?>
                            <a href="porlanis/tambah_prolanis.php?id=<?php echo $data['id']?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-left">
                    <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                    </li>
                    <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                    </li>
                    <?php
				}
				?>
                    <li class="page-item">
                        <a class="page-link"
                            <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>

        </div>
        <div class="col-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>BPJS</th>
                        <th>Tgl lahir</th>
                        <th>tgl pemeriksaan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                        $batas = 10;
                        $prolanis = isset($_GET['prolanis'])?(int)$_GET['prolanis'] : 1;
                        $halaman_awal = ($prolanis>1) ? ($prolanis * $batas) - $batas : 0;	
         
                        $previous = $prolanis - 1;
                        $next = $prolanis + 1;
                        
                        $data = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien  ORDER BY sts1,p_ulang ASC");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman1 = ceil($jumlah_data / $batas);
         
                        $data_prolanis = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien  ORDER BY sts1,p_ulang ASC limit $halaman_awal, $batas");
                        $no = $halaman_awal+1;

                        while($dt = mysqli_fetch_array($data_prolanis)){
                    ?>
                            <tr>
                            <td class="<?php
                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                    echo 'text-danger';
                                }
                            ?>"><?php echo $no++ ?></td>
                            <td class="<?php
                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                    echo 'text-danger';
                                }
                            ?>" style="text-transform: capitalize;"><?php echo $dt['nama'] ?></td>
                            <td class="<?php
                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                    echo 'text-danger';
                                }
                            ?>"><?php echo $dt['bpjs'] ?></td>
                            <td class="<?php
                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                    echo 'text-danger';
                                }
                            ?>"><?php echo $dt['tgl_lahir'] ?></td>
                            <td class="<?php
                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                    echo 'text-danger';
                                }
                            ?>"><?php echo $dt['p_ulang'] ?></td>   
                            <td>
                            <?php

                                if($dt['sts1'] == '0' && $dt['p_ulang'] <= $t){
                                   ?>
                                    <a href="porlanis/periksa_prolanis.php?id=<?php echo $dt['id_prolanis']?>&pasien=<?php echo $dt['id_pasien']?>" class="btn btn-primary"><i class="fa-solid fa-list-check"></i> Periksa</a>
                                   <?php
                                }
                                if($dt['sts1'] == '1' && $dt['p_ulang'] <= $t){
                                    ?>
                                      <a href="porlanis/cek.php?id=<?php echo $dt['id_prolanis']?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i> Cek</a>
                                    <?php
                                 }
                            ?>
                            </td>
                            </tr>
                 
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-left">
                    <li class="page-item">
                        <a class="page-link" <?php if($prolanis > 1){ echo "href='?prolanis=$previous'"; } ?>>Previous</a>
                    </li>
                    <?php 
				for($x=1;$x<=$total_halaman1;$x++){
					?>
                    <li class="page-item"><a class="page-link" href="?prolanis=<?php echo $x ?>"><?php echo $x; ?></a>
                    </li>
                    <?php
				}
				?>
                    <li class="page-item">
                        <a class="page-link"
                            <?php if($prolanis < $total_halaman) { echo "href='?prolanis=$next'"; } ?>>Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
</body>

</html>
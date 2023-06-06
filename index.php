<?php
include 'asset/header.php';
include 'asset/koneksi/koneksi.php';

date_default_timezone_set("Asia/Singapore");
$t = date('d-m-Y');

@$c = $_GET['cari'];
?>

<div class="container-fluid">
    <h3 align="center">Prolanis</h3>
    <hr>
    <div class="row g-2">
        <div class="col-3">
            <a href="pasien/tambah_pasien.php" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah pasien</a>
            <a href="cetak.php" class="btn btn-primary"><i class="fa-solid fa-print"></i> Cetak </a>
        </div>
        <div class="col-3">
        <form action="cetak_tgl.php" method="get">
              <div class="input-group mb-3">
              <input type="text" name="tgl" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                <button class="btn btn-primary"><i class="fa-solid fa-print"></i> Cetak</button>
              </div>
            </form>
        </div>
        <div class="col-6">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" aria-label="Recipient's username" name="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-5">
            <span class="tex"><h4 align="center">Data Pasien</h4><hr></span>
        <div class="table-responsive bg-white" id="no-more-tables">
        <table class="table table-striped table-hover">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No BPJS</th>
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
                        
                        $data = mysqli_query($koneksi,"SELECT * FROM tb_pasien ORDER BY s_pasien ASC");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
         
                        $data_pegawai = mysqli_query($koneksi,"SELECT * FROM `tb_pasien` WHERE nama like '$c%' OR bpjs like '$c%'  ORDER BY s_pasien ASC limit $halaman_awal, $batas");
                        $nomor = $halaman_awal+1;

                        while($data = mysqli_fetch_array($data_pegawai)){
                    ?>
                    <tr>
                        <td data-title="No"><?php echo $nomor++ ?></td>
                        <td style="text-transform: capitalize;" data-title="Nama"><?php echo $data['nama'] ?></td>
                        <td data-title="No BPJS"><?php echo $data['bpjs'] ?></td>
                        <td data-title="Tanggal Lahir"><?php echo $data['tgl_lahir'] ?></td>
                        <td data-title="Alamat"><?php echo $data['alamat'] ?></td>
                        <td>
                            <a href="pasien/detail.php?id=<?php echo $data['id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-address-card"></i></a>
                            <a href="pasien/hapus.php?id=<?php echo $data['id'] ?>"  onclick="javascript: return confirm('Konfirmasi data akan dihapus');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
        </div>
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
        <div class="col-7">
            <span class="tex"><h4 align="center">Data Prolanis</h4><hr></span>
            <div class="table-responsive bg-white" id="no-more-tables">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>BPJS</th>
                            <th>Tgl lahir</th>
                            <th>tgl pemeriksaan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
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
                            
                            $data = mysqli_query($koneksi,"SELECT * FROM tb_porlanis JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien  ORDER BY sts1,p_ulang ASC");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman1 = ceil($jumlah_data / $batas);
            
                            $data_prolanis = mysqli_query($koneksi,"SELECT * FROM tb_porlanis JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien WHERE nama like '$c%'  OR bpjs like '$c%' ORDER BY sts1,p_ulang ASC limit $halaman_awal, $batas");
                            $no = $halaman_awal+1;

                            while($dt = mysqli_fetch_array($data_prolanis)){
                        ?>
                                <tr>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Nomor"><?php echo $no++ ?></td>
                                <td class="<?php
                                if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                    echo 'text-danger';
                                }
                            }
                                ?>" style="text-transform: capitalize;" data-title="Nama" ><?php echo $dt['nama'] ?></td>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>"><?php echo $dt['bpjs'] ?></td>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Tgl Lahir"><?php echo $dt['tgl_lahir'] ?></td>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Pemeriksaan Ulang"><?php if( $dt['p_ulang'] == 0000-00-00){
                                    echo '-';
                                }else{
                                    echo  $dt['p_ulang'];
                                } ?></td>   
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Status"><?php if($dt['bmi'] >= 30 || $dt['t_darah'] >= '140/80'){
                                    echo "Tidak Terkontrol";
                                }else{
                                    echo "Terkontrol";
                                } ?></td>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Keterangan"><?php echo $dt['keterangan'] ?></td>
                                <td class="<?php
                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                    if(($dt['sts1']) == '0'){
                                        echo 'text-danger';
                                    }
                                }
                                ?>" data-title="Aksi">
                                <?php

                                    if(strtotime($dt['p_ulang']) <= strtotime($t)){
                                        if(($dt['sts1']) == '0'){
                                            ?>
                                            <a href="porlanis/periksa_prolanis.php?id=<?php echo $dt['id_prolanis']?>&pasien=<?php echo $dt['id_pasien']?>" class="btn btn-primary"><i class="fa-solid fa-list-check"></i></a>
                                            <?php
                                        }
                                    }
                                    
                                ?>
                                    <a href="porlanis/cek.php?id=<?php echo $dt['id_prolanis']?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>

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
</div>
</body>

</html>
<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
$id = $_GET['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM tb_pasien WHERE id='$id'");
$data = mysqli_fetch_array($ambil)
?>
    <div class="container-fluid">
        <div align="center">
            <h3>Data Pasien</h3>
        </div>
        <hr>
        <div>
        <button class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</button>
        <a href="edit_pasien.php?id=<?php echo $id?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"> </i> Data pasien</a>
        </div>
        <br>
        <div class="row g-4">
            <div class="col-6">
                <span class="tex"><h4 align="center">Data Pasien</h4><hr></span>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Nama </th>
                        <td><?php echo $data['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>NIK </th>
                        <td><?php echo $data['nik'] ?></td>
                    </tr>
                    <tr>
                        <th>BPJS </th>
                        <td><?php echo $data['bpjs'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir </th>
                        <td><?php echo $data['tgl_lahir'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $data['alamat'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <span class="tex"><h4 align="center">Riwayat Prolanis</h4><hr></span>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl pemeriksaan</th>
                            <th>Tgl pemeriksaan ulang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no =1;
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien WHERE id_pasien = $id");
                            while($dt = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $dt['tgl_pemeriksaan'] ?></td>
                                <td><?php echo $dt['p_ulang'] ?></td>
                                <td>
                                     <a href="../porlanis/cek.php?id=<?php echo $dt['id_prolanis']?>" class="btn btn-success">Cek</a>    
                                </td>
                            </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
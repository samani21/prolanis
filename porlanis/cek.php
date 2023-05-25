<?php
include '../asset/header.php';
include '../asset/koneksi/koneksi.php';
$id = $_GET['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien WHERE id_prolanis='$id'");
$data = mysqli_fetch_array($ambil)
?>
    <div class="container-fluid">
        <div align="center">
            <h3>Data Prolanis</h3>
        </div>
        <hr>
        <div>
        <button class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</button>
        <a href="edit_prolanis.php?id=<?php echo $id?>&pasien=<?php echo $data['id_pasien'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"> </i> Data pasien</a>
        </div>
        <br>
        <div class="row g-4">
            <div class="col-6">
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
                    <tr>
                        <th>TB</th>
                        <td><?php echo $data['tb'] ?></td>
                    </tr>
                    <tr>
                        <th>BB</th>
                        <td><?php echo $data['bb'] ?></td>
                    </tr>
                    <tr>
                        <th>BMI</th>
                        <td><?php echo $data['bmi'] ?></td>
                    </tr>
                    <tr>
                        <th>Lingkar Perut</th>
                        <td><?php echo $data['perut'] ?></td>
                    </tr>
                    <tr>
                        <th>Tekanan Darah</th>
                        <td><?php echo $data['t_darah'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pemeriksaan</th>
                        <td><?php echo $data['tgl_pemeriksaan'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>GDP</th>
                        <td><?php echo $data['gdp'] ?></td>
                    </tr>
                    <tr>
                        <th>Cholest Total</th>
                        <td><?php echo $data['cholest'] ?></td>
                    </tr>
                    <tr>
                        <th>LDL</th>
                        <td><?php echo $data['ldl'] ?></td>
                    </tr>
                    <tr>
                        <th>HDL</th>
                        <td><?php echo $data['hdl'] ?></td>
                    </tr>
                    <tr>
                        <th>TRIGLISERIDA</th>
                        <td><?php echo $data['trigliserida'] ?></td>
                    </tr>
                    <tr>
                        <th>Fungsi Ginjal</th>
                        <td><?php echo $data['f_ginjal'] ?></td>
                    </tr>
                    <tr>
                        <th>Fungsi Ginjal</th>
                        <td><?php echo $data['f_ginjal'] ?></td>
                    </tr>
                    <tr>
                        <th>Rencana Pemeriksaan LAB Ulang</th>
                        <td><?php echo $data['p_ulang'] ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo $data['status'] ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?php echo $data['keterangan'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php
      include "../asset/koneksi/koneksi.php";
      $id = $_GET['id'];
      $pasien = $_GET['pasien'];
      $ambilData = mysqli_query($koneksi,"DELETE FROM tb_porlanis WHERE id_prolanis='$id'");
      
      $update = mysqli_query($koneksi,"UPDATE tb_pasien SET s_pasien = '0' WHERE id=$pasien ");
?> 
 <script type="text/javascript">
        alert('Data berhasil dihapus');
        window.location="../index.php"
    </script>
<?php
      include "../asset/koneksi/koneksi.php";
      $id = $_GET['id'];
      $ambilData = mysqli_query($koneksi,"DELETE FROM tb_pasien WHERE id='$id'");
      
?> 
 <script type="text/javascript">
        alert('Data berhasil dihapus');
        window.location="../index.php"
    </script>
<?php 
require 'fungsi.php';
$id = $_GET["id"];


    if( hapus ($id) > 0 ){
        
        ?>
        <script>
            alert("Data Berhasil Di Hapus");
            setTimeout("location.href = 'index.php';",500);
        </script>
        <?php
    }

?>


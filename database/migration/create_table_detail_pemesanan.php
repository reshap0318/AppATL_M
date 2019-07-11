<?php

  class create_table_detail_pemesanan
  {

      private $koneksi;

      function __construct($conn){
        $this->koneksi = $conn;
        $this->drop();
        $this->create();
      }

      function create()
      {
        $sql = "";
        if(!mysqli_query($this->koneksi,$sql)){
          echo "<br>Gagal Membuat Table Detail Pemesanan<br>".mysqli_error($this->koneksi);
        }else{
          echo "<br>Berhasil Membuat Table Detail Pemesanan";
        }
      }

      function drop()
      {
          $sql = "DROP TABLE `tb_625`.`detail_pemesanan`";
          if(!mysqli_query($this->koneksi,$sql)){
            echo "Gagal Menghapus Table Detail Pemesanan<br>".mysqli_error($this->koneksi)."<br>";
          }else{
            echo "Berhasil Menghapus Table Detail Pemesanan<br>";
          }
      }

  }


?>
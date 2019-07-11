<?php
include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_icha/blank.php';

include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_icha/model/user.php';
$user = new user($conn);
?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/tb_pbd_icha/view/");
    }
  }

?>
<?php startblock('title') ?> Edit Users <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/tb_pbd_icha/view/management/user">Users</a>
<li class="breadcrumb-item"><a href="#!">Edit</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Edit Users
<?php endblock() ?>

<?php startblock('content') ?>

<div class="box">
  <div class="box-header with-border">
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form id="second" action="/tb_pbd_icha/controller/userController.php?aksi=update" method="post" novalidate>
        <?php
          $username = $_GET['username'];
          foreach ($user->data($username) as $data) {
        ?>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_icha/view/management/user/_field.php'; ?>

        <<?php } ?>
        <div class="row">
            <label class="col-sm-2"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
            </div>
        </div>
    </form>
  </div>
</div>
<?php endblock() ?>

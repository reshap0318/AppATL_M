<?php include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_icha/blank.php'; ?>
<?php

  if(isset($hak_akses)){
    if($hak_akses==3){
      array_push($_SESSION['pesan'],['eror','Anda Tidak Memiliki Akses Kesini']);
      header("location:/tb_pbd_icha/view/");
    }
  }

?>
<?php startblock('title') ?> Create Users <?php endblock() ?>
<?php startblock('breadcrumb-link') ?>
<li class="breadcrumb-item"><a href="/tb_pbd_icha/view/management/user/index.php">User</a>
<li class="breadcrumb-item"><a href="#!">Create</a>
<?php endblock() ?>
<?php startblock('breadcrumb-title') ?>
Create Users
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
    <form id="second" action="/tb_pbd_icha/controller/userController.php?aksi=create" method="post" novalidate>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/tb_pbd_icha/view/management/user/_field.php'; ?>
        <div class="row">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
            </div>
        </div>
    </form>
  </div>
</div>
<?php endblock() ?>

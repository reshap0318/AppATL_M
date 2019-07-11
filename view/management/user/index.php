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

<?php startblock('title') ?> Users Management <?php endblock() ?>

<?php startblock('lib-css') ?>
  <link rel="stylesheet" href="/tb_pbd_icha/editor/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/tb_pbd_icha/editor/bower_components/data-table/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/css/buttons.dataTables.min.css">
<?php endblock() ?>

<?php startblock('lib-js') ?>
  <!-- DataTables -->
  <script src="/tb_pbd_icha/editor/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="/tb_pbd_icha/editor/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/js/jszip.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/js/pdfmake.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/js/vfs_fonts.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/dataTables.buttons.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/buttons.flash.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/jszip.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/pdfmake.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/vfs_fonts.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/data-table/extensions/buttons/js/buttons.colVis.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="/tb_pbd_icha/editor/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<?php endblock() ?>

<?php startblock('breadcrumb-link') ?>
<li class="active">Users Management</li>
<?php endblock() ?>

<?php startblock('breadcrumb-title') ?>
Users Management
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
    <div class="">
      <table id="tableuser" class="table table-bordered table-hover" style="width:100%">
          <thead>
              <tr>
                  <th style="width:20px" class="text-center">NO</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th style="width:100px">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=0;
              foreach ($user->data() as $data) {
            ?>
              <tr>
                  <td style="width:20px" class="text-center"><?php echo ++$no;?></td>
                  <td><?php echo $data['username'];?></td>
                  <td><?php echo $data['nama']?></td>
                  <td><?php if($data['hak_akses'] == 1 ){echo "Admin";}elseif($data['hak_akses'] == 2){echo "Pemilik";}elseif($data['hak_akses'] == 3){echo "Peminjam";}?></td>
                  <td style="width:100px">
                    <?php if($hak_akses==1 || $hak_akses==2){ ?>
                    <a href="/tb_pbd_icha/view/management/user/edit.php?username=<?php echo $data['username']; ?>" class="btn btn-primary btn-xs">Edit</a>
                    <?php } ?>
                    <?php if($hak_akses==1 || $hak_akses==2){ ?>
                    <a href="#" class="btn btn-danger btn-xs" onclick="hapus('<?php echo $data['username']; ?>')">Delete</a>
                    <?php } ?>
                  </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
      <form class="" id="formdelete" style="display:none" action="/tb_pbd_icha/controller/userController.php?aksi=delete" method="post">
        <input type="text" name="username" value="" id="delete_id">
      </form>
    </div>
  </div>
</div>
<?php endblock() ?>

<?php startblock('js') ?>
  <!-- info lebih lanjut bisa di cek di : -->
  <!--editor/assets/pages/data-table/js/data-table-custom.js"-->
  <script type="text/javascript">
      $('#tableuser').DataTable(
        {
        "info":     false,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah User',
            action: function(e, dt, node, config)
            {
              window.location.assign("/tb_pbd_icha/view/management/user/create.php");
            }
        },
        {
            extend: 'copy',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'excel',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'pdf',
            className: 'btn-inverse',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        }]
      });
  </script>

  <script type="text/javascript">
    function hapus(id) {
      if(confirm('yakin ingin menghapus data ini?') == true){
        document.getElementById('delete_id').value = id;
        document.getElementById('formdelete').submit();
      }
    }
  </script>
<?php endblock() ?>

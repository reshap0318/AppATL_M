<?php
  session_start();
  session_destroy();
  header('location:/tb_pbd_icha/view/auth/login.php');
?>

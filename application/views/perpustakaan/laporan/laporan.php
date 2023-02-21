<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">
 <!-- navbar -->
 <?php $this->load->view('perpustakaan/style/navbar')?>
 <!-- navbar -->
  <!-- Sidebar -->
  <?php $this->load->view('perpustakaan/style/sidebar')?>
  <!-- Sidebar -->

  <div class="content-wrapper">
      <div class="container-fluid">
    </div>
  </div>
<?php $this->load->view('perpustakaan/style/js')?>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Kerja UKS</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Program Kerja UKS</div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body text-center mx-auto">
                                <img src="https://imgv2-2-f.scribdassets.com/img/document/422317076/original/e35f3c1447/1682044823?v=1" alt="" srcset="">
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <script>
        function hapus_periksa(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Pojok_Baca/hapus_periksa/') ?>" + id;
            }
        }
    </script>
</body>

</html>
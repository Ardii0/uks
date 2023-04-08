<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PetugasAlumni</title>
    <?php $this->load->view('petugasalumni/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar')?>
        <?php $this->load->view('petugasalumni/style/sidebar')?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Petugas Alumni</p>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $this->load->view('petugasalumni/style/js')?>
</body>

</html>
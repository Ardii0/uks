<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>

    <style>
    body {
        font-family: "Ubuntu", sans-serif;
    }

    .profile-card-1 {
        background: white;
        border-radius: 10px;
        text-align: center;
        box-shadow: 4px 4px 10px #999;
        box-sizing: border-box;
        overflow: hidden;
    }

    .profile-card-1 .img img {
        width: 160px;
        height: 160px;
        padding: 3px;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.6);
        position: absolute;
        left: calc(50% - 84px);
        top: 26px;
    }

    .profile-card-1 .img {
        height: 130px;
        width: 100%;
        background-image: linear-gradient(rgba(128, 222, 234, 1.0), rgba(0, 172, 193, 1.0)), url("bac.jpg");
        padding: 20px;
        box-sizing: border-box;
        position: relative;
    }

    .profile-card-1 .mid-section {
        height: 200px;
        width: 100%;
        top: 200px;
        left: 0;
        padding: 10px 20px 0;
        box-sizing: border-box;
        background: white;
    }

    .profile-card-1 .mid-section .name {
        color: #333333;
        font-size: 1.4em;
        margin-top: 27px;
        background: rgba(255, 255, 255, 0.1);
        font-weight: bold;
    }

    .profile-card-1 .mid-section .description {
        color: gray;
        text-decoration: none;
        font-size: 0.9em;
    }

    .profile-card-1 .mid-section .line {
        background: #54B4D3;
        width: 90%;
        height: 2px;
        margin: 5px auto -3px;
    }

    /* image after effect */
    .profile-card-1 .img::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        left: calc(50% - 91.5px);
        top: 20px;
        border: 3px solid rgba(255, 255, 255, 0.4);
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid ">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Jabatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Detail Jabatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow pb-3">
                <div class=" mx-2 pt-3 d-flex justify-content-between">
                        <div class="">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Detail Jabatan</h4>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row justify-content-center">
                    <?php $id=0; foreach($detail_jabatan as $data): $id++?>
                    <div class="col-lg-4 p-3">
                        <div class="profile-card-1 pb-3">
                            <!--image-->
                            <div class="img">
                                <img src="https://tinypic.host/images/2022/12/19/img_avatar.png" />
                            </div>
                            <a class="view-more" href="">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                            <!--text-->
                            <div class="mid-section">
                                <div class="name"><?php echo $data->nama_guru;?></div>


                                <div class="description">
                                <?php echo tampil_jabatanGuruById($data->id_jabatan) ?> <br> <?php echo $data->alamat;?>
                                </div>

                                <div class="line"></div>
                                <div class="mt-2 text-center" style="font-size: 12px">
                                    <div class="row">
                                        <div class="col">NIK</div>
                                        <div class="col">:</div>
                                        <div class="col"><?php echo $data->nik;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">NIP/Y</div>
                                        <div class="col">:</div>
                                        <div class="col"><?php echo $data->nip;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Jenis Kelamin</div>
                                        <div class="col">:</div>
                                        <div class="col"><?php $gender = tampil_jekel_guru_byid($data->kode_guru) == "L" ? 'Laki - Laki' : 'Perempuan'; echo $gender ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Nomor Telepon</div>
                                        <div class="col">:</div>
                                        <div class="col"><?php echo $data->no_hp;?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>

</body>

</html>


</html>
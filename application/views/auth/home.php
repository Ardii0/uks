<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php $this->load->view('style/head')?>
    <style>
    body {
        background-color: #f4f6f9;
    }

    .visi,
    .motto {
        text-align: center;
        border: 1px solid #4ADE80;
        border-radius: 8px;
        height: 110px;
    }

    h5 {
        background-color: #4ADE80;
        padding: 8px;
        color: white;
    }

    li {
        line-height: 24px;
        font-size: 16px;
        margin-right: 20px;
        text-align: justify;
    }

    .tabs {
        position: relative;
        display: flex;
        min-height: 300px;
        border-radius: 8px 8px 0 0;
    }

    .tabby-tab {
        flex: 1;
    }

    .tabby-tab label {
        display: block;
        box-sizing: border-box;
        height: 42px;
        padding: 10px;
        text-align: center;
        border: 1px solid #4ADE80;
        color: #4ADE80;
        cursor: pointer;
        transition: background 0.5s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tabby-tab label:hover {
        background: #4ADE80;
        color: white;
    }

    .tabby-content {
        position: absolute;
        left: 0;
        top: 40px;
        border-radius: 0 0 8px 8px;
        padding-top: 15px;
        opacity: 0;
        border-left: 1px solid #4ADE80;
        border-right: 1px solid #4ADE80;
        border-bottom: 1px solid #4ADE80;
    }

    /* MAKE IT WORK ----- */

    .tabby-tab [type=radio] {
        display: none;
    }

    [type=radio]:checked~label {
        background: #4ADE80;
        color: white;
        z-index: 2;
    }

    [type=radio]:checked~label~.tabby-content {
        z-index: 1;

        /* show/hide */
        opacity: 1;
        transform: scale(1);
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper py-3">
            <div class="container-fluid mb-5 px-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex h-100">
                            <div class="justify-content-center align-self-center">
                                <h3>
                                    <strong>Selamat Datang di UKS,</strong>
                                    <br />
                                    SMP N 1 Semarang <br />
                                </h3>
                                <p class="mt-3 text-justify">
                                    SMP Negeri 1 Semarang merupakan salah satu Sekolah Menengah Pertama Negeri yang ada
                                    di Provinsi Jawa Tengah, Indonesia di mana Jenderal Besar Ahmad Yani dan Pierre
                                    Andries Tendean mengenyam pendidikan masa SMP nya.
                                </p>
                                <a href="<?php echo base_url('admin/') ?>">
                                    <button class="btn text-bold text-white mt-3" style="background-color: #4ADE80">
                                        Dashboard
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?php echo base_url('assets/home.png'); ?>" width="100%">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="motto">
                            <h5 class="text-bold">Motto</h5>
                            <h6><b> TERDEPAN</b></h6>
                            <p>“ Terintegritas Dedikasi Empati Profesional Akurat Normatif ”</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="visi">
                            <h5 class="text-bold">Visi</h5>
                            <p>“ Terwujudnya Pelayanan Kesehatan Yang
                                Bermutu Menuju Sekolah
                                Sehat, Aman, Bersih, Dan Menyenangkan ”</p>
                        </div>
                    </div>
                </div>

                <!-- tab -->
                <div class="mt-3">
                    <div class="tabs">
                        <div class="tabby-tab">
                            <input type="radio" id="tab-1" name="tabby-tabs" checked>
                            <label for="tab-1">Indikator</label>
                            <div class="tabby-content">
                                <ol type="1">
                                    <li>Terpenuhinya hak dan kebutuhan murid akan kesehatan.</li>
                                    <li>Terdapat komitmen dari sekolah yang memuat tentang sekolah sehat, aman ,
                                        bersih dan menyenangkan.</li>
                                    <li>Terdapat Tim pendampingan sekolah sehat, aman, bersih, dan menyenangkan.
                                    </li>
                                    <li>Kurikulum sekolah menempatkan pengetahuan tentang kesehatan terintegrasi
                                        dengan mata pelajaran.</li>
                                    <li>Terdapat rencana dan aksi secara berkala, tahunan, dan bersinambungan
                                        untuk mewujudkan sekolah sehat, aman, ramah anak, dan menyenangkan yang
                                        terintegrasi dalam kebijakan Usaha Kesehatan Sekolah, Sekolah Adiwiyata,
                                        Sekolah Ramah Anak, Sekolah Standar Kependudukan.</li>
                                    <li>Tercukupinya kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                        jamban, air bersih, sampah dan pengelolannya).</li>
                                    <li>Lingkungan Sekolah terbebas dari perundungan, pergaulan bebas, asap
                                        rokok dan narkoba (NAPZA).</li>
                                    <li>Terselenggaranya kegiatan untuk menjaga kesehatan warga sekolah.</li>
                                    <li>Terdapat rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                                        perlindungan dari bencana.</li>
                                </ol>
                            </div>
                        </div>

                        <div class="tabby-tab">
                            <input type="radio" id="tab-2" name="tabby-tabs">
                            <label for="tab-2">Misi</label>
                            <div class="tabby-content">
                                <ol type="1">
                                    <li>Menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah sesuai
                                        dengan standar keamanan dan kenyamanan.</li>
                                    <li>Melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan dan
                                        kesehatan.</li>
                                    <li>Membentuk Tim Pendampingan Sekolah sehat, aman, bersih, dan
                                        menyenangkan.</li>
                                    <li>Semua mata pelajaran mengintegrasikan sekolah sehat, aman, bersih, dan
                                        menyenangkan.</li>
                                    <li>Menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman, ramah
                                        anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha Kesehatan
                                        Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah Standar
                                        Kependudukan.</li>
                                    <li>Menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                        jamban, air bersih, sampah dan pengelolannya).</li>
                                    <li>Menciptakan Lingkungan Sekolah terbebas dari perundungan, pergaulan
                                        bebas, asap rokok dan narkoba (NAPZA).</li>
                                    <li>Melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan warga
                                        sekolah.</li>
                                    <li>Menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                                        perlindungan dari bencana.</li>
                                </ol>
                            </div>
                        </div>

                        <div class="tabby-tab">
                            <input type="radio" id="tab-3" name="tabby-tabs">
                            <label for="tab-3">Tujuan</label>
                            <div class="tabby-content">
                                <ol type="1">
                                    <li>Dapat menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah
                                        sesuai dengan standar keamanan dan kenyamanan.</li>
                                    <li>Dapat melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan
                                        dan kesehatan.</li>
                                    <li>Dapat membentuk Tim Pendampingan Sekolah sehat, aman, bersih, dan
                                        menyenangkan.</li>
                                    <li>Dapat mengintegrasikakn sekolah sehat, aman, bersih, dan menyenangkan
                                        pada semua mata pelajaran.</li>
                                    <li>Dapat menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman,
                                        ramah anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha
                                        Kesehatan Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah
                                        Standar Kependudukan.</li>
                                    <li>Dapat menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                        jamban, air bersih, sampah dan pengelolannya).</li>
                                    <li>Dapat menciptakan Lingkungan Sekolah terbebas dari perundungan,
                                        pergaulan bebas, asap rokok dan narkoba (NAPZA).</li>
                                    <li>Dapat melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan
                                        warga sekolahDapat mengoptimalkan kegiatan sesuai standar sekolah sehat,
                                        aman, dan menyenangkan.</li>
                                    <li>Dapat menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah
                                        untuk perlindungan dari bencana</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <?php $this->load->view('style/js')?>
    <?php if ($this->session->flashdata('yeay')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('yeay')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1000,
    });
    </script>
    <?php if (isset($_SESSION['yeay'])) {
            unset($_SESSION['yeay']);
        }
    endif; ?>

</body>

</html>
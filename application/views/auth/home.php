<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php $this->load->view('/style/head')?>
    <style>
    body {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    body::-webkit-scrollbar {
        display: none;
    }

    .header {
        background-color: #f4f6f9;
        /* box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px; */
    }

    /* CSS BUTTON */
    .button-dashboard {
        appearance: none;
        background-color: #4ADE80;
        border: none;
        border-radius: 15px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 18px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 30px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 25%;
        will-change: transform;
    }

    .button-dashboard:disabled {
        pointer-events: none;
    }

    .button-dashboard:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button-dashboard:active {
        box-shadow: none;
        transform: translateY(0);
    }

    /* content */

    .visi,
    .motto {
        text-align: center;
        /* border: 1px solid #4ADE80; */
        border-radius: 8px;
        height: 140px;
    }

    p {
        font-size: 18px;
    }

    h5 {
        background-color: #4ADE80;
        padding: 13px;
        color: white;
    }

    li {
        line-height: 24px;
        font-size: 18px;
        margin-right: 20px;
        text-align: justify;
    }

    .tabs {
        position: relative;
        display: flex;
        min-height: 300px;
        border-radius: 8px 8px 0 0;
        margin-bottom: 80px;
    }

    .tabby-tab {
        flex: 1;
    }

    .tabby-tab label {
        display: block;
        box-sizing: border-box;
        height: 47px;
        padding: 10px;
        text-align: center;
        border: 1px solid #4ADE80;
        color: #4ADE80;
        cursor: pointer;
        transition: background 0.5s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
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

    /* footer */
    .footer-atas {
        background-color: #4ADE80;
    }

    .footer-bawah {
        background-color: #47b56f;
        font-size: 17px;
    }

    .judul-footer {
        font-size: 25px;
        font-weight: bold;
    }
    </style>
</head>

<body class="all">
    <div class="header px-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex h-100">
                    <div class="justify-content-center align-self-center">
                        <h1 style="font-size: 40px;">
                            <strong>Selamat Datang di UKS,</strong>
                            <br />
                            SMP N 1 Semarang <br />
                        </h1>
                        <p class="mt-3 text-justify" style="font-size: 20px;">
                            SMP Negeri 1 Semarang merupakan salah satu Sekolah Menengah Pertama Negeri yang ada
                            di Provinsi Jawa Tengah, Indonesia di mana Jenderal Besar Ahmad Yani dan Pierre
                            Andries Tendean mengenyam pendidikan masa SMP nya.
                        </p>
                        <a href="<?php echo base_url('admin/') ?>">
                            <button class="btn mt-3 button-dashboard">
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
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card motto">
                    <h5 class="text-bold">Motto</h5>
                    <p class="p-2"><b> TERDEPAN</b> <br>
                        “ Terintegritas Dedikasi Empati Profesional Akurat Normatif ”</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card visi">
                    <h5 class="text-bold">Visi</h5>
                    <p class="p-2">“ Terwujudnya Pelayanan Kesehatan Yang
                        Bermutu Menuju Sekolah
                        Sehat, Aman, Bersih, Dan Menyenangkan ”</p>
                </div>
            </div>
        </div>
    </div>

    <!-- tab -->
    <div class="container mt-4">
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

    <!-- footer -->
    <div class="footer-atas text-white">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Tentang UKS</div>
                    <p class="text-justify mt-3">
                        Usaha Kesehatan Sekolah disingkat UKS atau Unit Kesehatan Sekolah adalah program pemerintah
                        untuk meningkatkan pelayanan kesehatan, pendidikan kesehatan dan pembinaan lingkungan sekolah
                        sehat atau kemampuan hidup sehat bagi warga sekolah.
                    </p>
                </div>
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Hubungi Kami</div>
                    <p class="text-justify mt-3">
                        <i class="fas fa-home"></i> Jl. Ronggolawe Tim., Gisikdrono, Kec. Semarang Barat, Kota Semarang,
                        Jawa Tengah 50149
                    </p>
                    <p class="text-justify">
                        <i class="fas fa-envelope"></i> smpn1.semarangkota.go.id
                    </p>
                    <p class="text-justify">
                        <i class="fas fa-phone"></i> (024) 7606340
                    </p>
                </div>
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Peta Lokasi</div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2417169928513!2d110.38655411477316!3d-6.980778694956982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b2a9091d9c1%3A0xf52f9298147036b!2sSMPN%201%20Semarang!5e0!3m2!1sid!2sid!4v1684480961361!5m2!1sid!2sid"
                        style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="mt-3"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bawah py-3 text-white text-center">
        © 2023 Copyright: SMP N 1 Semarang
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah anggota</title>
    <?php $this->load->view('perpustakaan/style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('perpustakaan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('perpustakaan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="p-5 bg-white">
                        <div class="d-none justify-content-center">
                            <table class="" id="cetak" style="width: 420px;">
                                <thead class="">
                                    <td class="text-center p-1"
                                        style="border-top: 1px solid; border-left: 1px solid; width: 125px">
                                        <img class="" src="<?php echo base_url('/frontend/img/logobinusa.png') ?>"
                                            width="90px" height="80px" alt="">
                                    </td>
                                    <td style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
                                        <div class="card-text text-center">PERPUSTAKAAN
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEKOLAH <br />
                                            SMK &nbsp;&nbsp; BINA &nbsp; NUSANTARA <br />
                                            <span style="font-size: 16px">Jl. Kemantren</span>
                                        </div>
                                    </td>
                                </thead>
                                <tbody class="">
                                    <td class="p-1"
                                        style="border-left: 1px solid; border-bottom: 1px solid; border-top: 1px solid;">
                                        <div class="border justify-content-center d-flex align-items-center"
                                            style="height: 140px">
                                            <div class="">
                                                2x3
                                            </div>
                                        </div>
                                    </td>
                                    <?php foreach ($anggota as $data): ?>
                                    <td style="border: 1px solid">
                                        <div class="text-center" style="height: 185px">
                                            <div class="text-center p-1">
                                                <h6>KARTU &nbsp;&nbsp; ANGGOTA</h6>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        Nama
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        NISN
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo tampil_nisn_siswa_byid($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        Kelas
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo  tampil_kelasdaftar_ByIdSiswa($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class=" p-4">
                                                    <?php    
                                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                    echo $generator->getBarcode(tampil_namadaftar_ByIdSiswa($data->id_siswa), $generator::TYPE_CODE_128, 1.5, 50);
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            <table class="" style="width: 420px;">
                                <thead class="">
                                    <td class="text-center p-1"
                                        style="border-top: 1px solid; border-left: 1px solid; width: 125px">
                                        <img class="" src="<?php echo base_url('/frontend/img/logobinusa.png') ?>"
                                            width="90px" height="80px" alt="">
                                    </td>
                                    <td style="border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">
                                        <div class="card-text text-center">PERPUSTAKAAN SEKOLAH <br />
                                            SMK BINA NUSANTARA <br />
                                            <span style="font-size: 16px">Jl. Kemantren</span>
                                        </div>
                                    </td>
                                </thead>
                                <tbody class="">
                                    <td class="p-1"
                                        style="border-left: 1px solid; border-bottom: 1px solid; border-top: 1px solid;">
                                        <?php foreach ($anggota as $data): ?>
                                        <img style="width: 115px; height:145px; "
                                            src="<?php echo base_url('uploads/akademik/pendaftaran_siswa/').tampil_foto_ByIdSiswa($data->id_siswa);?>">
                                        <?php endforeach;?>
                                    </td>
                                    <td style="border: 1px solid">
                                        <?php foreach ($anggota as $data): ?>
                                        <div class="text-center" style="height: 185px">
                                            <div class="text-center p-1">
                                                <h6>KARTU ANGGOTA</h6>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        Nama
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        NISN
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo  tampil_nisn_siswa_byid($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-2">
                                                        Kelas
                                                    </div>
                                                    <div class="col-1">
                                                        :
                                                    </div>
                                                    <div class="col-6">
                                                        <?php echo  tampil_kelasdaftar_ByIdSiswa($data->id_siswa)?>
                                                    </div>
                                                </div>
                                                <div class="p-4 text-center">
                                                    <?php    
                                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                    echo $generator->getBarcode(tampil_namadaftar_ByIdSiswa($data->id_siswa), $generator::TYPE_CODE_128, 1.5, 50);
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <button type="button w-100" style="width: 425px" s value="Convert HTML to PDF"
                                onclick="convertHTMLtoPDF()" class="btn btn-success">PRINT!</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('perpustakaan/style/js') ?>
</body>
<script>
function convertHTMLtoPDF() {
    const {
        jsPDF
    } = window.jspdf;

    var doc = new jsPDF('l', 'mm', [1500, 1300]);
    var pdfjs = document.querySelector('#cetak');

    doc.html(pdfjs, {
        callback: function(doc) {
            doc.save("newpdf.pdf");
        },
        x: 12,
        y: 12
    });
}
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Program Klik</title>
    <?php $this->load->view('style/head') ?>
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
                            <div style="font-size: 1.5rem">Detail Program Klik</div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                    <div class="row" >
                        <div class="col-8">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Judul Buku </div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['judul_buku'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Penulis </div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['penulis_buku'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Penerbit </div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['penerbit_buku'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Tahun Terbit</div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['tahun_terbit'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Sumber</div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['sumber'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Tanggal Masuk</div>
                                    <div>:</div>
                                    <div class="col"><?php echo indonesian_date_time($program['created_at']) ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2 font-weight-bold">Keterangan</div>
                                    <div>:</div>
                                    <div class="col"><?php echo $program['keterangan'] ?></div>                                 
                                </div>
                                <div class="row mb-2">
                                <a href="<?php echo base_url('Program_Klik/cetak_program_klik/'.$program['id'].'/pdf')?>"
                                    class="btn btn-primary btn-sm" target="_blank">
                                    <i class="fas fa-print"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('style/js') ?>

        <script>
            function kembali() {
                window.history.go(-1);
            }

            function hapus(id) {
                var yes = confirm('Yakin Di Hapus?');
                if (yes == true) {
                    window.location.href = "<?php echo base_url('Perpustakaan/delete_detail_index_buku/') ?>" + id;
                }
            }

            function convertHTMLtoPDF(id) {
                const {
                    jsPDF
                } = window.jspdf;

                var doc = new jsPDF('l', 'mm', [1500, 1300]);
                var pdfjs = document.querySelector('#cetak');

                doc.html(pdfjs, {
                    callback: function (doc) {
                        doc.save("barcode" + id + ".pdf");
                    },
                    x: 12,
                    y: 12
                });
            }
        </script>

</body>

</html>
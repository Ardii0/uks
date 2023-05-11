<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <?php $this->load->view('style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                <div class="row px-3 py-2">
                        <div class="col-sm-12">
                            <div class="box">
                               <div class="header p-1 text-light rounded-top d-flex justify-content-center" style="background-color:#4ADE80">
                                    <div class="d-flex align-items-center">
                                        <div style="font-size: 2rem">Edit Data Inventaris UKS</div>
                                    </div>
                                    
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body shadow px-3 py-1 mb-5 bg-white rounded">
                                <?php foreach ($daf_invent as $datas): ?>
                        <section class="content bg-white p-2 rounded">
                            <form action="<?php echo base_url('inventaris/ubah_invent') ?>" method="post">
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Nama Barang</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $datas->nama_barang ?>" name="nama_barang"
                                                class="form-control"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Asal Barang</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $datas->asal_barang ?>" name="asal_barang"
                                                class="form-control"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Jumlah Barang</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $datas->jumlah_barang ?>" name="jumlah_barang"
                                                class="form-control"><br>
                                        </div>
                                    </div>
                                <div class="form-group col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger text-bold mr-2" onclick="kembali()"
                                    data-dismiss="modal"><span class="p-3">Batal</span></button>
                                    <input type="hidden" value="<?php echo $datas->id ?>" name="id">
                                <button onclick="bisa()" type="submit" class="btn btn-success text-bold"><span class="p-3">Update</span></button>
                                </div>

                            </form>
                        </section>
                        <?php endforeach;?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php $this->load->view('style/js')?>
</body>

<script>
function bisa() {
    swal.fire({
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
    })
}

function kembali() {
            window.history.go(-1);
        }
</script>

</html>
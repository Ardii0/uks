<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('nilai/style/navbar')?>
        <?php $this->load->view('nilai/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cetak Raport</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Cetak Raport</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content container-fluid">
                <!-- <div class="container-fluid bg-white"> -->
                <?php if(!empty($rombel)) {?>
                    <div class="row px-1 pt-2">
                        <div class="col-md-3">
                            <div class="d-flex justify-content-between">
                                <h4><u>Wali Kelas:</u></h4>
                                <h3><?php echo $dt->username ;?></h3>
                            </div>
                            <h5>Pilih Kelas</h5>
                            <?php foreach($rombel as $key) {?>
                                <div class="alert alert-success d-flex" onclick="show_siswa(<?php echo $key->id_rombel ?>)">
                                    <?php echo $key->nama_kelas." / ".$key->nama_rombel." / ".$key->jml." Siswa<br/>" ?>
                                </div>
                            <?php } ?>
                            </div>
                        <div class="col">
                            <div class="card-body bg-white" id="box">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th style="width: 4%;">No</th>
                                            <th>Nama</th>
                                            <th style="width: 30%;">Semester</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                        <div class="container">
                            <div class="alert alert-danger">
                                <h4>Peringatan</h4>
                                <div>
                                    Menu cetak raport hanya tersedia untuk Walikelas,
                                </div>
                                <div>    
                                    Hubungi Administrator untuk Proses lebih lanjut.
                                </div>
                            </div>
                        </div>    
                    <?php } ?>
                <!-- </div> -->
            </section>
        </div>
    </div>
    <?php $this->load->view('nilai/style/js')?>
    <script>
        
        function show_siswa(id) {
            $.ajax({
            url : "<?php echo site_url('Nilai/get_siswa')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {
                    var html = '';
                    var html2 = '';
                    var html3 = '';
                    var i;
                    var no = 1;
                    html3 += "<div class='box box-primary'>" +            	         
                    "<div class='box-body'>" +
                        "<div class='row'>" +
                            "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id='table'>" +

                            "</div>" +						
                        "</div>" +
                    "</div>" +
                    "</div>";
                
                    html2 += "<table class='table table-bordered table-hover' id='exa'>" +
                        "<thead class='bg-dark'>" +
                            "<tr class='active'>" +
                                "<th width='1%'>No</th>" +
                                "<th>Nama</th>" +	            			
                                "<th width='30%'>Semester</th>" +	            			
                            "</tr>"+
                        "</thead>" +
                        "<tbody id='show'>" +
                            
                        "</tbody>" +
                    "</table>";
                    for(i = 0; i < data.length; i++){
                    html += "<tr>"+
                    "<td>"+no+++"</td>"+
                    "<td>"+data[i].nama+"</td>"+	              
                    "<td>"+
                    "<div class='btn-group'><div class='btn btn-success'>Ganjil</div><div class='btn-group'><button type='button' class='btn btn-success dropdown-toggle dropdown-icon' data-toggle='dropdown'></button><div class='dropdown-menu'><a class='dropdown-item' href='raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/1/pdf'><i class='fas fa-print'></i>&nbsp;Cetak PDF</a><a class='dropdown-item' href='raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/1/excel'><i class='fas fa-print'></i>&nbsp;Cetak Excel</a></div></div></div>&nbsp;"+
                    "<div class='btn-group'><div class='btn btn-success'>Genap</div><div class='btn-group'><button type='button' class='btn btn-success dropdown-toggle dropdown-icon' data-toggle='dropdown'></button><div class='dropdown-menu'><a class='dropdown-item' href='raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/2/pdf'><i class='fas fa-print'></i>&nbsp;Cetak PDF</a><a class='dropdown-item' href='raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/2/excel'><i class='fas fa-print'></i>&nbsp;Cetak Excel</a></div></div></div>"+
                    "</td>"+ 
                    "</tr>";
                    }	       	                   	           
                    $('#box').html(html3);           	                    		     				
                    $('#table').html(html2);           	                    		     				
                    $('#show').html(html);   
                    $('#exa').DataTable();

                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }	

    </script>

</body>

</html>
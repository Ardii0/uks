<script type="text/javascript">
$(document).ready(function(){
    $('#enter').change(function(){ 
        var id_daftar=$(this).val();
        $.ajax({
            url : "<?php echo base_url('alumni/get_daftarByNisn');?>",
            method : "POST",
            data : {id_daftar: id_daftar},
            async : true,
            dataType : 'json',
            success: function(data){
                 
                var nama = '<p style="background-color: #EEEEEE" class="form-control">'+data[0].nama+'</p>';
                $('#showdata_nama').html(nama);

                var jekel = '<option class="form-control select2">'+data[0].jekel+'</option>';
                $('#showdata_jekel').html(jekel);

                var tempat = '<p style="background-color: #EEEEEE" class="form-control">'+data[0].tempat_lahir+'</p>';
                $('#showdata_tempat').html(tempat);

                var tgl_lahir = '<input type="text" class="form-control" value='+data[0].tgl_lahir+' disabled>';
                $('#showdata_tgl_lahir').html(tgl_lahir);
                
                var alamat = '<textarea name="alamat" class="form-control" rows="4" placeholder="Masukan Alamat Domisili Sekarang" required>'+data[0].alamat+'</textarea>';
                $('#showdata_alamat').html(alamat);
                
                var telephone = '<input name="no_telp" type="number" class="form-control" placeholder="Masukan Nomor Telephone/Handphone yang dapat dihubungi" value='+data[0].telepon+' required>';
                $('#showdata_telephone').html(telephone);

            }
        });
        return false;
    }); 

});
</script>
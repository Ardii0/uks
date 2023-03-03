function findmyvalue() {
  var option = document.getElementById("option").value;

  switch (option) {
    case "Naik Kelas":
      document.getElementById("naik_kelas").style.display = "block";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      // $("#store").attr('action',"<?php echo base_url('Akademik/naik_kelas'); ?>");
      break;
    case "Pindah Kelas":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "block";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      // document.getElementById('store').action="<?php echo base_url('Akademik/pindah_kelas'); ?>"
      break;
    case "Pindah Sekolah":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "block";
      document.getElementById("lulus").style.display = "none";
      // $("#store").attr('action',"<?php echo base_url('Akademik/pindah_sekolah'); ?>");
      break;
    case "Lulus":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "block";
      // $("#store").attr('action',"<?php echo base_url('Akademik/lulus'); ?>");
      break;
    default:
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      break;
  }
}

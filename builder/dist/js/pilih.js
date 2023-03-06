function findmyvalue() {
  var option = document.getElementById("option").value;

  switch (option) {
    case "Naik Kelas":
      document.getElementById("naik_kelas").style.display = "block";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      break;
    case "Pindah Kelas":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "block";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      break;
    case "Pindah Sekolah":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "block";
      document.getElementById("lulus").style.display = "none";
      break;
    case "Lulus":
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "block";
      break;
    default:
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "none";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      break;
  }
}

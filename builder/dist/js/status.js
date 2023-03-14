function findmystatus() {
  var option = document.getElementById("option").value;

  switch (option) {
    case "Aktif":
      alert("Please select")
      break;
    case 1:
      alert("Please selecteee")
      document.getElementById("naik_kelas").style.display = "none";
      document.getElementById("pindah_rombel").style.display = "block";
      document.getElementById("pindah_sekolah").style.display = "none";
      document.getElementById("lulus").style.display = "none";
      break;
    default:
      break;
  }
}

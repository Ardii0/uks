function selectStatus() {
  var status = document.getElementById("option").value;

  switch (status) {
    case "Guru":
      document.getElementById("guru").style.display = "block";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      break;
    case "Siswa":
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "block";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      break;
    case "Karyawan":
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "block";
      document.getElementById("disabled").style.display = "none";
      break;
    default:
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "block";
      break;
  }
}

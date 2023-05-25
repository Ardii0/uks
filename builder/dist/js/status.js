function selectStatus() {
  var status = document.getElementById("option").value;

  switch (status) {
    case "Guru":
      document.getElementById("guru").style.display = "block";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      setRequired(true, "guru");
      break;
    case "Siswa":
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "block";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      setRequired(true, "siswa");
      break;
    case "Karyawan":
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "block";
      document.getElementById("disabled").style.display = "none";
      setRequired(true, "karyawan");
      break;
    default:
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "none";
      document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "block";
      setRequired(true);
      break;
  }
}

function setRequired(val, stat){
  select = document.getElementById(stat).getElementsByTagName('select');
  for(i = 0; i < select.length; i++){
      select[i].required = val;
  $(stat).on("click", function () {
    $exampleMulti.val(null).trigger("change");
});
  }
}
function selectStatus() {
  var status = document.getElementById("option").value;

  switch (status) {
    case "Guru":
      document.getElementById("guru").style.display = "block";
      document.getElementById("siswa").style.display = "none";
      // document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      setRequired(true, "guru");
      break;
    case "Siswa":
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "block";
      // document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "none";
      setRequired(true, "siswa");
      break;
    // case "Karyawan":
    //   document.getElementById("guru").style.display = "none";
    //   document.getElementById("siswa").style.display = "none";
    //   document.getElementById("karyawan").style.display = "block";
    //   document.getElementById("disabled").style.display = "none";
    //   setRequired(true, "karyawan");
    //   break;
    default:
      document.getElementById("guru").style.display = "none";
      document.getElementById("siswa").style.display = "none";
      // document.getElementById("karyawan").style.display = "none";
      document.getElementById("disabled").style.display = "block";
      setRequired(true);
      break;
  }
}

function selectStatus2() {
  var status = document.getElementById("edits").value;

  switch (status) {
    case "Guru":
      document.getElementById("gurus").style.display = "block";
      document.getElementById("siswas").style.display = "none";
      // document.getElementById("karyawans").style.display = "none";
      document.getElementById("disableds").style.display = "none";
      setRequired(true, "gurus");
      break;
    case "Siswa":
      document.getElementById("gurus").style.display = "none";
      document.getElementById("siswas").style.display = "block";
      // document.getElementById("karyawans").style.display = "none";
      document.getElementById("disableds").style.display = "none";
      setRequired(true, "siswas");
      break;
    // case "Karyawan":
    //   document.getElementById("gurus").style.display = "none";
    //   document.getElementById("siswas").style.display = "none";
    //   document.getElementById("karyawans").style.display = "block";
    //   document.getElementById("disableds").style.display = "none";
    //   setRequired(true, "karyawans");
    //   break;
    default:
      document.getElementById("gurus").style.display = "none";
      document.getElementById("siswas").style.display = "none";
      // document.getElementById("karyawans").style.display = "none";
      document.getElementById("disableds").style.display = "block";
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
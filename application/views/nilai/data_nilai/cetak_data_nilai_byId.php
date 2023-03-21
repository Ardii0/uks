<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Nilai Siswa</title>
    <style type="text/css">
    ::selection {
        background-color: #E13300;
        color: white;
    }

    ::-moz-selection {
        background-color: #E13300;
        color: white;
    }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }

    .flex {
        display: flex;
        flex-wrap: nowrap;
    }
    </style>
</head>

<body>
    <div>
        <?php foreach ($data as $key) { ?>
        <table border="0" style="font-size: 14px; font-weight: bold;">
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><?php echo tampil_nama_siswa_byid(tampil_id_daftar_siswa_byid($key->id_siswa))?></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td><?php echo tampil_mapelById($key->id_mapel)?></td>
            </tr>
            <tr>
                <td>Kelas / Rombel</td>
                <td>:</td>
                <td><?php echo tampil_kelas_byid(tampil_id_kelas_rombel_byid($key->id_rombel))?> /
                    <?php echo tampil_rombel_byid($key->id_rombel)?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $key->id_semester?></td>
            </tr>
        </table>
        <hr>
        <!-- <table border="0" style="font-size: 14px; font-weight: bold;">
            <tr>
                <td>Ulangan Harian 1</td>
                <td>:</td>
                <td><?php echo $key->nuh1?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Ulangan Harian 2</td>
                <td>:</td>
                <td><?php echo $key->nuh2?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Ulangan Harian 3</td>
                <td>:</td>
                <td><?php echo $key->nuh3?></td>
            </tr>
            <br>
            <tr>
                <td>Nilai Tugas 1</td>
                <td>:</td>
                <td><?php echo $key->nt1?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Tugas 1</td>
                <td>:</td>
                <td><?php echo $key->nt2?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Tugas 1</td>
                <td>:</td>
                <td><?php echo $key->nt3?></td>
            </tr>
            <br>
            <tr>
                <td>Nilai Rata Rata (Ulangan)</td>
                <td>:</td>
                <td><?php echo $key->rnuh?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Rata Rata (Tugas)</td>
                <td>:</td>
                <td><?php echo $key->rnt?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Rata Rata (Harian)</td>
                <td>:</td>
                <td><?php echo $key->nh?></td>
            </tr>
            <br>
            <tr>
                <td>Nilai Tengah Semester</td>
                <td>:</td>
                <td><?php echo $key->mid?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Semesteran</td>
                <td>:</td>
                <td><?php echo $key->smt?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Nilai Keseluruhan</td>
                <td>:</td>
                <td><?php echo $key->nar?></td>
            </tr>
        </table> -->
        <!-- <table border="1" style="border-collapse: collapse;" width="100%" cellpadding="4" cellspacing="4">
            <tr style="font-weight: bold;">
                <th>Rata-Rata Nilai Tugas</th>
                <th>Rata-Rata Nilai Ulangan Harian</th>
                <th>Nilai Tengah Semester</th>
                <th>Nilai Semesteran</th>
                <th>Nilai Keseluruhan</th>
            </tr>
            <tr style="text-align: center;">
                <td><?php echo $key->rnt?></td>
                <td><?php echo $key->rnuh?></td>
                <td><?php echo $key->mid?></td>
                <td><?php echo $key->smt?></td>
                <td><?php echo $key->nar?></td>
            </tr>
        </table> -->
        <table border="0" style="font-size: 14px;">
            <tr>
                <td>1. Nilai Ulangan Harian 1</td>
                <td>:</td>
                <td><?php echo $key->nuh1?></td>
            </tr>
            <tr>
                <td>2. Nilai Ulangan Harian 2</td>
                <td>:</td>
                <td><?php echo $key->nuh2?></td>
            </tr>
            <tr>
                <td>3. Nilai Ulangan Harian 3</td>
                <td>:</td>
                <td><?php echo $key->nuh3?></td>
            </tr>
            <tr>
                <td>4. Nilai Tugas 1</td>
                <td>:</td>
                <td><?php echo $key->nt1?></td>
            </tr>
            <tr>
                <td>5. Nilai Tugas 2</td>
                <td>:</td>
                <td><?php echo $key->nt2?></td>
            </tr>
            <tr>
                <td>6. Nilai Tugas 3</td>
                <td>:</td>
                <td><?php echo $key->nt3?></td>
            </tr>
            <tr>
                <td>7. Nilai Tengah Semester</td>
                <td>:</td>
                <td><?php echo $key->mid?></td>
            </tr>
            <tr>
                <td>8. Nilai Semesteran</td>
                <td>:</td>
                <td><?php echo $key->smt?></td>
            </tr>
            <tr>
                <td>9. Rata-Rata Nilai Ulangan Harian</td>
                <td>:</td>
                <td><?php echo $key->rnuh?></td>
            </tr>
            <tr>
                <td>10. Rata-Rata Nilai Tugas</td>
                <td>:</td>
                <td><?php echo $key->rnt?></td>
            </tr>
            <tr>
                <td>11. Rata-Rata Nilai Tugas % Ulangan</td>
                <td>:</td>
                <td><?php echo $key->nh?></td>
            </tr>
            <tr>
                <td>12. Nilai Keseluruhan</td>
                <td>:</td>
                <td><?php echo $key->nar?></td>
            </tr>
        </table>
        <?php } ?>
    </div>
</body>

</html>
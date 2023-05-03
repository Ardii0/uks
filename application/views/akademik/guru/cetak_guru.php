<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 2px solid #D0D0D0;
        font-size: 30px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 10px 10px 15px;
    }

    .title {
        font-size: 20px;
        font-weight: normal;
    }
    .tr{
        padding: 8px;
        border: none !important;
        font-size: 16px;

    }
    </style>
</head>

<body>
    <?php foreach ($data as $key) { ?>
    <h1>Data Guru <?php echo $key->nama_guru ?></h1>

    <table style="border-collapse: collapse;" width="100%" cellpadding="4" cellspacing="4">
           
        <tr >
            <td class="tr">Kode</td>
            <td class="tr"><?php echo $key->kode_guru ?></td>

        </tr>
        <tr>
            <td class="tr">NIK</td>
            <td class="tr"><?php echo $key->nik ?></td>

        </tr>
        <tr>
            <td class="tr">NIP/Y</td>
            <td class="tr"><?php echo $key->nip ?></td>

        </tr>
        <tr>
            <td class="tr">Nama</td>
            <td class="tr"><?php echo $key->nama_guru ?></td>

        </tr>
        <tr>
            <td class="tr">Jabatan</td>
            <td class="tr"><?php echo tampil_jabatanGuruById($key->id_jabatan) ?></td>

        </tr>
        <tr>
            <td class="tr">Jenis Kelamin</td>
            <td class="tr"><?php foreach ($data as $key): ?>
                                            <?php $gender = tampil_jekel_guru_byid($key->kode_guru) == "L" ? 'Laki - Laki' : 'Perempuan'; echo $gender ?>
                                        <?php endforeach;?></td>

        </tr>
        <tr>
            <td class="tr">No Telepon</td>
            <td class="tr"><?php echo $key->no_hp ?></td>

        </tr>
        <tr>
            <td class="tr">TMT</td>
            <td class="tr"><?php echo $key->tmt ?></td>

        </tr>
        <tr>
            <td class="tr">No SK</td>
            <td class="tr"><?php echo $key->no_sk ?></td>

        </tr>
        <tr>
            <td class="tr">Tanggal SK</td>
            <td class="tr"><?php echo $key->tgl_sk ?></td>

        </tr>
        <tr>
            <td class="tr">Alamat</td>
            <td class="tr"><?php echo $key->alamat ?></td>

        </tr>
    </table>
    <?php } ?>     

    </div>



</body>

</html>
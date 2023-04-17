<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Bukti Peminjaman</title>
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

    div.d {
        line-height: 5rem;
    }
    </style>
</head>

<body>
    <?php foreach($data as $data ):?>
    <h1>Bukti Peminjaman Buku</h1>
    <table border="0" style="font-size: 14px; font-weight: bold;">
        <tr>
            <td>No Peminjaman</td>
            <td>:</td>
            <td><?php echo $data->no_pinjaman ?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?></td>
        </tr>
        <tr>
            <td>ID Anggota</td>
            <td>:</td>
            <td><?php echo $data->id_anggota ?></td>
        </tr>
    </table>
    <hr>
    <br>
    <table border="1" style="border-collapse: collapse;" width="100%" cellpadding="4" cellspacing="4">
        <tr style="font-weight: bold;">
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Rak Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Jatuh Tempo</th>
        </tr>
        <tr style="text-align: center;">
            <td><?php echo tampil_id_index_buku($data->id_index_buku) ?></td>
            <td><?php echo tampil_namabuku_byPeminjamanId($data->id_index_buku) ?></td>
            <td><?php echo tampil_rakbuku_byPeminjamanId($data->id_index_buku) ?></td>
            <td><?php echo $data->tgl_pinjaman ?></td>
            <td><?php echo $data->jatuh_tempo ?></td>
        </tr>
    </table>
    <div>
        <table>
            <tr>
                <td style="padding-right: 360px; text-align: center;">
                    <div class="d">
                        Pengurus Perpustakaan<br>
                        <?php echo $this->session->userdata('username') ?>
                    </div>
                </td>
                <td style="text-align: center;">
                    <div class="d">
                        Nama Peminjam Buku<br>
                        <?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php endforeach ?>
</body>

</html>
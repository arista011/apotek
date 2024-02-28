<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme.min.css" />
    <title>Invoice</title>
</head>

<body class="bgbody">
    <h1><?= $nama_apotek; ?></h1>
    <span><?= $alamat; ?></span>
    <hr>
    <div style="max-width:300px;">
        <table class="table">
            <tr>
                <td>Tanggal : <?= $penjualan[0]->tanggal_jam ?></td>
            </tr>
            <tr>
                <td>ID : <?= $penjualan[0]->id_penjualan ?></td>
            </tr>
            <tr>
                <td>Kasir : <?= $penjualan[0]->nama_admin ?></td>
            </tr>
        </table>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Nama Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <!-- Add more table headers based on your data structure -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $row) : ?>
                    <tr>
                        <td><?= $row->nama_item; ?></td>
                        <td><?= $row->kuantiti; ?></td>
                        <td><?= $row->harga; ?></td>
                        <!-- Add more table cells based on your data structure -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Harga : <?= $row->total_harga_item; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>
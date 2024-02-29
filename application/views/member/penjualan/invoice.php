<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        font-size: 9px;
        font-family: 'Roboto';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.description,
    th.description {
        text-align: left;
        width: 150px;
        max-width: 150px;
    }

    td.quantity,
    th.quantity {
        text-align: center;
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.price,
    th.price {
        width: 45px;
        max-width: 45px;
        word-break: break-all;
    }

    .centered {
        text-align: center;
        align-content: center;
    }

    .hasil {
        padding-left: 142px;
    }

    .ticket {
        width: 255px;
        max-width: 255px;
    }

    @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h3 class="centered"><?= $nama_apotek; ?></h3>
        <p class="centered"><?= $alamat; ?></p>
        <table>
            <thead>
                <tr>
                    <th class="description">Nama Obat</th>
                    <th class="quantity">Qty</th>
                    <th class="price">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $row) : ?>
                    <tr>
                        <td class="description"><?= $row->nama_item; ?></td>
                        <td class="quantity"><?= $row->kuantiti; ?></td>
                        <td class="price"><?= $row->harga; ?></td>
                        <!-- Add more table cells based on your data structure -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="hasil">Total Harga <span> : <?= $row->total_harga_item; ?></span>
            <br>Total Bayar <span> : <?= $row->total_harga_item; ?></span>
            <br>.Kembalian <span> : <?= $row->total_harga_item; ?></span>
        </p>
        <p class=" centered">Terima Kasih || Sahabat Sehat</p>
    </div>
    </table>
</body>
<!-- <script type="text/javascript">
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script> -->

</html>
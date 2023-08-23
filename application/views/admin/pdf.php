<html>

<head>
    <title>Faktur Transaksi</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;'>
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Sarangwayang</b></span></br><br>
                Pertokoan Pati, Jalan Raya Papar - Pare</br>
                Ngampel - Papar - Kediri - Jawa Timur, Kode Pos 64153, Indonesia</br>
                Telp : 0852 3676 2626</br>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>NOTA PEMESANAN</span></b></br><br>
                ID Pesanan : #<?= $invoice->order_id ?></br>
                Tanggal : <?= $invoice->transaction_time ?></br>
            </td>
        </table>
        <br>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Pelanggan : <?= $invoice->name ?></br>
                Alamat : <?= $invoice->alamat ?>, <?= $invoice->kode_pos ?>
            </td>
        </table>
        <br><br>
        <table cellspacing='0' style='width:700px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

            <tr align='center'>
                <td width='6%'><b>Kode</b></td>
                <td width='20%'><b>Nama</b></td>
                <td width='13%'><b>Harga</b></td>
                <td width='4%'><b>Jumlah</b></td>
                <td width='7%'><b>Discount</b></td>
                <td width='13%'><b>Subtotal</b></td>
                <?php $total = 0;
                foreach ($pesanan as $row) :
                    $subtotal = $row->quantity * $row->price;
                    $total += $subtotal;
                ?>
            <tr>
                <td>
                    <center><?= $row->id_brg ?>
                </td>
                <td>
                    <center> <?= $row->name ?>
                </td>
                <td>
                    <center> Rp <?= number_format($row->price, 0, ',', '.') ?>
                </td>
                <td>
                    <center> <?= number_format($row->quantity, 0, ',', '.') ?> Item
                </td>
                <td>
                    <center> Rp0,00
                </td>
                <td style='text-align:right'>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan='5'>
                <div style='text-align:right'><b>Biaya Pengiriman : </b></div>
            </td>
            <td style='text-align:right'><b>Rp <?= number_format($invoice->biaya, 0, ',', '.') ?></b></td>
        </tr>
        <tr>
            <td colspan='5'>
                <div style='text-align:right'><b>Total Harga : </b></div>
            </td>
            <td style='text-align:right'><b>Rp <?= number_format($total + $invoice->biaya, 0, ',', '.') ?></b></td>
        </tr>
        </table>


    </center>
</body>

</html>
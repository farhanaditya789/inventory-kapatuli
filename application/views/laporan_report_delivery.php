<html><head>
    <title>Report Supplier Product</title>
</head><body>
    <table>
        <tr>
            <th>No</th>
            <th>Stock Out ID</th>
            <th>Date Delivery</th>
            <th>Amount Delivery</th>
            <th>Delivery Status</th>
        </tr>
        <?php $no = 1;
        foreach ($report_delivery as $rdy) : ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $rdy->stock_out_id ?></td>
                <td><?= $rdy->date_delivery ?></td>
                <td><?= $rdy->amount_delivery ?></td>
                <td><?= $rdy->delivery_status ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body></html>
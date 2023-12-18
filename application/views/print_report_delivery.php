<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Report Delivery</title>
</head>

<body>
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
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rdy->stock_out_id ?></td>
                <td><?= $rdy->date_delivery ?></td>
                <td><?= $rdy->amount_delivery ?></td>
                <td><?= $rdy->delivery_status ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
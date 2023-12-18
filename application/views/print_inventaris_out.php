<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Supplier Product</title>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Product ID</th>
            <th>Merchant ID</th>
            <th>User ID</th>
            <th>Date Delivery</th>
            <th>Amount Delivery</th>
        </tr>
        <?php $no = 1;
        foreach ($inventaris_pendataan_out as $ivt_po) : ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $ivt_po->product_id ?></td>
                <td><?= $ivt_po->merchant_id ?></td>
                <td><?= $ivt_po->user_id ?></td>
                <td><?= $ivt_po->date_delivery ?></td>
                <td><?= $ivt_po->amount_delivered ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
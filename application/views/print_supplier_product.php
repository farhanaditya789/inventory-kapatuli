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
            <th>Name Product</th>
            <th>Stock Product</th>
            <th>Supplier ID</th>
            <th>Expired</th>
            <th>Date Received</th>
        </tr>
        <?php $no = 1;
        foreach ($supplier_product as $spl_p) : ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $spl_p->name_product ?></td>
                <td><?= $spl_p->stock_product ?></td>
                <td><?= $spl_p->supplier_id ?></td>
                <td><?= $spl_p->qty ?></td>
                <td><?= $spl_p->date_received ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
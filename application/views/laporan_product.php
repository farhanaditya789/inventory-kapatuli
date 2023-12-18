<html><head>
    <title>Report Product</title>
</head><body>
    <table>
        <tr>
            <th>No</th>
            <th>Name Product</th>
            <th>Stock Product</th>
            <th>Expired Product</th>
            <th>Production Date</th>
        </tr>
        <?php $no = 1;
        foreach ($products as $pdt) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pdt->name ?></td>
                <td><?= $pdt->stock ?></td>
                <td><?= $pdt->exp_date ?></td>
                <td><?= $pdt->production_date ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body></html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Product</title>
</head>

<body>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Supplier</title>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Name Merchant</th>
            <th>Address Merchant</th>
            <th>Phone Merchant</th>
        </tr>
        <?php $no = 1;
        foreach ($merchant as $mrc) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mrc->name ?></td>
                <td><?= $mrc->address ?></td>
                <td><?= $mrc->phone ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
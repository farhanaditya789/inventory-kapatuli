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
            <th>Name Supplier</th>
            <th>Address Supplier</th>
            <th>Phone Supplier</th>
        </tr>
        <?php $no = 1;
        foreach ($supplier as $spl) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $spl->name ?></td>
                <td><?= $spl->address ?></td>
                <td><?= $spl->phone ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
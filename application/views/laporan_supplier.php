<html><head>
    <title>Report Supplier</title>
</head><body>
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
</body></html>
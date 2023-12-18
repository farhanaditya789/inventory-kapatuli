<html><head>
    <title>Report Merchant</title>
</head><body>
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
</body></html>
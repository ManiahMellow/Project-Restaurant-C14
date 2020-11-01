<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Layout</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?= base_url() ?>/Admin/Kategori">Select</a></li>
            <li><a href="<?= base_url() ?>/Admin/Kategori/insert">Insert</a></li>
            <li><a href="<?= base_url() ?>/Admin/Kategori/update/$1">Update</a></li>
        </ul>
    </nav>

        <?= $this->renderSection('content') ?>

</body>
</html>
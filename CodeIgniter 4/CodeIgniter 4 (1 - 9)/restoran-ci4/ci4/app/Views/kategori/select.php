<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h3> <?php echo $judul;?></h3>

<?php foreach($kategori as $key => $value): ?>
<h4><?= $key.' => '.$value['kategori'] ?></h4>
<?php endforeach; ?>

<h4><?php echo $kategori[2]['kategori']; ?></h4>

<?= $this->endSection() ?>
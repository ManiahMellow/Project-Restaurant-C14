<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php 
     
    echo session() -> getFlashdata('info');

?>

<h3> INSERT DATA</h3>

<form action="<?= base_url()?>/Admin/Kategori/insert" method="post">

    Kategori : <input type="text" name="kategori" required>
    <br>
    Keterangan : <input type="text" name="keterangan" required>
    <br>
    <input type="submit" name="simpan" value="SIMPAN">

</form>

<?= $this->endSection() ?>
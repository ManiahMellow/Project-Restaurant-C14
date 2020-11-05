<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h3> UPDATE DATA</h3>

<form action="<?= base_url('/Admin/Kategori/update')?>" method="post">

    Kategori : <input type="text" name="kategori" value="<?= $kategori['kategori']?>" required>
    <br>
    Keterangan : <input type="text" name="keterangan" value="<?= $kategori['keterangan']?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">
    <br>
    <input type="submit" name="simpan" value="SIMPAN">

</form>

<?= $this->endSection() ?>
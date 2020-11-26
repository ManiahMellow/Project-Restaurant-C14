<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col mt-2">
    <?php 
        
        if (!empty(session() -> getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session() -> getFlashdata('info');
            echo '</div>';
        }
    ?>
</div>

<div class="col-4">
    <h4> UPDATE DATA</h4>
</div>

<div class="col-8">
    <form action="<?= base_url('/Admin/Kategori/update')?>" method="post">
        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?= $kategori['kategori']?>" required>
        </div>

        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?= $kategori['keterangan']?>" required>
        </div>

        <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">

        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>
<?= $this->endSection() ?>
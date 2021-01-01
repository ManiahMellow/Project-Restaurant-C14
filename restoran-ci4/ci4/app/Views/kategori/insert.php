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
    <h4> INSERT DATA</h4>
</div>

<div class="col-8">
    <form action="<?= base_url('/Admin/Kategori/insert')?>" method="post">
        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <input type="text" class="form-control" name="kategori" required>
        </div>

        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" required>
        </div>

        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endSection() ?>
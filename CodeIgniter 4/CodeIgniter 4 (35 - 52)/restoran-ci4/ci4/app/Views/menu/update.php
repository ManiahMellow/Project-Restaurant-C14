<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col mt-2">
    <?php 
        
        if (!empty(session() -> getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            $error = session() -> getFlashdata('info');

            foreach ($error as $key => $value) {
                echo $key." : " .$value;
                echo "<br>";
            }   
            echo '</div>';
        } 
    ?>
</div>

<div class="col-4">
    <h4><?php echo $judul ?></h4>
</div>

<div class="col-8">
    <form action="<?= base_url('/Admin/Menu/update')?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="gambar">Kategori</label>
            <select class="form-control mt-2" name="idkategori" id="idkategori">

                <?php foreach ($kategori as $key => $value) : ?>
                    <option <?php if($value['idkategori'] == $menu['idkategori']) echo "selected" ?> value="<?= $value['idkategori']?>"><?=$value['kategori'] ?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" name="menu" value="<?= $menu['menu']?>" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" name="harga" value="<?= $menu['harga']?>" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <input type="hidden" class="form-control" name="gambar" value="<?= $menu['gambar']?>" required>
        <input type="hidden" class="form-control" name="idmenu" value="<?= $menu['idmenu']?>" required>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endSection() ?>
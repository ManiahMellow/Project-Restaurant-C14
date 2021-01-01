<?= $this->extend('template/pelanggan') ?>

<?= $this->section('content') ?>

<?php

    if (isset($_GET['page_info'])) {
        $page = $_GET['page_info'];
        $jumlah = 3;
        $no = ($jumlah * $page) - $jumlah + 1;
    }else{
        $no = 1;
    }

?>

<div class="col-4 mt-4">
    <h4> <?= $judul?></h4>
</div>


<?php if(!empty($daftar)) { ?>
<?php foreach($daftar as $key):  ?>

    <div class="card" style="width: 14rem; float:left; margin:10px;">
        <img style="height:160px;" src="<?= base_url('upload/'.$key['gambar'].'')?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $key['menu'] ?></h5>
            <p class="card-text"><?php echo $key['harga'] ?></p>
            <a class="btn btn-primary" href="<?= base_url('Front/Menu/beli/'.$key['idmenu'])?>" role="button">BELI</a>
        </div>
    </div>
<?php endforeach ?>  
<?php } ?>

<div style="clear:both">

<?= $pager -> links('info', 'bootstrap') ?>

</div>


<?= $this->endSection() ?>
<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<a class="btn btn-primary" href="<?= base_url('/Admin/Kategori/create') ?>" role="button">TAMBAH DATA</a>


<h4 class="mt-2"> <?php echo $judul;?></h4>

<table class="table">

    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Hapus</th>
        <th>Update</th>
    </tr>

    <?php $no = 1 ?>
        <?php foreach($kategori as $key => $value): ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $value['kategori'] ?></td> 
            <td><?= $value['keterangan']?></td>    
            <td><a href="<?= base_url()?>/Admin/Kategori/delete/<?= $value['idkategori']?>">Hapus</a></td>
            <td><a href="<?= base_url()?>/Admin/Kategori/find/<?= $value['idkategori']?>">Update</a></td>    
        </tr>
        <?php endforeach; ?>

</table>

<?= $pager -> links('group1', 'bootstrap') ?>


<?= $this->endSection() ?>
<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col"><h4><?= $judul?><h4></div>
</div>

<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order[0]['pelanggan']?></p>
    </div>

    <div class="col">
        <p>Tanggal : <?= date("d-m-Y", strtotime($order[0]['tglorder']))?></p>
    </div>

    <div class="col">
        <p>Total : <b><?= number_format($order[0]['total'])?></b></p>
    </div>
</div>

<div class="row">
    <div class="col mt-1">
        <?php 
            
            if (!empty(session() -> getFlashdata('info'))) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session() -> getFlashdata('info');
                echo '</div>';
            } 
        ?>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="<?= base_url('/Admin/Order/update')?>" method="post">
            <div class="form-group">
                <label for="Kategori">Bayar</label>
                <input type="number" class="form-control" name="bayar" required>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="total" value="<?= $order[0]['total']?>" required>
                <input type="hidden" class="form-control" name="idorder" value="<?= $order[0]['idorder']?>" required>
            </div>

            <div class="form-group">
                <input type="submit" name="simpan" value="SIMPAN">
            </div>
        </form>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <h5>RINCIAN ORDER : </h5>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($detail as $value) :  ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $value['menu']?></td>
                <td><?= $value['hargajual']?></td>
                <td><?= $value['jumlah']?></td>
                <td><?= $value['jumlah'] * $value['hargajual']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
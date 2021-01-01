<?= $this->extend('template/pelanggan') ?>

<?= $this->section('content') ?>

<h4 class="mt-5">Histori Pembelian</h4>
    <table class="table table-bordered w-55">
        <thead class="thead-dark text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1?>
        <?php foreach($vorder as $key => $value): ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $value['tglorder'] ?></td>            
                <td class="text-center"><?php echo $value['total'] ?></td>            
                <td class="text-center"><a href="<?= base_url('Front/Menu/detail/'.$value['idorder'].'') ?>"><img src="<?= base_url('/icon/file.svg')?>"></a></td>            
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
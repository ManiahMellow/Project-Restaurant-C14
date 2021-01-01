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
    <h4> INSERT DATA</h4>
</div>

<div class="col-8">
    <form action="<?= base_url('/Admin/User/insert')?>" method="post">
        <div class="form-group">
            <label for="User">User</label>
            <input type="text" class="form-control" name="user" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
                <select class="form-control mt-2" name="level" id="level">

                    <?php foreach ($level as $key) : ?>
                        <option value="<?= $key?>"><?=$key?></option>
                    <?php endforeach; ?>

                </select>
        </div>

        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endSection() ?>
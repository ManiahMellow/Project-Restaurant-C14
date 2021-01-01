<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Daftar</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-6 mx-auto">
                <span>
                    <div class="col mt-2 ml-3">
                        <?php 
                            
                            if (!empty($info)) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $info;
                                echo '</div>';
                            } 
                        ?>
                    </div>
                    
                    <h4>DAFTAR PELANGGAN</h4>
                </span>
                <hr>
                    <form action="<?= base_url('/Front/Daftar/insert')?>" method="post">
                        <div class="form-group">
                            <label for="Pelanggan">Pelanggan</label>
                            <input type="text" class="form-control" name="pelanggan" required>
                        </div>

                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>

                        <div class="form-group">
                            <label for="Telp">Telp</label>
                            <input type="text" class="form-control" name="telp" required>
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
                            <input class="btn btn-info" type="submit" name="login" value="LOGIN">
                        </div>
                    </form>
            </div>
        </div>
    </div>



</body>
</html>
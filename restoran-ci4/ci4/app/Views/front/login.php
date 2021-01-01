<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Login Page</title>
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

                    <h4>LOGIN PELANGGAN</h4>
                </span>
                <hr>
                    <form action="<?= base_url('/Front/Login')?>" method="post">
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
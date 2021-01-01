<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Hi!Low | Vocational School</title>
</head>
<body>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?=base_url('/Front/Homepage') ?>">Hi!Low | Restaurant</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                
                                <?php if(empty(session() -> get('loggedIn'))) : ?>
                                    <li class="nav-item mt-2 ml-5 "> <a href="<?= base_url('/Front/Daftar')?>"> Daftar </a></li>
                                    <li class="nav-item mt-2 ml-5"> <a href="<?= base_url('/Front/Login')?>"> Login </a></li>
                                <?php endif; ?>
                                
                                <?php if(!empty(session() -> get('loggedIn'))) : ?>
                                    <li class="nav-item mt-2 ml-5 ">Pelanggan : </li>
                                    <li class="nav-item mt-2 ml-2">
                                        <?php 
                                            if (!empty(session() -> get('pelanggan'))) {
                                                echo session() -> get('pelanggan');
                                            }
                                        ?>
                                    </li>

                                    <li class="nav-item mt-2 ml-5 ">Email : </li>
                                    <li class="nav-item mt-2 ml-2">
                                        <?php 
                                            if (!empty(session() -> get('email'))) {
                                                echo session() -> get('email');
                                            }
                                        ?>
                                    </li>

                                    <li class="nav-item mt-2 ml-5">
                                        <a href="<?= base_url('Front/Menu/history') ?>">
                                            <img src="<?= base_url('/icon/clock.svg')?>">
                                        </a>
                                    </li>

                                    <li class="nav-item mt-2 ml-5"><a href="<?= base_url('/Front/Login/logout')?>">Logout </a></li>
                                <?php endif; ?>
                    
                                </ul>
                            </div>
                 </nav>
                
            </div>       
        </div>

        <div class="row">
            <div class="col-4 mt-4">
                <div>
                    <h3><a href="<?= base_url('/Front/Menu')?>"> Kategori </a></h3>
                    <hr>
                </div>
            
                <div class="card" style="width: 18rem;">
                    <?php if(!empty($menu)) { ?>      
                        <ul class="list-group list-group-flush"> 
                            <?php foreach($menu as $key) : ?>                
                                <li class="list-group-item"><a href="<?= base_url('/Front/Menu/option/'.$key['idkategori'])?>"><?= $key['kategori']?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            
            <div class="col-8 px-1"><?= $this->renderSection('content') ?></div>
        </div>
    </div>



</body>
</html>
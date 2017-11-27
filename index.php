<?php
include "views/header.php";

$error = "";
if(isset($_POST['submit'])){
    $kodemeja = $_POST['kode_meja'];
    if (!empty(trim($kodemeja))) {
		if (loginPengunjung($kodemeja)){
                $time = time();
                $_SESSION['time'] = $time;
                $_SESSION['kode_meja'] = $kodemeja;
		}else{
			$error = 'Kode Meja salah';
		}
	}else{
		$error = 'Kode Meja wajib diisi';
	}
}

if(isset($_SESSION['time'])){
    header('Location: menu.php');
}


?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg" style="margin-top:70px">
                <div tabindex="1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                        <?php
                            if(!empty($error)){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php
                            }
                        ?>
                            <p>Masukan Kode Meja Anda : </p>
                            <form method="POST">
                                <div class="form-group">
                                    <input name="kode_meja" class="form-control" />
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>
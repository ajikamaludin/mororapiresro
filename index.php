<?php
include "views/header.php";
$data = tampilMeja();
$time = time();
$error = "";
if(isset($_POST['submit'])){
    $kodemeja = $_POST['kode_meja'];
    if (!empty(trim($kodemeja))) {

        $cek = cekMeja($time,$kodemeja);

        if($cek){

            if (loginPengunjung($kodemeja)){
                $update = updateTimeMeja($time,$kodemeja);
                if($update){
                    $_SESSION['time'] = $time;
                    $_SESSION['kode_meja'] = $kodemeja;
                }else{
                    echo "DAMN SYSTEM ERROR";
                    die();
                }
                
            }else{
                $error = 'Kode Meja salah';
            }
        }else{
            echo "DAMN SYSTEM ERROR";
            die();
        }
	}else{
		$error = 'Kode Meja wajib diisi';
	}
}

if(isset($_SESSION['time'])){
    header('Location: menu.php');
}


?>
  <body style="background:url('asset/image/back.jpg');background-repeat: no-repeat;background-size: cover;height: 910px;">
    <div class="container-fluid">
        <div class="row-fluid" style="margin-top:80px">
            <center>
                <div style="color: #f4f7f9;text-shadow: -4px -2px 4px #000000">
                    <h1>Selamat Datang di Mororapi Resto</h1>
                </div>
                <blockquote class="blockquote" style="color: #f4f7f9;text-shadow: -4px -2px 4px #000000">" Pilihan Tepat Makan Bersama Keluarga "<blockquote>
            </center>
        </div>
        <div class="row">
            <div class="col-lg" style="margin-top:70px">
                
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg" >
            
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
                            <p>Pilih Kode Meja Anda : </p>
                            <form method="POST">
                                <div class="form-group">
                                    <!-- <input name="kode_meja" class="form-control" /> -->
                                    <select class="form-control" name="kode_meja">
                                    <?php foreach ($data as $meja) { 
                                        if(cekMeja(time(),$meja['kode_meja'])){  
                                    ?>    
                                        <option value="<?=$meja['kode_meja']?>"><?=$meja['kode_meja']?></option>
                                    <?php 
                                        }
                                    } ?>
                                    </select>
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
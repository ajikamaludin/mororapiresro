<?php
include "views/header_admin.php";
$error = "";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty(trim($username)) && !empty(trim($password))) {
		if (login($username, $password)){
			   $_SESSION['user'] = $username;
		}else{
			$error = 'Username dan Password salah';
		}
	}else{
		$error = 'Username dan Password wajib diisi';
	}
}

if(isset($_SESSION['user'])){
    header('Location: dashboard_main.php');
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
                        <h4>Admin Panel</h4>
                            <form method="post" action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="username" type="text" class="form-control" placeholder="Username" required/>
                                    </div>
                                    <div class="input-group">
                                        <input name="password" type="password" class="form-control" placeholder="Password" required/>
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="ok" class="btn btn-primary">Masuk</button>
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
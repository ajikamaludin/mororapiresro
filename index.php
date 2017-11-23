<?php
include "views/header.php";
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
                            <p>Masukan No Meja Anda : </p>
                            <form method="post" action=".">
                                <div class="form-group">
                                    <input name="no_meja" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-primary">Masuk</button>
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
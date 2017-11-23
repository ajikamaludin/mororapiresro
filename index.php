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
                        <div class="modal-header">
                            <h5 class="modal-title">Mororapi Resto</h5>
                        </div>
                        <div class="modal-body">
                            <p>Masukan No Meja Anda : </p>
                            <form method="post">
                                <input name="no_meja" class="form-control" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Masuk</button>
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
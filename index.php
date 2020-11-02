<?php
include('view/include/header.php');
include('database/db.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                </div>
                <form method="post" class="p-4">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control form-control-sm" name="email" placeholder="example@gamail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="........">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Connection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('view/include/footer.php');
?>
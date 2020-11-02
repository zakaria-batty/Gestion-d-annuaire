<?php
session_start();
include('include/header.php');
include('../database/db.php');

if (isset($_POST['submit'])) :

    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
    $run = mysqli_query($db, $query);

    $result = mysqli_fetch_array($run);
  
    if ($result) {
        $_SESSION['a'] = $result['email'];
        $_SESSION['password']=  $result['password'];
        header("location:home.php");
    } else {
        header("location:index.php?message=err");
    }
endif;

if(isset($_SESSION['a'])&&isset($_SESSION['password'])){
    var_dump($_SESSION['a']);
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                </div>
                <form method="post" action="" class="p-4">
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
                        <button type="submit" name="submit" class="btn btn-primary">Connection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>
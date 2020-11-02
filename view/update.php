<?php
include('include/header.php');
include('../database/db.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';


$query = "SELECT * FROM informations WHERE id='$id'";
$run = mysqli_query($db, $query);
$recup = mysqli_fetch_array($run);

if (isset($_POST['submit'])) :

    $id = $_POST['id'];
    $Nom = htmlentities($_POST['Nom']);
    $Societe = htmlentities($_POST['Societe']);
    $Service = htmlentities($_POST['Service']);
    $Adresse = htmlentities($_POST['Adresse']);
    $Cp = htmlentities($_POST['Cp']);
    $Telephone = htmlentities($_POST['Telephone']);
    $Ville = htmlentities($_POST['Ville']);
    $Pays = htmlentities($_POST['Pays']);
    $Fixe = htmlentities($_POST['Fixe']);
    $Fax = htmlentities($_POST['Fax']);
    $Email = htmlentities($_POST['Email']);
    $Commentaire = htmlentities($_POST['commentaire']);

    $query = "UPDATE `informations` SET  `nom` = '$Nom', `societe` = '$Societe', `service` = '$Service', `adresse` = '$Adresse', `cp` = '$Cp', `telephone` = '$Telephone', `ville` = '$Ville', `pays` = '$Pays', `fixe` = '$Fixe', `fax` = '$Fax', `email` = '$Email', `commentaire` = '$Commentaire' WHERE id = '$id' ";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:home.php?message=update');
    } else {
        header('location:update.php?message=err');
    }
endif;

?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <a href="home.php" class="btn btn-sm btn-dark mr-2 mb-2">
                        <i class="">
                            <--Retour</i> </a> Ajouter un employé </div> <div class="card-body">
                                <form method="post" action="">

                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $recup['id'] ?>">
                                        <label for="Nom">Nom</label>
                                        <input type="text" name="Nom" class="form-control" value="<?= $recup['nom'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Societe">Société</label>
                                        <input type="text" name="Societe" class="form-control" value="<?= $recup['societe'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Service">Service</label>
                                        <input type="text" name="Service" class="form-control" value="<?= $recup['service'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Adresse">Adresse</label>
                                        <input type="text" name="Adresse" class="form-control" value="<?= $recup['adresse'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Cp">Cp</label>
                                        <input type="text" name="Cp" class="form-control" value="<?= $recup['cp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Telephone">Téléphone</label>
                                        <input type="text" name="Telephone" class="form-control" value="<?= $recup['telephone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Ville">Ville</label>
                                        <input type="text" name="Ville" class="form-control" value="<?= $recup['ville'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Pays">Pays</label>
                                        <input type="text" name="Pays" class="form-control" value="<?= $recup['pays'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="FIxe">Fixe</label>
                                        <input type="text" name="Fixe" class="form-control" value="<?= $recup['fixe'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Fax">Fax</label>
                                        <input type="text" name="Fax" class="form-control" value="<?= $recup['fax'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" name="Email" class="form-control" value="<?= $recup['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="commentaire">Commentaire</label>
                                        <input type="text" name="commentaire" class="form-control" value="<?= $recup['commentaire'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" name="submit">Modifier</button>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>
<?php
include('include/header.php');
include('../database/db.php');

if (isset($_POST['submit'])) :

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

    $query = "INSERT INTO `informations` (`id`, `nom`, `societe`, `service`, `adresse`, `cp`, `telephone`, `ville`, `pays`, `fixe`, `fax`, `email`, `commentaire`) 
                                  VALUES (NULL, '$Nom', '$Societe', '$Service', '$Adresse', '$Cp', '$Telephone', '$Ville', '$Pays', '$Fixe', '$Fax', '$Email', NULL);";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:home.php?message=ajouter');
    } else {
        header('location:add.php?message=err');
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
                                <?php
                                if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
                                    echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                                endif;
                                ?>
                                <form method="post" action="">

                                    <div class="form-group">
                                        <label for="Nom">Nom</label>
                                        <input type="text" name="Nom" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Societe">Société</label>
                                        <input type="text" name="Societe" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Service">Service</label>
                                        <input type="text" name="Service" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Adresse">Adresse</label>
                                        <input type="text" name="Adresse" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Cp">Cp</label>
                                        <input type="text" name="Cp" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Telephone">Téléphone</label>
                                        <input type="text" name="Telephone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Ville">Ville</label>
                                        <input type="text" name="Ville" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Pays">Pays</label>
                                        <input type="text" name="Pays" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="FIxe">Fixe</label>
                                        <input type="text" name="Fixe" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Fax">Fax</label>
                                        <input type="text" name="Fax" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" name="Email" class="form-control" required>
                                    </div>
                                  
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" name="submit">valider</button>
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
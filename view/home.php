<?php
session_start();
if(isset($_SESSION['a'])&&isset($_SESSION['password'])):



include('include/header.php');
include('../database/db.php');
// var_dump($_SESSION);
?>

<div class="container-fluid">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body bg-light">

                    <div class="card-header bg-info">
                        <a href="add.php" class="btn btn-sm btn-dark mr-2 mb-2">
                            <i class="fas fa-plus"> Ajouter</i>
                        </a>
                        <a href="home.php" class="btn btn-sm btn-dark mr-2 mb-2">
                            <i class="fas fa-home"> Home</i>
                        </a>
                        <a href="logout.php" title="Déconnexion" class="btn btn-dark mr-2 mb-2" style="font-size: 12px;">
                            <i class="fas fa-user mr-2 text-white"> Déconnexion</i>
                        </a>
                        <?php
                        // searsh
                        if (isset($_POST['find'])) :
                            $search = $_POST['search'];
                            $query = "SELECT * FROM `informations` WHERE CONCAT(`nom`, `societe`,`adresse`, `cp`, `ville`, `pays`) LIKE '%" . $search . "%'";
                            $run = mysqli_query($db, $query);
                        else :
                            $query = "SELECT * FROM `informations`";
                            $run = mysqli_query($db, $query);;
                        endif;
                        ?>
                        <form method="post" class="float-right mb-2 d-flex flex-row" action="">
                            <input type="text" name="search" placeholder="Recherche" class="form-control">
                            <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></fas-search></i></button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['message']) && $_GET['message'] == 'ajouter') :
                            echo "<div class='alert alert-success'>les informations ajouter a été avec succès</div>";
                        elseif (isset($_GET['message']) && $_GET['message'] == 'update') :
                            echo "<div class='alert alert-success'>les informations modifié a été avec succès</div>";
                        elseif (isset($_GET['message']) && $_GET['message'] == 'delete') :
                            echo "<div class='alert alert-danger'>les informations supprimé a été avec succès</div>";
                        elseif (isset($_GET['message']) && $_GET['message'] == 'commentaire') :
                            echo "<div class='alert alert-success'>le commentaire ajouter a été avec succès</div>";
                        endif;
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <form method="post" class="mt-2" action="checking.php">
                                    <input type="hidden" name="deleteall" value="<?= $recup['id'] ?>">
                                    <button class="btn bnt-sm btn-danger m-2"><i class="fa fa-trash"> Tout Supprimer</i></button>
                                </form>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">société</th>
                                    <th scope="col" style="padding-right: 9rem;">service</th>
                                    <th scope="col" style="padding-right: 10rem;">adresse</th>
                                    <th scope="col">cp</th>
                                    <th scope="col">téléphone</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col" style="padding-right: 9rem;">Pays</th>
                                    <th scope="col" style="padding-right: 9rem;">Fixe</th>
                                    <th scope="col">Fax</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>
                                    <th scope="col" style="padding-right: 18rem;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($search = mysqli_fetch_array($run)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $search['nom'] ?></th>
                                        <td><?= $search['societe'] ?></td>
                                        <td><?= $search['service'] ?></td>
                                        <td><?= $search['adresse'] ?></td>
                                        <td><?= $search['cp'] ?></td>
                                        <td><?= $search['telephone'] ?></td>
                                        <td><?= $search['ville'] ?></td>
                                        <td><?= $search['pays'] ?></td>
                                        <td><?= $search['fixe'] ?></td>
                                        <td><?= $search['fax'] ?></td>
                                        <td><?= $search['email'] ?></td>
                                        <td><?= $search['commentaire'] ?></td>
                                        <td class="d-flex flex-row">
                                            <a href="update.php?id=<?= $search['id'] ?>" class="btn bnt-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                            <form method="post" class="mr-1" action="checking.php">
                                                <input type="hidden" name="delete" value="<?= $search['id'] ?>">
                                                <button class="btn bnt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        <td >
                                            <form method="post" class="mr-1 formule d-flex flex-row" action="checking.php">
                                                <input type="hidden" name="id" value="<?= $search['id']; ?>">
                                                <input type="text" name="commentaire" class="form-control" name="description" value="" placeholder="écrire un commentaire">
                                                <button class="btn bnt-sm btn-primary" title="envoyer" type="submit" name="envoyer"><i class="fas fa-paper-plane"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/header.php');
                                else:
                                    header('Location:index.php');
                                endif;

?>
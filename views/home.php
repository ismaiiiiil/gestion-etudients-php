
<?php

    if(isset($_POST['find'])){// search
        $data = new EmployesController();
        $employes= $data->findEmployes();
    } else {
        $data = new EmployesController();
        $employes= $data->getAllEmployes();
    }

    // print_r($employes);

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <?php  include('./views/includes/alerts.php') ?>
            <div class="card">
                <!-- link ajouté -->
                <div class="card-body bg-light">
                <a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
                    <i class="fas fa-plus"></i>
                </a>
                <!-- link home -->
                <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                </a>
                <!-- link logout -->
                <a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
                        <i class="fas fa-user mr-2">
                            <?php echo $_SESSION['username']; ?>
                        </i>
                </a>
                <!-- link recherche -->
                <form method="POST" class="float-right mb-2 d-flex flex-row">
                    <input type="text" class="form-control" name="search" placeholder="Recherche">
                    <button type="submit" class="btn btn-info  btn-sm" name="find">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <!-- ----------- -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Département</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Date Embauche</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employes as $employe): ?>
                            <tr>
                                <th scope="col"><?php echo $employe["nom"] . ' ' . $employe["prenom"]; ?></th>
                                <td><?php echo $employe["matricule"];  ?></td>
                                <td><?php echo $employe["depart"];  ?></td>
                                <td><?php echo $employe["poste"];  ?></td>
                                <td><?php echo $employe["date_emb"];  ?></td>
                                <td> <?php 
                                            echo $employe["statut"]
                                            ? '<span class="badge badge-pill badge-success">Active</span>'
                                            : '<span class="badge badge-danger">Resilié</span>'
                                    ?>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="mr-1" action="update">
                                        <input type="hidden" name="id" value="<?= $employe["id"] ?>"/>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                    </form>

                                    <form method="post" class="mr-1" action="delete">
                                        <input type="hidden" name="id" value="<?= $employe["id"] ?>"/>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</div>
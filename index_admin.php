<?php require_once 'constants.php' ?>
<?php include './controllers/isLogged.php'; ?>
<?php include './modules/header.php';
$connection = new connect();;# es un objeto de tipo conexion,
      $proyectos= $connection->consultar("SELECT * FROM `projects`"); ?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Administrador de portfolio personal</h1>
        <p class="lead">Proyectos cargados en base de datos</p>
        <hr class="my-2">
        <p class="lead" style="font-size:1.5rem;">Para poder acceder al portfolio, al final de este mismo link cambie /index_admin.php por: /index.php <br><br>
         En CRUD podrá:  <br> Dar de alta un nuevo proyecto <br> Dar de baja un proyecto <br> Modificar un proyecto <br>
        </p>
       
    </div>
</div>
<div class ="container bg-secondary pb-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php #leemos proyectos 1 por 1
        foreach($proyectos as $proyecto){ ?>
            <div class="col">
                <div class="card border border-3 shadow">
                    <img class="card-img-top" style="object-fit:cover;" src="img/<?php echo $proyecto['image'];?>" alt="" width="300">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $proyecto['title'];?></h5>
                        <p class="card-text"><?php echo $proyecto['description'];?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include './modules/footer.php'; ?>
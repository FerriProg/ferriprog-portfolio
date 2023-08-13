<?php require_once 'constants.php' ?>
<?php include './controllers/isLogged.php'; ?>
<?php $currentPage = 'index_admin'; ?>
<?php include './modules/header.php';
$connection = new connect();;# es un objeto de tipo conexion,
      $proyectos= $connection->consult("SELECT * FROM `projects`"); ?>

<main>
<div class ="container customColorBackground pb-5">
  <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
    <?php #leemos proyectos 1 por 1
        foreach($proyectos as $proyecto){ ?>
            <div class="col">
                <div class="card border border-3 shadow customCardHeight">
                    <img class="card-img-top" style="object-fit:cover;" src="img/<?php echo $proyecto['image'];?>" alt="" width="300">
                    <div class="card-body overflow-auto">
                        <h5 class="card-title"><?php echo $proyecto['title'];?></h5>
                        <p class="card-text"><?php echo $proyecto['description'];?></p>
                        <a
                  class="btn btn-secondary btn-icon"
                  href="<?php echo $proyecto['github'];?>"
                  target="_blank"
                >
                  <i class="fa-brands fa-github"></i> Repositorio
                </a>
                <a
                  class="btn btn-dark btn-icon"
                  href="<?php echo $proyecto['extlink'];?>"
                  target="_blank"
                >
                  <i class="fa-solid fa-arrow-up-right-from-square"></i> Link externo
                </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</main>
<?php include './modules/footer.php'; ?>
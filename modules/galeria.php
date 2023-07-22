<?php require_once '../constants.php' ?>
<?php include '../controllers/isLogged.php'; ?>
<?php $currentPage = 'galeria'; ?>
<?php include 'header.php'; ?>

<?php if($_POST){#si hay envio de datos, los inserto en la base de datos 

    $nombre_proyecto = $_POST['title'];
    $descripcion = $_POST['description'];
    #nombre de la imagen
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"../img/".$imagen);
    $repo = $_POST['github'];
    $extlink = $_POST['extlink'];
   
   
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new connect();
    $sql="INSERT INTO `projects` (`id`, `title`, `image`, `description`, `github`, `extlink`) VALUES (NULL, '$nombre_proyecto' , '$imagen', '$descripcion', '$repo', '$extlink')";
    $id_proyecto = $conexion->ejecutar($sql);
     #para que no intente borrar muchas veces
     header("Location:galeria.php");
     die();

 }
 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new connect();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select image FROM  `projects` where id=".$id);
        #la borramos de la carpeta 
        unlink("../img/".$imagen[0]['image']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `projects` WHERE `projects`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:galeria.php");
         die();
 }

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        header("Location:modificar.php?modificar=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new connect();
  $proyectos= $conexion->consultar("SELECT * FROM `projects`");
?> 

<div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-sm-6">
                <a class="btn btn-success mb-3" href="./create.php">Nuevo proyecto</a>
            </div>
        </div>
    </div>
    <div class="customColorBackground">
        <div class="row container-fluid d-flex justify-content-center mb-5">
            <div class="col-md-10 col-sm-6">
                <table class="table tabla__galeria customColorBackground">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Github</th>
                            <th class="text-center">Link externo</th>
                            <th class="text-center">Eliminar</th>
                            <th class="text-center">Modificar</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php #leemos proyectos 1 por 1
                        foreach($proyectos as $proyecto){ ?>
                    
                        <tr >
                            <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                            <td><?php echo $proyecto['title'];?></td>
                            <td> <img width="200" src="../img/<?php echo $proyecto['image'];?>" alt="">  </td>
                            <td class="texto"><?php echo $proyecto['description'];?></td>
                            <td class="text-center"><a class="btn btn-secondary btn-icon" href="<?php echo $proyecto['github'];?>" target="_blank"> <i class="fa-brands fa-github"></i> </a></td>
                            <td class="text-center"><a class="btn btn-dark btn-icon" href="<?php echo $proyecto['extlink'];?>" target="_blank"> <i class="fa-solid fa-arrow-up-right-from-square"></i> </a></td>
                            <td class="text-center"><a name="eliminar" id="eliminar" class="btn btn-danger btn-icon" href="?borrar=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-trash"></i></a></td>
                            <td class="text-center"><a name="modificar" id="modificar" class="btn btn-warning btn-icon" href="?modificar=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>

                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
                <h2 class="card-title text-dark card__mobile">Listado de proyectos ingresados: </h2>
                <?php #leemos proyectos 1 por 1
                 foreach($proyectos as $proyecto){ ?>
                    <div class="col card__mobile  mb-4">
                        <div class="card border border-3 shadow w-100">
                            <h3 class="card-title text-dark"><?php echo $proyecto['title'];?></h3>
                            <a>
                                <img class="card-img-top" width="200" src="../img/<?php echo $proyecto['image'];?>" alt="">
                            </a>
                            <div class="card-body">
                               
                                <p class="card-text text-dark"><?php echo $proyecto['description'];?></p>
                                <a
              class="text-decoration-none modal-github btn btn-secondary btn-icon"
              href="<?php echo $proyecto['github'];?>"
              target="_blank"
            >
            <div>
              <i class="fa-brands fa-github"></i>
            </div>
              
            </a>
            <a
              class="text-decoration-none modal-extlink btn btn-dark btn-icon"
              href="<?php echo $proyecto['extlink'];?>"
              target="_blank"
            >
            <div>
              <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
              
            </a>
                                <a name="eliminar" id="eliminar" class="btn btn-danger btn-icon" href="?borrar=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-trash"></i></a>
                                <a name="modificar" id="modificar" class="btn btn-warning btn-icon" href="?modificar=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!--cierra el col-->  
            
        </div>
    </div>
   
<?php include 'footer.php'; ?>
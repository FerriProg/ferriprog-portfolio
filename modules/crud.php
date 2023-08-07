<?php require_once '../constants.php' ?>
<?php include '../controllers/isLogged.php'; ?>
<?php $currentPage = 'crud'; ?>
<?php include 'header.php'; ?>

<?php if($_POST){#si hay envio de datos, los inserto en la base de datos 

    $projectTitle = $_POST['title'];
    $description = $_POST['description'];
    #nombre de la imagen
    $image = $_FILES['file']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $tempImage=$_FILES['file']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $image= $fecha->getTimestamp()."_".$image;
    move_uploaded_file($tempImage,"../img/".$image);
    $repo = $_POST['github'];
    $extlink = $_POST['extlink'];
   
   
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new connect();
    $sql="INSERT INTO `projects` (`id`, `title`, `image`, `description`, `github`, `extlink`) VALUES (NULL, '$projectTitle' , '$image', '$description', '$repo', '$extlink')";
    $id_proyecto = $conexion->ejecutar($sql);
     #para que no intente borrar muchas veces
     header("Location:crud.php");
     die();

 }
 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new connect();

        #recuperamos la imagen de la base antes de borrar 
        $image = $conexion->consultar("select image FROM  `projects` where id=".$id);
        #la borramos de la carpeta 
        unlink("../img/".$image[0]['image']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `projects` WHERE `projects`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:crud.php");
         die();
 }

   if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        header("Location:edit.php?edit=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new connect();
  $proyectos= $conexion->consultar("SELECT * FROM `projects`");
?> 

<div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-success mb-3" href="./create.php">Nuevo proyecto</a>
            </div>
        </div>
    </div>
    <div class="customColorBackground">
        <div class="row container-fluid d-flex justify-content-center mb-5">
            <div class="col-md-10">
                <div class="table-responsive">
                <table class="table customColorBackground">
                    <thead>
                        <tr>
                            <th class="text-center customMinWidth">Nombre</th>
                            <th class="text-center customMinWidth">Imagen</th>
                            <th class="text-center customMinWidth">Descripción</th>
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
                            <td><?php echo $proyecto['description'];?></td>
                            <td class="text-center"><a class="btn btn-secondary btn-icon" href="<?php echo $proyecto['github'];?>" target="_blank"> <i class="fa-brands fa-github"></i> </a></td>
                            <td class="text-center"><a class="btn btn-dark btn-icon" href="<?php echo $proyecto['extlink'];?>" target="_blank"> <i class="fa-solid fa-arrow-up-right-from-square"></i> </a></td>
                            <td class="text-center"><a name="eliminar" id="eliminar" class="btn btn-danger btn-icon" href="?borrar=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-trash"></i></a></td>
                            <td class="text-center"><a name="edit" id="edit" class="btn btn-warning btn-icon" href="?edit=<?php echo $proyecto['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>

                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
                </div>
            </div><!--cierra el col-->  
            
        </div>
    </div>
   
<?php include 'footer.php'; ?>
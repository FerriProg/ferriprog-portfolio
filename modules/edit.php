<?php require_once '../constants.php' ?>
<?php include '../controllers/isLogged.php'; ?>
<?php $currentPage = ''; ?>
<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new connect();
        $proyecto= $conexion->consultar("SELECT * FROM `projects` where id=".$id);
     
    }
}
if($_POST){
    $id = $_SESSION['id_proyecto'];
    #levantamos los datos del formulario
    $projectTitle = $_POST['title'];
    $description = $_POST['description'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $image = $conexion->consultar("select image FROM  `projects` where id=".$id);
    #pregunto si el usuario cargó una imagen nueva
    if(!empty($_FILES['file']['name'])) {
        
        ###########################################################################################
        #si quisiera ver lo que hay en $imagen, puedo hacer lo siguiente:
        #echo '<pre>';
        #var_dump($image);
        #echo '</pre>';
        #die();
        ###########################################################################################
        #recuperamos la imagen de la base antes de borrar 
        $image = $conexion->consultar("select image FROM  `projects` where id=".$id);
        #la borramos de la carpeta 
        unlink("../img/".$image[0]['image']);
        #nombre de la imagen
        $image = $_FILES['file']['name'];
        #tenemos que guardar la imagen en una carpeta 
        $tempImage=$_FILES['file']['tmp_name'];
        #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
        $fecha = new DateTime();
        $image= $fecha->getTimestamp()."_".$image;
        move_uploaded_file($tempImage,"../img/".$image);
        $finalImage = $image;
        #creo una instancia(objeto) de la clase de conexion
        #$conexion = new connect();
        #$sql = "UPDATE `projects` SET `title` = '$projectTitle' , `image` = '$image', `description` = '$description' WHERE `projects`.`id` = '$id';";
        #$id_proyecto = $conexion->ejecutar($sql);
        #header("location:crud.php");
        #die();
    } else {
        $finalImage = $image[0]['image'];

        ###########################################################################################
        #Al agregar las llaves alrededor de "{$image[0]['image']}", PHP entenderá que esa parte debe ser interpretada
        #como una expresión dentro de la cadena y evaluará correctamente el valor de "image" en el array.
        ###########################################################################################
        #$conexion = new connect();
        #$sql = "UPDATE `projects` SET `title` = '$projectNTitle' , `image` = '{$image[0]['image']}', `description` = '$description' WHERE `projects`.`id` = '$id';";
        #$id_proyecto = $conexion->ejecutar($sql);
        #header("location:crud.php");
        #die();
    }
    $github = $_POST['github'];
    $extlink = $_POST['extlink'];
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new connect();
    $sql = "UPDATE `projects` SET `title` = '$projectTitle' , `image` = '$finalImage', `description` = '$description', `github` = '$github', `extlink` = '$extlink' WHERE `projects`.`id` = '$id';";
    $id_proyecto = $conexion->ejecutar($sql);
    header("location:crud.php");
    die();
    
}
?>
<?php #leemos proyectos 1 por 1
  foreach($proyecto as $fila){ ?>
    <div class="row d-flex justify-content-center mt-4 mb-5 container-fluid">
            <div class="col-md-10 col-sm-12">
                <div class="card customColorBackground">
                    <div class="card-header">
                        Datos del Proyecto
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="title">Nombre del Proyecto</label>
                                <input required class="form-control" type="text" name="title" id="title" value="<?php echo $fila['title']; ?>">
                            </div>
                        
                            <div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <label for="file">Imagen del proyecto - Se actualizará al grabar los cambios</label>
                                    <br>
                                    <div class="d-flex justify-content-center align-item-center">
                                        <img class="img__edit img-fluid" src="../img/<?php echo $fila['image']; ?>">
                                    </div>
                                </div>
                                <p>Seleccione un nueva imagen si desea modificar</p>
                                <input class="form-control" type="file" name ="file" id="file" value="<?php echo $fila['image'];?>">
                            </div>
                            <br>
                            <div>
                                <label for="description">Indique descripción del proyecto</label>
                                <textarea required class="form-control" name="description" id="description" cols="30" rows="4"><?php echo $fila['description'];?></textarea>
                            </div>
                            <br>
                            <div>
                                <label for="github">Github</label>
                                <input required class="form-control" type="text" name="github" id="github" value="<?php echo $fila['github']; ?>">
                            </div>
                            <div>
                                <label for="extlink">Link externo (deploy, video, etc)</label>
                                <input required class="form-control" type="text" name="extlink" id="extlink" value="<?php echo $fila['extlink']; ?>">
                            </div>
                            <div>
                            <br>
                            <input class="btn btn-warning" type="submit" value="Modificar Proyecto">
                            </div>
                    
                        </form>
                    </div> <!--cierra el body-->
        
                </div><!--cierra el card-->
                
            </div><!--cierra el col-->
        </div><!--cierra el row-->
        <?php #cerramos la llave del foreach
                        } ?>

<?php include 'footer.php'; ?>
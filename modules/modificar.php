<?php require_once '../constants.php' ?>
<?php include '../controllers/isLogged.php'; ?>
<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new connect();
        $proyecto= $conexion->consultar("SELECT * FROM `projects` where id=".$id);
     
    }
}
if($_POST){
    $id = $_SESSION['id_proyecto'];
    #levantamos los datos del formulario
    $nombre_proyecto = $_POST['title'];
    $descripcion = $_POST['description'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select image FROM  `projects` where id=".$id);
    #pregunto si el usuario cargó una imagen nueva
    if(!empty($_FILES['archivo']['name'])) {
        
        ###########################################################################################
        #si quisiera ver lo que hay en $imagen, puedo hacer lo siguiente:
        #echo '<pre>';
        #var_dump($imagen);
        #echo '</pre>';
        #die();
        ###########################################################################################
        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select image FROM  `projects` where id=".$id);
        #la borramos de la carpeta 
        unlink("../img/".$imagen[0]['image']);
        #nombre de la imagen
        $imagen = $_FILES['archivo']['name'];
        #tenemos que guardar la imagen en una carpeta 
        $imagen_temporal=$_FILES['archivo']['tmp_name'];
        #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
        $fecha = new DateTime();
        $imagen= $fecha->getTimestamp()."_".$imagen;
        move_uploaded_file($imagen_temporal,"../img/".$imagen);
        $imagenFinal = $imagen;
        #creo una instancia(objeto) de la clase de conexion
        #$conexion = new connect();
        #$sql = "UPDATE `projects` SET `title` = '$nombre_proyecto' , `image` = '$imagen', `description` = '$descripcion' WHERE `projects`.`id` = '$id';";
        #$id_proyecto = $conexion->ejecutar($sql);
        #header("location:galeria.php");
        #die();
    } else {
        $imagenFinal = $imagen[0]['image'];

        ###########################################################################################
        #Al agregar las llaves alrededor de "{$imagen[0]['image']}", PHP entenderá que esa parte debe ser interpretada
        #como una expresión dentro de la cadena y evaluará correctamente el valor de "image" en el array.
        ###########################################################################################
        #$conexion = new connect();
        #$sql = "UPDATE `projects` SET `title` = '$nombre_proyecto' , `image` = '{$imagen[0]['image']}', `description` = '$descripcion' WHERE `projects`.`id` = '$id';";
        #$id_proyecto = $conexion->ejecutar($sql);
        #header("location:galeria.php");
        #die();
    }
    $github = $_POST['github'];
    $extlink = $_POST['extlink'];
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new connect();
    $sql = "UPDATE `projects` SET `title` = '$nombre_proyecto' , `image` = '$imagenFinal', `description` = '$descripcion', `github` = '$github', `extlink` = '$extlink' WHERE `projects`.`id` = '$id';";
    $id_proyecto = $conexion->ejecutar($sql);
    header("location:galeria.php");
    die();
    
}
?>
<?php #leemos proyectos 1 por 1
  foreach($proyecto as $fila){ ?>
    <div class="row d-flex justify-content-center mt-4 mb-5">
            <div class="col-md-10 col-sm-12">
                <div class="card customColorBackground">
                    <div class="card-header">
                        Datos del Proyecto
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="nombre">Nombre del Proyecto</label>
                                <input required class="form-control" type="text" name="title" id="nombre" value="<?php echo $fila['title']; ?>">
                            </div>
                        
                            <div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <label for="archivo">Imagen del Proyecto - Se actualizara al grabar los cambios</label>
                                    <br>
                                    <div class="d-flex justify-content-center align-item-center">
                                        <img class="img__modificar" src="../img/<?php echo $fila['image']; ?>">
                                    </div>
                                </div>
                                <p>Seleccione un nueva Imagen si desea modificar</p>
                                <input class="form-control" type="file" name ="archivo" id="archivo" value="<?php echo $fila['image'];?>">
                            </div>
                            <br>
                            <div>
                                <label for="descripcion">Indique Descripción del Proyecto</label>
                                <textarea required class="form-control" name="description" id="descripcion" cols="30" rows="4"><?php echo $fila['description'];?></textarea>
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
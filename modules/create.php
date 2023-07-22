<?php require_once '../constants.php' ?>
<?php include '../controllers/isLogged.php'; ?>
<?php $currentPage = ''; ?>
<?php include 'header.php'; ?>

 <br>
<!--ya tenemos un container en el header que cierra en el footer-->

    <div class="row container-fluid d-flex justify-content-center mb-5">
        <div class="col-md-10 col-sm-12">
            <div class="card customColorBackground">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="galeria.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombre">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="title" id="nombre">
                        </div>
                    
                        <div>
                            <label for="archivo">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>
                        <br>
                        <div>
                            <label for="descripcion">Descripción del Proyecto</label>
                            <textarea required class="form-control" name="description" id="descripcion" cols="30" rows="4"></textarea>
                        </div>
                        <br>
                        <div>
                            <label for="repo">Github</label>
                            <input required class="form-control" type="text" name="github" id="github"></input>
                        </div>
                        <div>
                            <label for="descripcion">Link externo (deploy, video, etc)</label>
                            <input required class="form-control" type="text" name="extlink" id="extlink"></input>
                        </div>
                        <div>
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar Proyecto">
                        </div>
                
                    </form>
                </div> <!--cierra el body-->
    
            </div><!--cierra el card-->
            
        </div><!--cierra el col-->
    </div><!--cierra el row-->

<?php include 'footer.php'; ?>
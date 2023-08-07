<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@0;1&display=swap"
      rel="stylesheet"
    />
     <!-- bootstrap -->
     <link rel="stylesheet" href="<?php echo ROOTPATH . '/css/bootstrap.min.css' ?>" />
     <link rel="stylesheet" href="<?php echo ROOTPATH . '/css/headerStyles.css' ?>" />
     <script
      src="https://kit.fontawesome.com/ae9375b602.js"
      crossorigin="anonymous"
    ></script>
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <title>Portfolio</title>
</head>
<body>

    <header class="p-0 m-0 customHeader">
      <nav class="navbar navbar-expand-lg navbar-light backgroundColor">
        <div class="container">
          
          <button
            class="navbar-toggler mobile-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-center">
              <li class="nav-item d-flex justify-content-center">
                <a
                  class="nav-link navLink2 text-center <?php echo ($currentPage === 'index_admin') ? 'active disabled' : ''; ?>"
                  aria-current="page"
                  href="<?php echo ROOTPATH . '/index_admin.php'?>"
                  >Ver proyectos</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center <?php echo ($currentPage === 'crud') ? 'active disabled' : ''; ?>" href="<?php echo ROOTPATH . '/modules/crud.php'?>"
                  >Administrar proyectos</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center" target="_blank" href="<?php echo ROOTPATH . '/index.php'?>"
                  >Ir al portfolio</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center" href="<?php echo ROOTPATH . '/controllers/close.php'?>"
                  >Cerrar sesión de User: <span><?php echo $_SESSION['usuario']; ?></span></a
                >
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>
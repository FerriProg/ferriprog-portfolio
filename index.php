<?php include './controllers/connect.php';
$connection = new connect();
$proyectos= $connection->consultar("SELECT * FROM `projects`");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ferriprog Portfolio</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@0;1&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/styles.css" />
    <script
      src="https://kit.fontawesome.com/ae9375b602.js"
      crossorigin="anonymous"
    ></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  </head>
  <body>
    <header class="p-0 m-0 customHeader container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light backgroundColor">
        <div class="container">
          <a class="navbar-brand text-white customShadow" href="#">
            <img src="./img/face.jpg" alt="Ferriprog face" width="100px" />
            <span>Christian Gabriel Ferreiro</span>
          </a>
          <button
            class="navbar-toggler"
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
            <ul class="navbar-nav w-100 justify-content-end">
              <li class="nav-item d-flex justify-content-center">
                <a
                  class="nav-link navLink2 text-center"
                  aria-current="page"
                  href="#about"
                  >Acerca de mí</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center" href="#projects"
                  >Mis proyectos</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center" href="#testimonies"
                  >Testimonios</a
                >
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a class="nav-link navLink2 text-center" href="#contact"
                  >Contactame</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="outModifier">
        <div class="backgroundModifier">
          <img src="./img/main.jpg" class="d-block w-100" alt="ba1" />
        </div>
        <section
          id="about"
          class="d-flex justify-content-center align-items-center aboutCustomHeight"
        >
          <div class="aboutChild d-flex flex-column text-center textOverImage">
            <h1 class="mb-3 text-center">Web Fullstack Developer Jr.</h1>
            <p class="lh-base fw-normal text-center mb-sm-3 customFont">
              Soy un programador Web Fullstack Jr muy entusiasta de mi trabajo.
              Siempre dispuesto a resolver nuevos problemas y desafíos. Manejo
              stack MERN y PERN, actualmente me encuentro aprendiendo PHP y
              JAVA, deseo profundizar en backend. También soy Técnico
              Universitario en Electrónica; tengo un background de estudios
              avanzados en la carrera de Ingeniería Electrónica, y First
              Certificate en Inglés (Nivel C2 Proficient).
            </p>
          </div>
        </section>
      </div>
    </header>
    <main>
      <section id="projects" class="container p-0">
        <h2 class="d-flex justify-content-center fs-3 p-3 mb-0">
          <div class="projectSectionTitle">Mis proyectos</div>
        </h2>
        <div class="row mt-0 mb-0 me-auto ms-auto">
        <?php #leemos proyectos 1 por 1
                foreach($proyectos as $proyecto){ 
                ?>
                <div class="col-md-4 mb-2">
            <div class="card customProjectCardHeight d-flex flex-column">
              <img
                src="./img/<?php echo $proyecto['image'];?>"
                class="card-img-top"
                alt="Happy Tails project"
              />
              <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title">
                <?php echo $proyecto['title'];?>
                </h5>
                
                <div class="mt-auto">
                <a href="#" class="btn btn-primary abrirModal mt-auto"
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  
                  data-title="<?php echo $proyecto['title']; ?>"
                  data-image="<?php echo $proyecto['image']; ?>"
                  data-description="<?php echo $proyecto['description']; ?>"
                  data-github="<?php echo $proyecto['github'];?>"
                  data-extlink="<?php echo $proyecto['extlink'];?>"
                >
                  Ver detalles
                </a>
                </div>
                

              </div>
            </div>
          </div>
                <?php 
                } 
              ?>
          
        </div>
      </section>

      <section id="testimonies" class="container p-0">
        <h2 class="d-flex justify-content-center fs-3 p-3 mb-0">
          <div class="projectSectionTitle">Testimonios</div>
        </h2>
        <div class="row mt-0 mb-0 me-auto ms-auto customWidth">
          <div class="col-md-4 mb-2 d-flex align-items-stretch">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Lautaro Martin - Web Fullstack Developer<a
                    class="text-decoration-none"
                    href="https://www.linkedin.com/in/lautaro-martin-dev"
                    target="_blank"
                  >
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </h5>
                <p class="card-text">
                  "Un gran desarrollador y compañero. Nunca dejó que los
                  desafíos y adversidades se pusieran al frente. Su pensamiento
                  crítico y analítico, mezclado con un tono de experiencia y
                  amabilidad, evitó que se creen situaciones problemáticas y
                  permitió que el día a día sea más ameno en el trabajo."
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 d-flex align-items-stretch">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Juan José Cieri - Web Fullstack Developer<a
                    class="text-decoration-none"
                    href="https://www.linkedin.com/in/juan-jose-cieri"
                    target="_blank"
                  >
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </h5>
                <p class="card-text">
                  "Es una persona y un desarrollador excelente, siempre atento y
                  predispuesto a ayudar a los demás cuando hay problemas. Muy
                  perseverante y dedicado en lo que hace, siempre que surge
                  algún problema no para hasta resolverlo. Tiene mucha capacidad
                  para adaptarse a nuevas tecnologías y sacar lo mejor de cada
                  una para mejorar el desarrollo y funcionamiento de una
                  aplicación."
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 d-flex align-items-stretch">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Juan Manuel Martinez - Web Fullstack Developer<a
                    class="text-decoration-none"
                    href="https://www.linkedin.com/in/jmanum95"
                    target="_blank"
                  >
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </h5>
                <p class="card-text">
                  "Tuve el agrado de trabajar con Christian durante el bootcamp
                  de Henry. Me sorprendió su capacidad para resolver los
                  desafíos que se nos presentaron con el pasar de los días y
                  aprendí mucho de el, además de ser un gran compañero y estar
                  siempre dispuesto para ayudar al equipo."
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 d-flex align-items-stretch">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Florencia Re - Web Fullstack Developer<a
                    class="text-decoration-none"
                    href="https://www.linkedin.com/in/florencia-re"
                    target="_blank"
                  >
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </h5>
                <p class="card-text">
                  "Con Christian tuve la oportunidad de desarrollar un gran
                  proyecto y trabajamos juntos en la incorporación de Mercado
                  Pago a la aplicación. Habilidades técnicas excelentes,
                  pensamiento analítico y lógico son herramientas con las que
                  cuenta que lo hacen destacar, siempre dispuesto y con ganas de
                  trabajar. Su iniciativa y ganas de aprender sin dudas fueron
                  clave en diferentes features que fueron incorporadas al
                  proyecto gracias a él. Volvería a trabajar con él y lo
                  considero un gran compañero."
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 d-flex align-items-stretch">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Cristhian Moreno Moreno - Web Fullstack Developer<a
                    class="text-decoration-none"
                    href="https://www.linkedin.com/in/progdev-cristhian"
                    target="_blank"
                  >
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </h5>
                <p class="card-text">
                  "Durante el tiempo que trabaje con Christian Ferreiro,
                  demostró mucho interés, esfuerzo, dedicación en cumplir sus
                  objetivos propuestos, Con la destreza de aprender e
                  implementar nuevas metodologías en periodos de tiempo cortos y
                  excelente trabajo de equipo."
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="container p-0 mb-4">
        <h2 class="d-flex justify-content-center fs-3 p-3 mb-0">
          <div class="projectSectionTitle">Contactame</div>
        </h2>
        <div class="col-md-5 mt-0 mb-0 me-auto ms-auto">
          <div class="row">
            <a
              class="text-decoration-none d-flex justify-content-center contactFont"
              href="https://www.linkedin.com/in/christian-gabriel-ferreiro-72b92124b/"
              target="_blank"
            >
              <div>
                <i class="fa-brands fa-linkedin"></i> LinkedIn:
                christian-gabriel-ferreiro-72b92124b
              </div></a
            >
            <a
              class="text-decoration-none d-flex justify-content-center contactFont"
              href="https://github.com/FerriProg"
              target="_blank"
            >
              <div>
                <i class="fa-brands fa-github"></i> GitHub: FerriProg
              </div></a
            >
            <a
              class="text-decoration-none d-flex justify-content-center contactFont"
              href="mailto:cgferreiro1985@gmail.com"
              target="_blank"
            >
              <div>
                <i class="fa-regular fa-envelope"></i> E-mail:
                cgferreiro1985@gmail.com
              </div></a
            >
          </div>
        </div>
      </section>
    </main>
    <footer>
      <h5 class="d-flex justify-content-center p-3 mb-0 footerFont">
        Sitio diseñado por Christian G. Ferreiro usando PHP, incluye vista de
        administrador con CRUD.
      </h5>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Título del modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          <img
              src=""
              class="modal-image-container"
              alt=""
            />
          
          <div class="modal-body"></div>
          <div class="modal-footer">
            <a
              class="text-decoration-none modal-github"
              href=""
              target="_blank"
            >
            <div>
              <i class="fa-brands fa-github"></i> Repositorio
            </div>
              
            </a>
            <a
              class="text-decoration-none modal-extlink"
              href=""
              target="_blank"
            >
            <div>
              <i class="fa-solid fa-arrow-up-right-from-square"></i> Link externo
            </div>
              
            </a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/modal.js"></script>
  </body>
</html>

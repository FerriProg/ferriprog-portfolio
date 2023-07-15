<?php include '../controllers/validateLogin.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>  
    <link rel="stylesheet" href="../css/loginStyles.css" />
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Iniciar sesión</h2>
                <form action="login.php" method="post">
                    <input type="text" name="email" id="email" class="field" placeholder="Usuario" required>
                    <input type="password" name="pass" id="subject" class="field" placeholder="Contraseña" required>
                   
                    <input type="submit" value="Enviar" class="btn">
                  
                </form>
                <p>Usuario: admin</p>
                <p>Contraseña: generica</p>
        </div>
    </div>
    
</body>
</html>
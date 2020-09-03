<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="../img/icono.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/estilos-login.css">
  <link rel="stylesheet" href="../css/fonts/style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <script src="../package/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="../package/dist/sweetalert2.min.css">

<body style="background: #ccc;">

<div class="login-box">
    <center><a href="../index.php"><img  class="cryo" src="../img/logo-nuevo.jpeg" alt="No disponible"></a></center>
<br>
<h2>Sistema Ticket:</h2>
<form class="form-group" id="login">
<div class="form-group">
                <div class='input-group date form-group'>
                    <input class=" form-control txt" type="text" required placeholder="Nombre" name="name" id="name">
                    <span class="input-group-addon">
                        <span class="icon-user"></span>
                    </span>
                </div>
  </div>
  <br>
  <div class="form-group">
                <div class='input-group date form-group'>
                    <input class="form-control txt" pattern="[A-Za-z0-9.]{1,20}" required type="password" placeholder="Contraseña" name="pass" id="pass" autocomplete="off" >
                    <span class="input-group-addon">
                        <span class="icon-lock"></span>
                    </span>
                </div>
  </div>
   <br>
  <center>
  <button type="submit" name="entrar" id="entrar" class="btn btn-success"><span class="icon-enter"></span> Entrar</button></center>
  </form>
  <br><br>
</div>  
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/functiones-index.js"></script>
</body> 
</html> 
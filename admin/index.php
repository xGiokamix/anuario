<?php
   include_once("../conf.php"); 
    $msj="";
    $con = mysqli_connect(HOST,DBUSER,PASS,DB); 

/////////*******Validación login usuario ******* */
  if(isset($_POST["correo"]) && isset($_POST["clave"])){
    $sql="select count(*) cnt from usuarios where usuario='".$_POST["correo"]."' and clave='".md5($_POST["clave"])."'and activo='si'";
    $res=mysqli_query($con,$sql);
    $row =mysqli_fetch_assoc($res);
    
      if($row["cnt"]==1){
      //inicia sesión
        session_start();
        $_SESSION['usuario']=$_POST['correo'];
        header("Location: bienvenida.php");
        mysqli_close($con);
        exit();
      } else {
        $msj=("Usuario y/o clave incorectos");
      } 
  }
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"/>
    <title>Iniciar Sesión</title>
  </head>

  <body >
    <main>

<!--mensaje de alerta de usuario incorrecto -->
<?php
  if($msj!=""){
?>
      <div class="alert alert-danger" role="alert">
      <?php echo $msj;?>
      </div>
<?php
}
?>
      <form action='index.php' method='post'>
        <div style="text-align: center">
          <img class="mb-4" src="../img/6.ico" alt width="100" height="100" />
        </div>
        <h1 class="h3 mb-3 fw-normal" style="text-align: center">
          Iniciar Sesión
        </h1>
<!-- Correo-->
        <div class="form-floating">
          <input
            type="email"
            class="form-control"
            id="floatingInput"
            placeholder="name@example.com"
            name="correo"
            />
          <label for="floatingInput">Dirección de correo electrónico</label>
        </div>
<!-- Contraseña-->
        <div class="form-floating">
          <input
            type="password"
            class="form-control"
            id="floatingPassword"
            placeholder="Password"
            name="clave"
            />
          <label for="floatingPassword">Contraseña</label>
        </div>
<!-- Recuerdame-->
        <div class="form-check text-start my-3">
          <input
            class="form-check-input"
            type="checkbox"
            value="remember-me"
            id="flexCheckDefault"
            />
          <label class="form-check-label" for="flexCheckDefault">Recuérdame</label>
          </div>
<!-- Btn Iniciar Sesión-->
          <button class="btn btn-primary w-100 py-2" type="submit">
            Iniciar sesión
          </button>
      </form>
  </main>
  
  </body>
</html>

<?php
   mysqli_close($con);
?>

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

    <!--CSS bootstrap-->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
          inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
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
  
  <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php
   mysqli_close($con);
?>

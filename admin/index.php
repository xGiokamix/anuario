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
    <form action='index.php'>
      <div style="text-align: center">
      <img class="mb-4" src="../img/6.ico" alt width="100" height="100" />
      </div>
    
      <h1 class="h3 mb-3 fw-normal" style="text-align: center">
          Iniciar Sesión
      </h1>
      
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
      <div class="form-check text-start my-3">
        <input
          class="form-check-input"
          type="checkbox"
          value="remember-me"
          id="flexCheckDefault"
          />
        <label class="form-check-label" for="flexCheckDefault">Recuérdame</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">
          Iniciar sesión
        </button>
    </form>
  </main>
  
  </body>
</html>


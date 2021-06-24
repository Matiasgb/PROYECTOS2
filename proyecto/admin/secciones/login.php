<?php

?>
<section class="container-flex content">
    <div>
        <h1>Iniciar sesión</h1>
        <p>Para poder acceder al panel de administración, tenés que iniciar sesión.</p>
        <p>Ingresá tus credenciales de acceso en el formulario para continuar.</p>

        <form action="acciones/iniciar-sesion.php" method="post">
            <div class="form-fila">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-fila">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="button">Ingresar</button>
        </form>
    </div>
</section>

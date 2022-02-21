<div class="contenedor-app">
    <div class="imagen"></div>  
    <div class="app">        
        <div class="accionesExit"><a href="/">Regresar</a></div>
        <h1 class="nombre-pagina">Crear Cuenta</h1>
        <p class="descripcion-pagina">Llena el siguiente el formulario para crear una cuenta</p>

        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

        <form class="formulario" method="POST" action="/crear-cuenta">
        
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    style="color:black"
                    name="nombre"
                    placeholder="Tu Nombre"
                    value="<?php echo s($usuario->nombre); ?>"
                />
            </div>

            <div class="campo">
                <label for="apellido">Apellido</label>
                <input
                    type="text"
                    id="apellido"
                    style="color:black"
                    name="apellido"
                    placeholder="Tu Apellido"
                    value="<?php echo s($usuario->apellido); ?>"
                />
            </div>

            <div class="campo">
                <label for="telefono">Teléfono</label>
                <input
                    type="tel"
                    id="telefono"
                    style="color:black"
                    name="telefono"
                    placeholder="Tu Teléfono"
                    value="<?php echo s($usuario->telefono); ?>"
                />
            </div>

            <div class="campo">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    style="color:black"
                    name="email"
                    placeholder="Tu E-mail"
                    value="<?php echo s($usuario->email); ?>"
                />
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    style="color:black"
                    name="password"
                    placeholder="Tu Password"
                />
            </div>

            <input type="submit"style="color:#ffff" value="Crear Cuenta" class="boton">


        </form>

        <div class="acciones">
            <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/olvide">¿Olvidaste tu password?</a>
        </div>
    </div>
</div>
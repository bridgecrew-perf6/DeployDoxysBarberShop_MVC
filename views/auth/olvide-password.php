<div class="contenedor-app">
<div class="imagen"></div>  
    <div class="app"> 
        <div class="accionesExit"><a href="/login">Regresar</a></div>
        <h1 class="nombre-pagina">Olvide Password</h1>
            <p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

            <?php 
                include_once __DIR__ . "/../templates/alertas.php";
            ?>

            <form class="formulario" action="/olvide" method="POST">
                <div class="campo">
                    <label for="email">Email</label>
                    <input 
                        type="email"
                        id="email"
                        style="color:black"
                        name="email"
                        placeholder="Tu Email"
                    />
                </div>

                <input type="submit" style="color:#ffff" class="boton" value="Enviar Instrucciones">
            </form>

            <div class="acciones">
                <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
                <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear Una</a>
            </div>
    </div>
</div>
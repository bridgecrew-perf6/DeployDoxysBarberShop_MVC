<div class="contenedor-app">
<div class="imagen"></div>  
    <div class="app"> 
        <h1 class="nombre-pagina">Añadir Usuario</h1>
        <p class="descripcion-pagina">Agrega un nuevo miembro a nuestro equipo</p>
        
        <?php
            include_once __DIR__ . '/../templates/barra.php';
            include_once __DIR__ . '/../templates/alertas.php';
        ?>

        <form action="/admin/nuevoUsuario" method="POST" class="formulario">
            <?php include_once __DIR__ . '/formularioAddUser.php'; ?>
            <input type="submit"style="color:#ffff" value="Crear Usuario" class="boton">
        </form>
    </div>  
        
    </div>
</div>
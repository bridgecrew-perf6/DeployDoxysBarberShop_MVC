<div class="campo">
    <label for="nombre">Nombres</label>
    <input type="text" id="nombre" style="color:black" placeholder="Nombre del nuevo miembro" name="nombre" value="<?php echo s($usuario->nombre); ?>" />
</div>

<div class="campo">
    <label for="apellido">Apellidos</label>
    <input type="text" id="apellido" placeholder="Apellidos del nuevo miembro" style="color:black" name="apellido" value="<?php echo s($usuario->apellido); ?>" />
</div>

<div class="campo">
    <label for="email">Correo</label>
    <input type="email" id="email" placeholder="Correo electronico" style="color:black" name="email" value="<?php echo s($usuario->email); ?>" />
</div>

<div class="campo">
    <label for="password">Contraseña</label>
    <input type="password" id="password" placeholder="Contraseña" style="color:black" name="password" />
</div>

<div class="campo">
    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" style="color:black" placeholder="Numero de telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>" />
</div>

<div class="campo">
    <label for="tipoUser">Tipo de usuario</label>
    <select name="tipoUser" id="tipoUser" style="color:black" value="<?php echo $usuario->tipoUser; ?>">
        <option value="2" style="color:black">Administrador</option>
        <option value="1" style="color:black">Barbero</option>
    </select>
</div>
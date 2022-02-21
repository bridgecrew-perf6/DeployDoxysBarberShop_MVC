<div class="contenedor-app">
    <div class="imagen"></div>
    <div class="app">

        <div class="container  border-top border-primary " style="max-width: 500px" id="contenedor-formulario">
            <div class="text-center mb-4" id="titulo-formulario">
                <div class="accionesExit"><a href="/">Regresar</a></div>
                <h2>Contactanos</h2>
                <p class="fs-5">Queremos saber lo que piensas</p>
                <div class="imagenSupport"><a href="/">
                        <span class="glyphicon"></span></a>
                </div>
            </div>
            </br>
            <form method="POST" data-netlify="true" action="#">
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Tu Email" name="email" style="color:black" />
                </div>
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" style="color:black" name="nombre" placeholder="Tu Nombre" />
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" style="color:black" name="telefono" placeholder="Tu Teléfono" />
                </div>
                <div class="campo">
                    <label for="nombre">Mensaje</label>
                    <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                </div>
                <input type="submit" value="Enviar" class="boton">
            </form>

        </div>
        </section>
    </div>
</div>
<br>
<br>
<div class="footer">
            <div class="imgLogo"><a href="/">
                    <span class="glyphicon"></span></a>
            </div>
            <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">Doxys Barber Shop</h5>
                    <p class="small text-muted">Su satisfacción es nuestro objetivo..</p>
                    <p class="small text-muted mb-0">&copy; Copyrights. Todos los derechos reservados 2022.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Navegacion</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/contacto">Contactanos</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Ir rapidamente</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="/login">Iniciar sesion</a></li>
                        <li><a href="/crear-cuenta">About</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Escribenos un comentario</h5>
                    <p class="small text-muted"></p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Comentario" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    </div>
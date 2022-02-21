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
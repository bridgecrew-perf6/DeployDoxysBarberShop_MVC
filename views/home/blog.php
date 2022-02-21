<style>
    * {
        box-sizing: border-box;
    }

    /* Header/Blog Title */
    .header {
        padding: 3px;
        font-size: 4px;
        text-align: center;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
    }

    /* Right column */
    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    /* Fake image */


    /* Add a card effect for articles */
    .card {
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Footer */
    .footer {
        padding: 20px;
        text-align: center;
        background: #ddd;
        margin-top: 20px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {

        .leftcolumn,
        .rightcolumn {
            width: 100%;
            padding: 0;
        }
    }
</style>
</head>

<body class="contenedor-blog">
    <div class="header">
        <h2>BLOG</h2>
    </div>
    <div class="accionesExit"><a href="/">Regresar</a></div>
    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2>BÁLSAMO PARA BARBA</h2>
                <h5>Por Andres, Ene 17, 2022</h5>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/2aXXHCnNBjE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>LOS MEJORES PRODUCTOS PARA HIDRATAR LA BARBA</p>
                <p>El bálsamo para barba es un producto específico para barba que nos proporciona hidratación para mantener nuestra barba sana y cuidada.</p>

                <p>A diferencia del aceite de barba, el bálsamo es un producto con base de aceite pero en formato sólido. Para poder aplicarlo correctamente, tendremos que trabajarlo previamente. ¡Vamos a ver las ventajas y las desventajas que tienen ambos productos!.</p>
            </div>
            <div class="card">
                <h2>CÓMO SE APLICA EL BÁLSAMO PARA BARBA</h2>
                <div class="fakeimg" style="height:400px;">Image</div>
                <p>La forma de aplicar el bálsamo es muy sencilla. Simplemente tenemos que coger una pequeña cantidad de producto y depositarla sobre la palma de la mano.</p>
                <p>Recuerda que, como en el resto de productos de hidratación y fijación, es mejor coger poco producto y, si nos hace falta, volver a coger una segunda vez. Puede dar la sensación de que cogemos poco producto, pero es por estar en formato sólido. Cuando extendamos el bálsamo en nuestras manos veremos cuánto producto hemos utilizado y si necesitamos más.</p>
                <p>Por último, cogemos parte del producto con los dedos y aplicamos el bálsamo de manera descendente desde la piel hasta las puntas de la barba. De esta forma, conseguimos hidratar tanto la piel de nuestra cara, como la totalidad de la barba.</p>
                <p>No debemos olvidarnos de nuestro bigote. Aunque posteriormente apliquemos cera de bigote, también tenemos que hidratarlo exactamente igual que el resto de la barba.</p>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>About Me</h2>
                <div class="fakeimg" style="height:100px;">Image</div>
                <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            </div>
            <div class="card">
                <h3>Popular Post</h3>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div>
            </div>
            <div class="card">
                <h3>Follow Me</h3>
                <p>Some text..</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>
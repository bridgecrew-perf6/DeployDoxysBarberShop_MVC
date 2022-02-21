let paso = 1;
const pasoInicial = 1;
const pasoFinal = 4;

const cita = {
    id: '',
    nombre: '',
    fecha: '',
    horas: [],
    barberos: [],
    servicios: []
};

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion(); // Muestra y oculta las secciones
    tabs(); // Cambia la sección cuando se presionen los tabs
    botonesPaginador(); // Agrega o quita los botones del paginador
    paginaSiguiente(); 
    paginaAnterior();
    
    consultarAPIBarberos(); // Consulta la API en el backend de PHP
    consultarAPIServicios(); // Consulta la API en el backend de PHP
    consultarAPIHoras();

    idCliente();
    nombreCliente(); // Añade el nombre del cliente al objeto de cita
    seleccionarFecha(); // Añade la fecha de la cita en el objeto
    // seleccionarHora(); // Añade la hora de la cita en el objeto

    mostrarResumen(); // Muestra el resumen de la cita
}

function mostrarSeccion() {

    // Ocultar la sección que tenga la clase de mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior) {
        seccionAnterior.classList.remove('mostrar');
    }

    // Seleccionar la sección con el paso...
    const pasoSelector = `#paso-${paso}`;    
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');

    // Quita la clase de actual al tab anterior
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    // Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
}

function tabs() {

    // Agrega y cambia la variable de paso según el tab seleccionado
    const botones = document.querySelectorAll('.tabs button');
    botones.forEach( boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();

            paso = parseInt( e.target.dataset.paso );
            mostrarSeccion();

            botonesPaginador(); 
        });
    });
}

function botonesPaginador() {
    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');
    
    if(paso === 1) {
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    } else if (paso === 4) {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');

        mostrarResumen();
    } else {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion();
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function() {

        if(paso <= pasoInicial) return;
        paso--;
        
        botonesPaginador();
    });
}
function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function() {

        if(paso >= pasoFinal) return;
        paso++;
        
        botonesPaginador();
    });
}

async function consultarAPIBarberos() {

    try {
        const url = 'http://localhost:3000/api/barberos';
        const resultado = await fetch(url);
        const barberos = await resultado.json();
        mostrarBarberos(barberos);
    
    } catch (error) {
        console.log(error);
    }
}


async function consultarAPIServicios() {

    try {
        const url = 'http://localhost:3000/api/servicios';
        const resultado = await fetch(url);
        const servicios = await resultado.json();
        mostrarServicios(servicios);
    
    } catch (error) {
        console.log(error);
    }
}


async function consultarAPIHoras() {
    // alert('Se ha dado clic al botón!');
    try {
        if(cita.barberos[0]['id'] === NULL){
            const url = 'http://localhost:3000/api/horas'; //?empleadoId=' + cita.barberos[0]['id'] + '&fecha=' + cita.fecha;
            console.log(url)
            const resultado = await fetch(url);
            const horas = await resultado.json();
            // console.log(horas)
            mostrarHoras(horas);
        }
    }catch{
        console.log(error);
    }
}


// async function consultarAPIHoras() {

//     try {

//         const url = 'http://localhost:3000/api/horas?empleadoId=' + cita.barberos + '&fecha=' + cita.fecha;
//         console.log(url)
//         const resultado = await fetch(url);
//         const horas = await resultado.json();
//         console.log(horas)
//         mostrarHoras(horas);
//         // const datos = new FormData();
//         // datos.append('fecha', cita.fecha);
//         // datos.append('empleadoId', cita.barberos);
     
//         // const url = 'http://localhost:3000/api/horas';
//         // const resultado = await fetch(url, {
//         //     method: 'POST',
//         //     body: datos
//         // });

//         // const horas = await resultado.json();
//         // console.log(horas);
//         // // mostrarHoras(horas);
    
//     } catch (error) {
//         console.log(error);
//     }
// }

function mostrarBarberos(barberos) {
    barberos.forEach( barbero => {
        const { id, nombre } = barbero;

        const nombreBarbero = document.createElement('P');
        nombreBarbero.classList.add('nombre-barbero');
        nombreBarbero.textContent = nombre;

        const barberoDiv = document.createElement('DIV');
        barberoDiv.classList.add('barbero');
        barberoDiv.dataset.idBarbero = id;
     
        barberoDiv.onclick = function() {
            seleccionarBarbero(barbero);
        };

        barberoDiv.appendChild(nombreBarbero);
    
        document.querySelector('#barberos').appendChild(barberoDiv);

    });
}

function mostrarServicios(servicios) {
    servicios.forEach( servicio => {
        const { id, nombre, precio } = servicio;

        const nombreServicio = document.createElement('P');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `$${precio}`;

        const servicioDiv = document.createElement('DIV');
        servicioDiv.classList.add('servicio');
        servicioDiv.dataset.idServicio = id;
        servicioDiv.onclick = function() {
            seleccionarServicio(servicio);
            
        };

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);

        document.querySelector('#servicios').appendChild(servicioDiv);

    });
}

function mostrarHoras(horas) {

    horas.forEach( hora => {
        const { id, valueHora } = hora;

        const valueHoraElement = document.createElement('P');
        valueHoraElement.classList.add('nombre-hora');
        valueHoraElement.textContent = valueHora;

        const horaDiv = document.createElement('DIV');
        horaDiv.classList.add('hora');
        horaDiv.dataset.idHora = id;
        horaDiv.onclick = function() {
            seleccionarHora(hora);
            
        };

        horaDiv.appendChild(valueHoraElement);

        document.querySelector('#horas').appendChild(horaDiv);

    });
}

let valorHoraAnt = 0;

function seleccionarHora(hora) {
    const { id } = hora;
    const { horas } = cita;

    // Identificar el elemento al que se le da click
    const divHora = document.querySelector(`[data-id-hora="${id}"]`);

    // Comprobar si un servicio ya fue agregado 
    if( horas.some( agregado => agregado.id === id ) ) {
        // Eliminarlo
        cita.horas = horas.filter( agregado => agregado.id !== id );
        divHora.classList.remove('seleccionado');
        
    } else {
        // Agregarlo
        if(cita.horas.length > 0){
            if( horas.some( agregado => agregado.id === valorHoraAnt ) ) {
                // Eliminarlo
                cita.horas = horas.filter( agregado => agregado.id !== valorHoraAnt );
                const divHora = document.querySelector(`[data-id-hora="${valorHoraAnt}"]`);
                divHora.classList.remove('seleccionado');
            }
        }else{
            cita.horas = [...horas, hora];
            divHora.classList.add('seleccionado'); 
            valorHoraAnt = hora.id;
        }
    }   
}

let valorSeleccionadoAnt = 0;

function seleccionarBarbero(barbero) {
    const { id } = barbero;
    const { barberos } = cita;

    // Identificar el elemento al que se le da click
    const divBarbero = document.querySelector(`[data-id-barbero="${id}"]`);

    // Comprobar si un servicio ya fue agregado 
    if( barberos.some( agregado => agregado.id === id ) ) {
        // Eliminarlo
        cita.barberos = barberos.filter( agregado => agregado.id !== id );
        divBarbero.classList.remove('seleccionado');
        
    } else {
        // Agregarlo
        if(cita.barberos.length > 0){
            if( barberos.some( agregado => agregado.id === valorSeleccionadoAnt ) ) {
                // Eliminarlo
                cita.barberos = barberos.filter( agregado => agregado.id !== valorSeleccionadoAnt );
                const divBarbero = document.querySelector(`[data-id-barbero="${valorSeleccionadoAnt}"]`);
                divBarbero.classList.remove('seleccionado');
            }
        }else{
            cita.barberos = [...barberos, barbero];
            divBarbero.classList.add('seleccionado'); 
            valorSeleccionadoAnt = barbero.id;
        }
    }   
}

function seleccionarServicio(servicio) {
    const { id } = servicio;
    const { servicios } = cita;

    // Identificar el elemento al que se le da click
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);

    // Comprobar si un servicio ya fue agregado 
    if( servicios.some( agregado => agregado.id === id ) ) {
        // Eliminarlo
        cita.servicios = servicios.filter( agregado => agregado.id !== id );
        divServicio.classList.remove('seleccionado');
    } else {
        // Agregarlo
        cita.servicios = [...servicios, servicio];
        divServicio.classList.add('seleccionado');
    }
}

function idCliente() {
    cita.id = document.querySelector('#id').value;
}
function nombreCliente() {
    cita.nombre = document.querySelector('#nombre').value;
}

function seleccionarFecha() {
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e) {

        const dia = new Date(e.target.value).getUTCDay();

        if( [6, 0].includes(dia) ) {
            e.target.value = '';
            mostrarAlerta('Fines de semana no permitidos', 'error', '.formulario');
        } else {
            cita.fecha = e.target.value;
        }
        
    });
}

// function seleccionarHora() {
//     const inputHora = document.querySelector('#hora');
//     inputHora.addEventListener('input', function(e) {
//         const horaCita = e.target.value;
//         const hora = horaCita.split(":")[0];
//         if(hora < 10 || hora > 21) {
//             e.target.value = '';
//             mostrarAlerta('Hora No Válida', 'error', '.formulario');
//         } else {
//             cita.hora = e.target.value;
//         }
//     });
// }

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {

    // Previene que se generen más de 1 alerta
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia) {
        alertaPrevia.remove();
    }

    // Scripting para crear la alerta
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece) {
        // Eliminar la alerta
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
  
}


function mostrarResumen() {
    const resumen = document.querySelector('.contenido-resumen');

    // Limpiar el Contenido de Resumen
    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }

    if(Object.values(cita).includes('') || cita.servicios.length === 0 ) {
        mostrarAlerta('Faltan datos de Servicios, Fecha u Hora', 'error', '.contenido-resumen', false);

        return;
    } 

    // Formatear el div de resumen
    const { nombre, fecha, horas, servicios, barberos} = cita;

    // Heading para Servicios en Resumen
    const headingServicios = document.createElement('H3');
    headingServicios.textContent = 'Resumen de Servicios';
    resumen.appendChild(headingServicios);

    // Iterando y mostrando los servicios
    servicios.forEach(servicio => {
        const { id, precio, nombre } = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>Precio:</span> $${precio}`;

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        resumen.appendChild(contenedorServicio);
    });

    // Heading para Cita en Resumen
    const headingCita = document.createElement('H3');
    headingCita.textContent = 'Resumen de Cita';
    resumen.appendChild(headingCita);
    
    barberos.forEach(barbero => {
        const { id, nombre, apellido } = barbero;

        const contenedorBarbero = document.createElement('DIV');
        contenedorBarbero.classList.add('contenedor-barbero');

        const nombreBarbero = document.createElement('P');
        nombreBarbero.innerHTML = `<span>Barbero:</span> ${nombre} ${apellido}`;

        contenedorBarbero.appendChild(nombreBarbero);
        
        resumen.appendChild(contenedorBarbero);
    });

    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre Cliente:</span> ${nombre}`;

    // Formatear la fecha en español
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2;
    const year = fechaObj.getFullYear();

    const fechaUTC = new Date( Date.UTC(year, mes, dia));
    
    const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    const fechaFormateada = fechaUTC.toLocaleDateString('es-CO', opciones);

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha:</span> ${fechaFormateada}`;

    // const horaCita = document.createElement('P');
    // horaCita.innerHTML = `<span>Hora:</span> ${hora} Horas`;

    // Boton para Crear una cita
    const botonReservar = document.createElement('BUTTON');
    botonReservar.classList.add('boton');
    botonReservar.textContent = 'Reservar Cita';
    botonReservar.onclick = reservarCita;

    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    // resumen.appendChild(horaCita);
    resumen.appendChild(botonReservar);
}

async function reservarCita() {
    
    const { nombre, fecha, horas, servicios, barberos, id } = cita;
    const idServicios = servicios.map( servicio => servicio.id );
    const idBarberos = barberos.map( barbero => barbero.id );
    const datos = new FormData();
    
    datos.append('fecha', fecha);
    datos.append('hora', horas);
    datos.append('usuarioId', id);
    datos.append('servicios', idServicios);
    datos.append('empleadoId', idBarberos);

    console.log([...datos]);

    try {
        // Petición hacia la api
        const url = 'http://localhost:3000/api/citas';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        if(resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Cita Creada',
                text: 'Tu cita fue creada correctamente',
                button: 'OK'
            }).then( () => {
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            });
        }
    } catch (error) {
        console.log(error)
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al guardar la cita'
        });
    }
}
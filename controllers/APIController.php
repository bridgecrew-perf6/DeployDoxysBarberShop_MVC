<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;
use Model\Empleado;
use Model\Horas;

class APIController {
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function barberos() {
        $barberos = Empleado::all();
        echo json_encode($barberos);
    }

    public static function horas() {
        $empleadoId = s($_GET['empleadoId']);
        $fecha = s($_GET['fecha']);
        
        $horaCitasBarbero = Cita::HoraCitas($empleadoId, $fecha);
        $asignadas = array();
        foreach($horaCitasBarbero as $hora) {
            $encode = json_encode($hora);
            $data = json_decode($encode);
            $horasAsignadas = $data->hora;
            array_push($asignadas,  $horasAsignadas);
        }
        
        $valueHorasDispo = Horas::HoraCitasSinAsignar($asignadas);
        echo json_encode($valueHorasDispo);
    }

    public static function guardar() {
        
        $respuesta = [
            'datos' => $_POST
        ];
       // echo json_encode(['resultado1' => $respuesta]);

        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        

        $id = $resultado['id'];
        // Almacena la Cita y el Servicio

        // Almacena los Servicios con el ID de la Cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
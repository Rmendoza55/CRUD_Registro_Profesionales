<?php

    require_once "../controller/controlador_profesionales.php";
    require_once "../model/profesionales.modelo.php";

    class ajaxProfesionales{

        public $id;
        public $profesionales;
        public $dni;
        public $colegiatura;
        public $rne;
        public $fecha;

        public function MostrarProfesionales(){
            $respuesta = ControladorProfesionales::ctrMostrarControlador();

            echo json_encode($respuesta);
        }
        public function registrarProfesionales(){

            $respuesta = ControladorProfesionales::ctrRegistrarProfesionales($this->profesionales, $this->dni, $this->colegiatura, $this->rne,$this->fecha);

            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

        }
        public function actualizarProfesionales(){

            $respuesta = ControladorProfesionales::ctrActualizarProfesionales($this->id,$this->profesionales, $this->dni, $this->colegiatura, $this->rne,$this->fecha);

            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

        }
        public function eliminarProfesionales(){

            $respuesta = ControladorProfesionales::ctrEliminarProfesionales($this->id);

            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

        }

    }
    if (!isset($_POST["accion"])){
        $respuesta =  new ajaxProfesionales();
        $respuesta -> MostrarProfesionales();
    }else{
        if($_POST["accion"]=="registrar"){

            $insertar = new ajaxProfesionales();

            $insertar->profesionales = $_POST["profesionales"];
            $insertar->dni = $_POST["dni"];
            $insertar->colegiatura = $_POST["colegiatura"];
            $insertar->rne = $_POST["rne"];
            $insertar->fecha = $_POST["fecha"];

            $insertar->registrarProfesionales();
        }
        if($_POST["accion"]=="actualizar"){

            $actualizar = new ajaxProfesionales();

            $actualizar->id=$_POST["id"];
            $actualizar->profesionales = $_POST["profesionales"];
            $actualizar->dni = $_POST["dni"];
            $actualizar->colegiatura = $_POST["colegiatura"];
            $actualizar->rne = $_POST["rne"];
            $actualizar->fecha = $_POST["fecha"];

            $actualizar->actualizarProfesionales();
        }
        if($_POST["accion"]=="eliminar"){
            
            $eliminar = new ajaxProfesionales();

            $eliminar->id=$_POST["id"];

            $eliminar-> eliminarProfesionales();
        }
    }

?>
<?php

    class ControladorProfesionales{

        static public function ctrMostrarControlador(){

            $respuesta = ProfesionalesModelo::mdlMostrarProfesionales();

            return $respuesta;
        }

        static public function ctrRegistrarProfesionales($profesionales,$dni,$colegiatura,$rne,$fecha){

            $respuesta=ProfesionalesModelo::mdlRegistrarProfesionales($profesionales,$dni,$colegiatura,$rne,$fecha);

            return $respuesta;

        }

        static public function ctrActualizarProfesionales($id,$profesionales,$dni,$colegiatura,$rne,$fecha){

            $respuesta=ProfesionalesModelo::mdlActualizarProfesionales($id,$profesionales,$dni,$colegiatura,$rne,$fecha);

            return $respuesta;

        }

        static public function ctrEliminarProfesionales($id){

            $respuesta = ProfesionalesModelo::mdlEliminarProfesionales($id);
    
            return $respuesta;
        }
    }

?>
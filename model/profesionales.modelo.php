<?php

    require_once "coneccion.php";

    class ProfesionalesModelo{

        static public function mdlMostrarProfesionales(){

            $stmt = Coneccion::conectar()-> prepare("SELECT id_profesionales,nombre_apellidos,dni,colegiatura,rne,fecha,'X' as acciones FROM  profesionales");
            $stmt -> execute();
             return $stmt -> fetchAll();
             $stmt = null;
        }

        static public function mdlRegistrarProfesionales($profesionales,$dni,$colegiatura,$rne,$fecha){

            $stmt = Coneccion::conectar()->prepare("INSERT INTO profesionales(nombre_apellidos,dni,colegiatura,rne,fecha) VALUES (:nombre_apellidos,:dni,:colegiatura,:rne,:fecha)");

            $stmt -> bindParam(":nombre_apellidos",$profesionales,PDO::PARAM_STR);
            $stmt -> bindParam(":dni",$dni,PDO::PARAM_STR);
            $stmt -> bindParam(":colegiatura",$colegiatura,PDO::PARAM_STR);
            $stmt -> bindParam(":rne",$rne,PDO::PARAM_STR);
            $stmt -> bindParam(":fecha",$fecha,PDO::PARAM_STR);

            if($stmt-> execute()){
                return "El Profesional se Registro Correctamente";
            } else{
                return "Error, no se pudo Registrar el Profesional";
            }

            $stmt = null;
        }

        static public function mdlActualizarProfesionales($id,$profesionales,$dni,$colegiatura,$rne,$fecha){

            $stmt = Coneccion::conectar()->prepare("UPDATE profesionales
                                                   SET nombre_apellidos = :nombre_apellidos,
                                                          dni = :dni,
                                                       colegiatura = :colegiatura,
                                                       rne = :rne,
                                                       fecha = :fecha
                                                   WHERE id_profesionales = :id_profesionales");
    
            $stmt -> bindParam(":id_profesionales", $id, PDO::PARAM_INT);
            $stmt -> bindParam(":nombre_apellidos", $profesionales, PDO::PARAM_STR);
            $stmt -> bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt -> bindParam(":colegiatura", $colegiatura, PDO::PARAM_STR);
            $stmt -> bindParam(":rne", $rne, PDO::PARAM_STR);
            $stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
    
            if($stmt -> execute()){
                return "El Profesional se Actualizo Correctamente";
            } else{
                return "Error, no se pudo Actualizar el Profesional";
            }

            $stmt = null;
        }
        static public function mdlEliminarProfesionales($id){

            $stmt = Coneccion::conectar()->prepare("DELETE FROM profesionales WHERE id_profesionales = :id_profesionales");
    
            $stmt -> bindParam(":id_profesionales", $id, PDO::PARAM_INT);
    
            if($stmt -> execute()){
                return "El Profesional se Elimino Correctamente";
            } else{
                return "Error, no se pudo Eliminar el Profesional";
            }

            $stmt = null;
    
        }
    }

?>
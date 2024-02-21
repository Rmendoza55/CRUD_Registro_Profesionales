<!--Seccion de la Parte de Arriba del Modulo Categorias-->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrador de Profesionales</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Gestor de Profesionales</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--CONTENIDO DE TABLA CATEGORIAS-->
<section class="content">

    
    <div class="container-fluid">

        <!--Boton de Agregar-->
        <div class="btn-agregar-profesionales btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-gestionar-profesionales" data-dismiss="modal">
                <i class="fas fa-plus-square"></i>  Agregar Categoria
            </button>
        </div>

         <!--Tabla de Categorias-->
        <table id="tablaProfesionales" class="table table-striped table-bordered nowrap" style="width: 100%;">
            <thead class="bg-info">
                <tr>
                <td style="width: 5%;">Id</td>
                <td>Nombres y Apellidos</td>
                <td>DNI</td>
                <td style="width: 15%;">Colegiatura</td>
                <td style="width: 10%;">RNE</td>
                <td style="width: 10%;">Fecha de Inscripcion</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</section>
<!--- FORMULARIO EN MODAL PARA REGISTRO Y ACTUALIZACION DE CATEGORIAS ---->
<div class="modal fade" id="modal-gestionar-profesionales">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- CABECERA DEL MODAL -->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Agregar Profesionales</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--CUERPO DEL MODAL-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" id="idProfesional" name="profesionales" value="">
                            <label for="txtProfesionales">Profesional</label>
                            <input type="text" class="form-control" name="profesionales" id="txtProfesionales" placeholder="Ingrese el Nombre del Profesional">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtDNI">DNI</label>
                            <input type="number" class="form-control" name="dni" id="txtDNI" placeholder="Ingrese el DNI">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtColegiatura">Colegiatura</label>
                            <input type="number" class="form-control" name="colegiatura" id="txtColegiatura" placeholder="Ingrese el N° de Colegiatura">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtRNE">RNE</label>
                            <input type="text" class="form-control" name="rne" id="txtRNE" placeholder="Ingrese el N° de RNE">
                        </div>
                    </div>
                </div>
            </div>

            <!--PIES DEL MODAL-->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!--Integracion de Java script para el uso de los archivos HTML-->
<script>

    //Documento Principal que conectara el ajax con el Java script
    $(document).ready(function(){
        
        //Variable de Accion que indicara la salida de los metodos del ajax
        var accion = "";

        //Variable que Mostrar las Alertas de Swet Alert
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
       
        //Variable que hara funciones de la Tabla Categorias
        var table = $("#tablaProfesionales").DataTable({

            //Metodo para Mostrar Los datos de la Tabla Categorias del ajax
  			"ajax":{
				"url": "ajax/profesionales.ajx.php",
				"type":"POST",
				"dataSrc":""
			},

            //Metodos de Especificaciones de la Columnas de la Tabla Categoria
            "columnDefs":[ 
	            	/*{
                        //Columna de Estados
	            		"targets": 4,
	            		"sortable": false,
	            		"render": function (data, type, full, meta){

	            			if(data == 1){
								return "<div class='bg-primary color-palette text-center'>ACTIVO</div> " 
	            			}else{
								return "<div class='bg-danger color-palette text-center'>INACTIVO</div> " 
	            			}
	            			
	            		}
	            	},*/
            		{
                        //Columna de Acciones
	            		"targets": 6,
	            		"sortable": false,
	            		"render": function (data, type, full, meta){
	            			return "<center>" +
	                                    "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-profesionales'> " +
	            						  "<i class='fas fa-pencil-alt'></i> " +
	            					    "</button> " + 
	            					    "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " +
	            						  "<i class='fas fa-trash'> </i> " +
	            					    "</button>" +
	                                "</center>";
	                    }
            		}
            	],
                //Salida del resto de Columnas
                "columns":[
                    {"data": "id_profesionales"},
                    {"data": "nombre_apellidos"},
                    {"data": "dni"},
                    {"data": "colegiatura"},
                    {"data": "rne"},
                    {"data": "fecha"},
                    {"data": "acciones"}
                ],

                //Cambio de Lenguaje a la Tabla
                "language":{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "1": "Mostrar 1 fila",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "1": "%d fila seleccionada",
                        "_": "%d filas seleccionadas",
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "$d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },
        });

        //Funcion de Agregar Nuevas Categorias
        $(".btn-agregar-profesionales").on('click',function(){
            accion = "registrar";
        });
        
        //Funcion al precionar el Boton Eliminar usando alertas
        $('#tablaProfesionales tbody').on('click','.btnEliminar',function(){
            var data = table.row($(this).parents('tr')).data();
            
            var id = data["id_profesionales"];

            var datos = new FormData();
            datos.append('accion',"eliminar")
            datos.append('id',id);

            swal.fire({

                title: "¡CONFIRMACION!",
                text: "Seguro que desea eliminar el Profesional?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí, Eliminar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if(resultado.value)  {                    

                    //LLAMADO AJAX
                    $.ajax({
                        url: "ajax/profesionales.ajx.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){

                            console.log(respuesta);
                        
                            table.ajax.reload( null, false );                            

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            });
                        
                        }
                    })
                }
                else{
                    // alert("no se modifico la categoria");
                }

            })
        });

        //Funcion de Utilizacion del Boton Editar
        $('#tablaProfesionales tbody').on('click','.btnEditar',function(){
            
            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";

            $("#idProfesional").val(data["id_profesionales"])
            $("#txtProfesionales").val(data["nombre_apellidos"]);
            $("#txtDNI").val(data["dni"]);
            $("#txtColegiatura").val(data["colegiatura"]);
            $("#txtRNE").val(data["rne"]);
            $("#txtFecha").val(data["fecha"]);
            
        });

        // GUARDAR LA INFORMACION DE CATEGORIA DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click',function(){

            var id = $("#idProfesional").val(),
                profesionales = $("#txtProfesionales").val(),
                dni = $("#txtDNI").val(),
                colegiatura = $("#txtColegiatura").val(),
                rne=$("#txtRNE").val(),
                fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');

            var datos = new FormData();

            datos.append('id',id)
            datos.append('profesionales',profesionales)
            datos.append('dni',dni);
            datos.append('colegiatura',colegiatura);
            datos.append('rne',rne);
            datos.append('fecha',fecha);
            datos.append('accion',accion);

            swal.fire({
                
                title: "¡CONFIRMAR!",
                text: "¿Está seguro que desea registrar El Profesional?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if(resultado.value)  {

                    $.ajax({
                        url: "ajax/profesionales.ajx.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){

                            console.log(respuesta);

                            $("#modal-gestionar-profesionales").modal('hide');
                
                            table.ajax.reload(null,false);

                            $("#idProfesional").val("");
                            $("#txtProfesionales").val("");
                            $("#txtDNI").val("");
                            $("#txtColegiatura").val("");
                            $("#txtRNE").val("");
                            $("#txtFecha").val("");

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                        }
                    });
                }
                else{

                }

            })
    
        })
    });

</script>
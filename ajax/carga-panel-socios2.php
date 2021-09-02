
      <div class="card mb-3">
        <div class="card-header">
          <div class="btn-group pull-right">
            <div>
              
              <a href="alumno.php" class="btn btn-outline-primary" title="Cargar nuevo socio"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar Alumno </a>  
  
            </div>

          </div>
          <i class="fa fa-table"></i> Alumnos
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="dataTablesocios" name="dataTablesocios" width="100%" cellpadding="0" >

              <thead class="bg-primary">
                <tr>
                  <th>DNI</th>
                  <th>Curso</th>
                  <th>Apellidos</th>
                  <th>Nombres</th>
                  <th>Teléfono</th>
                  <th style="text-align: center;">Acciones</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require_once("../include/funciones.php");
                  require_once("../conexion.php");
                  $sql_cli="select dni,curso,apellidos,nombres,telefono from alumnos";
                  $res_cli=mysqli_query($link,$sql_cli);

                  while ($reg_cli=mysqli_fetch_array($res_cli))
                                {
                ?>

                  <tr class="odd gradeX">
                      <td><a href="modif_socios.php?dni=<?php echo $reg_cli["dni"]; ?>"><?php echo $reg_cli["dni"];?>  </a></td>
                      <td><?php echo $reg_cli["curso"];?></td>
                      <td><?php echo $reg_cli["apellidos"];?></td>
                      <td><?php echo $reg_cli["nombres"];?></td>
                      <td><?php echo $reg_cli["telefono"];?></td>
                      <td style="text-align: center;">  
                      <a href="op.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-dark btn-sm" title="Generar Orden de Pago"><i class="fa fa-money" aria-hidden="true"></i> </a>
                      
                       <!-- <a href="modif_socios.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-success btn-sm" title="Modificar datos del Socio"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> -->  

                      <a href="pagos_socio.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-primary btn-sm" title="Consulta de Pagos"><i class="fa fa-history" aria-hidden="true"></i></a> 
                
                      <!-- <a href="socio_actividad.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-info btn-sm" title="Actutalizar y Visualizar actividades"><i class="fa fa-futbol-o" aria-hidden="true"></i></a>  -->
                      </td>

                  </tr>

                <?php
                                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><!-- aca va lo que quiero --></div>
      </div>
      <script type="text/javascript">
        
        $('#dataTablesocios').DataTable({
            language:{
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                        },
            responsive: true
        }); 
    
      </script>
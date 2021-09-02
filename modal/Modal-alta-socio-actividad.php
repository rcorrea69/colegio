  <?php
     require_once("conexion.php");  

    $sqlhoy="SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";

    $resul=mysqli_query($link, $sqlhoy);
    $hoyfila=mysqli_fetch_array($resul);

    $hoy=$hoyfila['hoy'];


     $sqlactividad="SELECT * FROM actividades "; 
     $resact=mysqli_query($link, $sqlactividad );  






   ?> 




<div class="modal" tabindex="-1" role="dialog" id="Modal-alta-socio-actividad" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dar de Alta en una nueva Actividad </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cierre">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

           <form  method="post" id="guardar_socio_actividad" name="guardar_socio_actividad"> 
            <div id="resultados_ajax"></div> 

              <div class="form-group input-group-sm row">
                  <label for="falta" class="control-label col-4">Fecha </label>
                  <input type="text" class="form-control col-7" id="falta" name="falta" placeholder="dd/mm/aaaa" value="<?php echo $hoy;   ?>"  >
              </div>       

              <div class="form-group input-group-sm row">    
                                        
                          <label for="actividad" class="control-label col-4">Actividad</label>        

                          <select name="actividad" size="1" id="actividad" class="form-control col-7"> 

                              <?php while ($fila1=mysqli_fetch_assoc($resact)){ ?>
                                  <?php if($id_actividad==1){?>
                                      <option value="<?php echo $fila1['id_actividad']?>"><?php echo $fila1['ac_nombre']?></option>
                                            <?php }
                                       else {?>
                                            <option <?php if($fila1["id_actividad"]==1){echo "selected ";}?>value="<?php echo $fila1["id_actividad"];?>"><?php echo $fila1["ac_nombre"];?></option>
                                            <?php }?>
                              <?php }?>
                            </select>

              </div>
              
             


      </div>
      <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_datos">Grabar</button>
           </form>
      </div>
    </div>
  </div>
</div>


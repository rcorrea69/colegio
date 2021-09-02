  <?php
     require_once("conexion.php");  


     $sql="SELECT * FROM tipo_usuario"; 
     $resusu=mysqli_query($link, $sql );  

   ?> 




<div class="modal" tabindex="-1" role="dialog" id="Modal-alta-usuario" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cierre">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

           <form  method="post" id="guardar_usuario" name="guardar_usuario" autocomplete="off"> 
            <div id="resultados_ajax"></div> 

              <div class="form-group input-group-sm row">    
                  <label for="nombres" class="control-label col-4">Nombre Completo</label>          
                  <input type="text" class="form-control col-7" name="nombres" id="nombres" placeholder="Apellidos y Nombres" style="text-align: right;" />
              </div>

              <div class="form-group input-group-sm row">    
                  <label for="usuario" class="control-label col-4">Usuario</label>          
                  <input type="text" class="form-control col-7" name="usuario" id="usuario" placeholder="Usuario" style="text-align: right;" />
              </div>


              <div class="form-group input-group-sm row">    
                  <label for="clave" class="control-label col-4">Clave</label>          
                  <input type="text" class="form-control col-7" name="clave" id="clave" placeholder="Clave" style="text-align: right;" />
              </div>

              <div class="form-group input-group-sm row">    
                                        
                          <label for="tipo" class="control-label col-4">Tipo de Usuario</label>        

                          <select name="tipo" size="1" id="tipo" class="form-control col-7"> 

                              <?php while ($fila1=mysqli_fetch_assoc($resusu)){ ?>
                                  <?php if($fila1['id_usu_tipo']==1){?>
                                      <option value="<?php echo $fila1['id_usu_tipo']?>"><?php echo $fila1['tipo_nombre']?></option>
                                            <?php }
                                       else {?>
                                            <option <?php if($fila1["id_usu_tipo"]==2){echo "selected ";}?>value="<?php echo $fila1["id_usu_tipo"];?>"><?php echo $fila1["tipo_nombre"];?></option>
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


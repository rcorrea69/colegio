
<div class="modal" tabindex="-1" role="dialog" id="Modal-modif-usuario" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cierre">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

           <form  method="post" id="modif_usuario" name="modif_usuario" autocomplete="off"> 
            <div id="resultados_ajax_modif"></div> 

              <div class="form-group input-group-sm row">    
                  <label for="usuario-modif" class="control-label col-3">id</label>          
                  <input type="text" class="form-control col-8" name="usuario-modif" id="usuario-modif" readonly="readonly"/>
              </div>

              <div class="form-group input-group-sm row">    
                  <label for="nombre-modif" class="control-label col-3">Nombre</label>          
                  <input type="text" class="form-control col-8" name="nombre-modif" id="nombre-modif" />
              </div>

              <div class="form-group input-group-sm row">    
                  <label for="usu-modif" class="control-label col-3">Usuario</label>          
                  <input type="text" class="form-control col-8" name="usu-modif" id="usu-modif" />
              </div>

              <div class="form-group input-group-sm row">    
                  <label for="clave-modif" class="control-label col-3">Clave</label>          
                  <input type="text" class="form-control col-8" name="clave-modif" id="clave-modif" />
              </div>

<!--               <div class="form-group input-group-sm row">    
                  <label for="nivel-modif" class="control-label col-3">Tipo Usuario</label>          
                  <input type="text" class="form-control col-8" name="nivel-modif" id="nivel-modif" />
              </div> -->
              
              <?php
                $sqlactividad="SELECT * FROM tipo_usuario "; 
                $resact=mysqli_query($link, $sqlactividad ); 


              ?>

              <div class="form-group input-group-sm row">    
                                        
                          <label for="nivel-modif" class="control-label col-3">Tipo Usuario</label>        

                          <select name="nivel-modif" size="1" id="nivel-modif" class="form-control col-8"> 
                              <?php while ($fila1=mysqli_fetch_assoc($resact)){ ?>
                                  <option value="<?php echo $fila1['id_usu_tipo']?>"><?php echo $fila1['tipo_nombre']?></option>
                              <?php }?>
                          </select>


              </div>


          



      </div>
      <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="modificar_codigo">Grabar Modificación</button>
           </form>
      </div>
    </div>
  </div>
</div>
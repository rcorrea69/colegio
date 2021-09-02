  <?php
     require_once("conexion.php");  


   ?> 




<div class="modal" tabindex="-1" role="dialog" id="Modal-modif-codigo" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar Códigos de Cobranzas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cierre">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form  method="post" id="modif_codigo" name="modif_codigo"> 
            <div id="resultados_ajax_modif"></div> 
              <div class="form-group input-group-sm row">    
                  <label for="modif_codigo" class="control-label col-3">Código</label>          
                  <input type="text" class="form-control col-8" name="codigo-modif" id="codigo-modif" placeholder="Código" style="text-align: right;" />
              </div>

              <div class="form-group input-group-sm row">    
                  <label for="descripcion-modif" class="control-label col-3">Descripción</label>          
                  <input type="text" class="form-control col-8" name="descripcion-modif" id="descripcion-modif" placeholder="Descripcion" style="text-align: right;" />
              </div>    
              
              <div class="form-group input-group-sm row">    
                          <label for="importe-modif" class="control-label col-3">Importe</label>          
                          <input type="text" class="form-control col-8" name="importe-modif" id="importe-modif" placeholder="" style="text-align: right;" />
                          <div class="input-group-append">
                            <span class="input-group-text  ">$</span>
                          </div>
                          
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
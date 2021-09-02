  <?php
    require_once("conexion.php");  

  ?> 




<div class="modal" tabindex="-1" role="dialog" id="Modal-alta-codigo" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Códigos de Cobranzas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cierre">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  method="post" id="guardar_actividad" name="guardar_actividad"> 
            <div id="resultados_ajax"></div> 

              <div class="form-group input-group-sm row">    
                  <label for="codigo" class="control-label col-3">Código</label>          
                  <input type="text" class="form-control col-8" name="codigo" id="codigo" placeholder="Código" style="text-align: right;" />
              </div>
              <div class="form-group input-group-sm row">    
                  <label for="descripcion" class="control-label col-3">Descripción</label>          
                  <input type="text" class="form-control col-8" name="descripcion" id="descripcion" placeholder="Descripcion" style="text-align: right;" />
              </div>              
              <div class="form-group input-group-sm row">    
                          <label for="importe" class="control-label col-3">Importe</label>          
                          <input type="text" class="form-control col-8" name="importe" id="importe" placeholder="" style="text-align: right;" />
                          <div class="input-group-append">
                            <span class="input-group-text  ">$</span>
                          </div>
                          
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
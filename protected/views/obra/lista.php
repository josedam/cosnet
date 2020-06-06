

<div class="container">
  <div class='row'>
    <div class='span4' id='pane-os'>
    <h3>Obras Sociales</h3>

      <?php $this->renderPartial('_listaestado',array('model'=>$model, 'estado'=>1)) ?>
    </div>
    
    <div class='span8' >
      <h3>Aranceles</h3>
    
      <div id='pane-arn'>
      <h4>Selecciona una Obra Social en la lista</h4><h3>&#8592;</h3>
      </div> 
    </div>
  </div>
</div>


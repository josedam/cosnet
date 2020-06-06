<?php
/* @var $this DevolucionController */
/* @var $data Devolucion */
?>

<div class="view">

  <div width="100%">
  
  <table>
<tr>
<td>
	<b><?php echo CHtml::encode($data->getAttributeLabel('paciente')); ?>:</b>
</td>
<td>
		<?php echo CHtml::encode($data->paciente); ?>
</td>
</tr>



  	<tr>
  		<td>
			<b><?php echo CHtml::encode($data->getAttributeLabel('ffac')); ?>:</b>
  		</td>
  		<td>
  			<?php echo CHtml::encode(substr($data->ffac,3,7)); ?>
  		</td>
   	</tr>
  	
  <tr>
	<td>
		<b><?php echo CHtml::encode($data->getAttributeLabel('cos')); ?>:</b>
	</td>
	<td>
		<?php echo CHtml::encode($data->obra->nombre); ?>
	</td>
	
  </tr>



<tr>
  <td>
  	<b><?php echo CHtml::encode($data->getAttributeLabel('nlote')); ?>:</b>
  </td>
  <td>
	<?php echo CHtml::encode($data->nlote); ?>
  </td>
</tr>

<tr>
	<td>
	<b><?php echo CHtml::encode($data->getAttributeLabel('practicas')); ?>:</b>
	</td>
	<td>
	<?php echo CHtml::encode($data->practicas); ?>
	</td>
</tr>

<tr>
	<td>
	<b><?php echo CHtml::encode($data->getAttributeLabel('cmotivo')); ?>:</b>
	</td>
	<td>
	<?php echo CHtml::encode($data->cmotivo); ?>
	</td>
</tr>

<tr>
	<td>
	<b><?php echo CHtml::encode($data->getAttributeLabel('obse')); ?>:</b>
	</td>
	<td>
	<?php echo CHtml::encode($data->obse); ?>
	</td>
</tr>

  </table>
  </div>
	
</div>
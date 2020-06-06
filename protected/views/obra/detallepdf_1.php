<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<style>
</style>

<body>

<b><?php echo $model['Nombre']; ?></b><br>
<?php if($model['Denom']): ?>
  <i><?php echo $model['Denom']; ?></i><br>
<?php endif; ?>    
<?php if($model['Gerencia']): ?>
  Gerenciada por <i><?php echo $model['Gerencia'] ?></i><br>
<?php endif; ?>  


<?php 
  $fa = '';
  foreach($model['Arancel'] as $a => $v):
    if($v['FArn']){
      $fa = $v['FArn'];
      break;
    }
  endforeach;      
?>

<b>Fecha de Arancel <?php echo $fa ?> </b><br><br>

  <table width="100%">
  <tr>
   <th width="10%"><div>Codigo</div></th>
   <th width="66%"><div>Denominacion</div></th>
   <th width="12%"><div align="right">Importe</div></th>
   <th width="12%"><div align="right">Coseguro</div></th>
  <?php /* <th><div >F.Arancel</div></th> */ ?>
  </tr> 

  <?php foreach($model['Arancel'] as $a => $v): ?>
    <?php if($v['Valor']!=0):?>
      <tr>
       <td width="10%"><?php echo $v['CPrac'] ?></td>
       <td width="66%"><?php echo $v['Deno'] ?></td>
       <td width="12%"><div align="right"><?php echo $v['Valor']==0?'':$v['Valor'] ?></div></td>
       <td width="12%"><div align="right"><?php echo $v['Coseg']==0?'':$v['Coseg'] ?></div></td>
     <?php /*  <td><?php echo $v['FArn'] ?></td> */?>
      </tr>
    <?php endif;?> 
  <?php endforeach; ?>     
  </table> 

</body>
</html>

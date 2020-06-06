<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    < link rel="stylesheet" type="text/css" href="css/screen.css" media="screen, projection" />
    < link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<style>
.titulo {
  border:1px solid black;
  padding:10px;
}
</style>

<style>
th {
    border-bottom: 1px solid black;
    padding-left:20px;
}
</style>

<body style="font-size:10;">

<div >
<h3><?php echo $obra->nombre; ?></h3>

<?php if($obra->razon): ?>
  <i><?php echo $obra->razon; ?></i><br>
<?php endif; ?>    

<?php if($obra->gerencia): ?>
  Gerenciada por <i><?php echo $obra->gerencia ?></i><br>
<?php endif; ?>  

<?php 
$fa = $farn->fprac;
?>
</div>
<b>Vigencia <?php echo $fa ?> </b><br><br>
<?php if($obra->tcoseg==2): ?>
    <div >
    <h4>Coseguro en consultorio</h4>
    </div>
<?php endif; ?>


  <table width="100%">
  <tr>
   <th width="10%"><div align="left" >Codigo</div></th>
   <th width="54%"><div align="left" >Denominacion</div></th>
   <th width="12%"><div align="right">Importe</div></th>
   <th width="12%"><div align="right">Coseguro</div></th>
   <?php if ($obra->tcoseg==2): ?>
      <th width="12%"><div align="right">Total</div></th>
   <?php endif; ?>
  </tr> 

  <?php foreach($nomen as $a => $v): ?>
    <?php $arn = $v->arancel($fa);?>
    <?php if($arn->valor!=0):?>

        <tr>
         <td width="10%"><?php echo $v->edCPrac(); ?></td>
         <td width="54%"><?php echo $v->deno;  ?></td>
         <td width="12%"><div align="right"><?php echo number_format($arn->valor,2); ?></div></td>
         <td width="12%"><div align="right"><?php echo $arn->coseg==0?'':number_format($arn->coseg,2);?></div></td>
         <?php if($obra->tcoseg==2): ?>
           <td width="12%"><div align="right"><?php echo number_format($arn->coseg + $arn->valor,2);?></div></td>
         <?php endif; ?>
        </tr>

    <?php endif;?> 
  <?php endforeach; ?>     
  </table> 

</body>
</html>

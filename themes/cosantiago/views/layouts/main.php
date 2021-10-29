<?php
header('Content-Type: text/html; charset=utf-8'); //esto es para los acentos
?>
<!DOCTYPE html>
<html>
  <head>
    <title>C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="circulo odontologico santiague&ntilde;o, odontologo, odontologos, odontologia, santiago del estero, dentista, diente, arreglo, insumos">
    <meta name="description" content="P&aacute;gina oficial del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o. Actualidad, socios, cursos e insumos.">
    <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/icono-iphone.png">
    <meta name="image" content="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/favicon.png">
    <meta property="og:url" content="http://www.cosantiago.com.ar">
    <meta property="og:title" content="Toda la actualidad del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o.">
    <meta property="og:type" content="Website">
    <meta property="og:image" content="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/favicon.png">
    <meta property="og:description" content="P&aacute;gina oficial del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o. Actualidad, socios, cursos e insumos.">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cos.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/slider.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/all.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <script defer src="<?php echo Yii::app()->theme->baseUrl; ?>/js/all.js"></script> 
  </head>
  <body>
  
 <!-- Main menu -->
 <header>
  <div id="user-nav">
    <div class="container">
      <div class="row">
        <div class="span6 offset6">
          <div class="pull-right">
           <?php echo CHtml::link('<i class="icon-home icon-white"></i> Inicio','http://www.cosantiago.com.ar');?>
           
           <?php if(Yii::app()->user->isGuest):?>
             <?php echo Chtml::link('<i class="icon-user icon-white"></i> Acceso Usuario',array('/site/login'));?>
           <?php else:?>
             <?php echo Chtml::link('<i class="icon-user icon-white"></i> Perfil',array('/user/perfil'));?>
             <?php echo Chtml::link('<i class="icon-off icon-white"></i> Cerrar',array('/site/logout'));?>

  <!-- ----------------------------------------------------------- -->          
 <?php /*       <?php $this->widget('zii.widgets.CMenu',array(
            'id'=>'main-nav',
            'htmlOptions'=>array('class'=>'nav nav-pills'), //class="nav nav-pills pull-right"
            'encodeLabel'=>false,
            'items'=>array(
               array(
                  'label'=>'<i class="icon-user icon-white"></i> Usuario<b class="caret"></b>', 
                  'url'=>'#', 
                  'visible'=>!Yii::app()->user->isGuest,
                  'itemOptions'=>array('class'=>'dropdown'),
                  'linkOptions'=>array(
                                   'class'=>'dropdown-toggle',
                                   'data-toggle'=>'dropdown',
                                 ),
                                 
                  'submenuOptions'=>array(
                                     'class'=>'dropdown-menu',
                            //         'style'=>'background-color: black;border:1px solid white;',
                                    ),
                  'items'=>array(
                    array(
                      'label'=>'Perfil',
                      'url'=>Yii::app()->createUrl('/user/update',array('id'=>Yii::app()->user->id)),
                    ),
                    array(
                      'label'=>'---',
                //      'url'=>array('/producto/admin'),
                      'itemOptions'=>array(
                        'class'=>'divider',
                        ),
                    ),
                    array(
                      'label'=>'Rubros',
                      'url'=>Yii::app()->createUrl('/site/logout'),
                    ),
                  ),
               ),
            ),
        )); ?> */ ?>
               
<!-- ----------------------------------------------------------------- -->
           <?php endif;?>

 <?php /* <a href="index.php" title="Pagina de Inicio" class="home"><i class="icon-home icon-white"></i> Inicio</a>
          <a href="usuario-login.php"><i class="icon-user icon-white"></i> Acceso Usuario</a>
          <a href="usuario-login.php">Crear una cuenta</a>  */ ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="navegacion">
    <div class="container">
      <div class="row">
          <div class="span4">
            <h1 class="logo">
              <?php echo CHtml::link('C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o','http://www.cosantiago.com.ar');?>
            </h1>
          </div>
          <div class="span8">
          <div class="upper-nav">
            <div class="row">
               <div style="text-align:right;">
                 <?php if(!Yii::app()->user->isGuest):?>
                   <b><?php echo Yii::app()->user->nombre; ?></b>
                 <?php endif;?>
                 <br><br><br>
               </div>
    <?php /* <div class="span4 offset2">
                <form action="" method="post" id="search">
                  <fieldset>
                    <label for="sa">Search</label>
                    <input type="text" id="sa" name="sa" class="input-medium" placeholder="Buscar...">
                    <button type="submit">Buscar</button>
                  </fieldset>
                </form>
              </div>
              <div class="span2">
                <div class="cart">
                  <div class="cart-top"> <a class="summary" href="canasta.php"><span>CANASTA (0)</span></a> </div>
                </div>
              </div>  */ ?>
            </div>
          </div>
          <div class="clearfix"></div>

        <?php $this->widget('zii.widgets.CMenu',array(
            'id'=>'main-nav',
            'encodeLabel'=>false,
            'items'=>array(
               array(
                  'label'=>'Sistema<b class="caret"></b>', 
                  'url'=>'#', 
                  'visible'=>Yii::app()->user->esOperador,
                  'itemOptions'=>array('class'=>'dropdown'),
                  'linkOptions'=>array(
                                   'class'=>'main-btn dropdown-toggle',
                                   'data-toggle'=>'dropdown',
                                 ),
                                 
                  'submenuOptions'=>array(
                                     'class'=>'dropdown-menu',
                            //         'style'=>'background-color: black;border:1px solid white;',
                                    ),
                  'items'=>array(
                    array(
                      'label'=>'Usuarios',
                      'url'=>array('/user/admin'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),

                   array(
                      'label'=>'Periodos',
                      'url'=>array('/facperiodo/admin'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),

                   array(
                      'label'=>'Recepcion',
                      'url'=>array('/facrcp/admin'),
                      'visible'=>Yii::app()->user->esOperador,
                    ),                   

                    array(
                      'label'=>'Reiniciar Clave',
                      'url'=>array('/user/reiniciarclave'),
                      'visible'=>Yii::app()->user->esOperador,
                    ),

                    array(
                      'label'=>'Rubros',
                      'url'=>array('/rubro/admin'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),
                    array(
                      'label'=>'Productos',
                      'url'=>array('/producto/admin'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),
                   array(
                      'label'=>'Obras Sociales',
                      'url'=>array('/obra/admin'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),
                   array(
                      'label'=>'Actualizar',
                      'url'=>array('/actualiza'),
                      'visible'=>Yii::app()->user->esRoot,
                    ),                    
                                        
                  ),
               ),
                
            
            /*    array(
                  'label'=>'Materiales',
                  'url'=>array('canasta/pedido'),
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ), */

                array(
                  'label'=>'Tarjetas<b class="caret"></b>', 
                  'url'=>'#', 
                  'visible'=>!Yii::app()->user->isGuest,
                  'itemOptions'=>array('class'=>'dropdown'),
                  'linkOptions'=>array(
                                   'class'=>'main-btn dropdown-toggle',
                                   'data-toggle'=>'dropdown',
                                 ),
                                 
                  'submenuOptions'=>array(
                                     'class'=>'dropdown-menu',
                            //         'style'=>'background-color: black;border:1px solid white;',
                                    ),
                  'items'=>array(
                    array(
                      'label'=>'Liquidacion',
                      'url'=>array('/tarjeta/lista'),
                      'visible'=>!Yii::app()->user->isGuest,
                    ),

                   array(
                      'label'=>'Facturacion',
                      'url'=>array('/tarjeta/referencias'),
                      'visible'=>!Yii::app()->user->isGuest,
                    ),  

                   array(
                      'label'=>'Empresas',
                      'url'=>array('/empresa/admin'),
                      'visible'=>Yii::app()->user->esOperador,
                    ),
                  ),
               ),



                array(
                  'label'=>'Liquidacion',
                  'url'=>array('/liquidacion/lista'), 
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ),            
                array(
                  'label'=>'Obras Sociales', 
                  'url'=>array('/obra/lista'), 
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ), 
                array(
                  'label'=>'OS En Linea',
                  'url'=>array('/'),
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ),           
                // array(
                //   'label'=>'Autorizaciones',
                //   'url'=>array('/cupo/lista'),
                //   'visible'=>!Yii::app()->user->isGuest,
                //   'linkOptions'=>array('class'=>'main-btn')
                // ),      
                array(
                  'label'=>'Debito Cero', 
                  'url'=>array('/devolucion/lista'), 
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ),            
                // array(
                //   'label'=>'Seguro',
                //   'url'=>array('/seguro'),
                //   'visible'=>!Yii::app()->user->isGuest,
                //   'linkOptions'=>array('class'=>'main-btn')
                // ),                

                array(
                  'label'=>'Comprobantes<b class="caret"></b>', 
                  'url'=>'#', 
                  'visible'=>!Yii::app()->user->isGuest,
                  'itemOptions'=>array('class'=>'dropdown'),
                  'linkOptions'=>array(
                                   'class'=>'main-btn dropdown-toggle',
                                   'data-toggle'=>'dropdown',
                                 ),
                                 
                  'submenuOptions'=>array(
                                     'class'=>'dropdown-menu',
                            //         'style'=>'background-color: black;border:1px solid white;',
                                    ),
                  'items'=>array(
                    array(
                      'label'=>'Seguro Profesional',
                      'url'=>array('/seguro'),
                      'visible'=>!Yii::app()->user->isGuest,
                    ),
  
                   array(
                      'label'=>'Tratamiento de Residuos',
                      'url'=>array('/certificadotr'),
                      'visible'=>!Yii::app()->user->isGuest,
                    ),  
                  ),
               ),                
                array(
                  'label'=>'Recepcion', 
                  'url'=>array('/facrcp/create'), 
                  'visible'=>Yii::app()->user->esOperador,
                  'linkOptions'=>array('class'=>'main-btn')
                ),            
      /*          array(
                  'label'=>'Home', 
                  'url'=>array('/home/index'), 
                  'visible'=>!Yii::app()->user->isGuest,
                  'linkOptions'=>array('class'=>'main-btn')
                ), */
    /*            
                array(
                  'label'=>'Dropdown<b class="caret"></b>', 
                  'url'=>'#', 
                  'visible'=>!Yii::app()->user->isGuest,
                  'itemOptions'=>array('class'=>'dropdown'),
                  'linkOptions'=>array(
                                   'class'=>'main-btn dropdown-toggle',
                                   'data-toggle'=>'dropdown',
                                 ),
                  'submenuOptions'=>array('class'=>'dropdown-menu'),
                  'items'=>array(
                    array(
                      'label'=>'Opcion 1',
                      'url'=>'#',
                    ),
                    array(
                      'label'=>'Opcion 2',
                      'url'=>'#',
                    ),
                    array(
                      'label'=>'Opcion 3',
                      'url'=>'#',
                    ),
                  ),
                ),
      */          
                
            ),
        )); ?>


 <?php /* <ul id="main-nav">
            <li><a href="contacto.php" class=" main-btn">Contacto</a></li>
            <li><a href="catalogo.php" class=" main-btn">Insumos</a></li>
            <li><a href="revista.php" class="main-btn">Revista</a></li>
            <li><a href="actualidad.php" class="main-btn">Actualidad</a></li>
            <li><a href="capacitacion.php" class="main-btn">Capacitaci&oacute;n</a></li>
            <li class="dropdown"> <a href="socios.php" class="main-btn dropdown-toggle" data-toggle="dropdown">Socios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="socios.php?target=padron">Padr&oacute;n de Profesionales</a></li>
                <li><a href="socios.php?target=obras">Obras Sociales</a></li>
                <li><a href="socios.php?target=requisitos">Requisitos</a></li>
                <li><a href="socios.php?target=beneficios">Beneficios</a></li>
                <li><a href="socios.php?target=jubilados">Centro de Jubilados</a></li>
                <li><a href="socios.php?target=pago">Formas de Pago</a></li>
                <li><a href="socios.php?target=faq">Preguntas Frecuentes</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a class="main-btn dropdown-toggle" href="#" data-toggle="dropdown">Instituci&oacute;n <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="institucion.php?target=identidad">Identidad</a></li>
                <li><a href="institucion.php?target=historia">Resa&ntilde;a Historica</a></li>
                <li><a href="institucion.php?target=estatuto">Estatuto</a></li>
                <li><a href="institucion.php?target=comission">Comissi&oacute;n Directiva</a></li>
                <li><a href="institucion.php?target=areas">Areas de trabajo</a></li>
              </ul>
            </li>
          </ul>
      */ ?>
          
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
 <!-- End Main Menu -->
    
  <div class="container">
  	<div class="row">
  	  <?php echo $content ?>
  	</div>
  </div>  
    <!-- Footer -->
<footer>
  <div class="footer-uno">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="adresse"> <a href="index.php"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/COS_Logo_pie.png" alt="C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o"/></a>
            <ul class="direccion">
              <li>Hipolito Yrigoyen 565<br/>
                4200 Santiago del Estero</li>
              <li class="telefono">
                <p>0385 475 8807</p>
              </li>
              <li class="email"><a href="mailto:info@cosantiago.com.ar">info@cosantiago.com.ar</a></li>
            </ul>
          </div>
        </div>
        <div class="span6">
          <div class="newsletter">
            <h2>Newsletter</h2>
            <div class="clearfix"></div>
            <p>Recib&iacute; todos los meses en tu casilla de correo nuestra Newsletter Informativa</p>
            <form action="" method="post">
              <input type="email" value="Entra tu Email para inscribirte..." id="email" name="email" onfocus="if(this.value == &#39;Entra tu Email para inscribirte...&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Entra tu Email para inscribirte...&#39;;}">
              <div id="btnSubmit">
                <input type="submit" value="Inscribirme !" id="submit" name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="span6">
          <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/sitio/DATAWEB.jpg" alt="datafiscal"/></a> &copy; 2013. C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o - Todos los derechos reservados.
        </div>
        <div class="span6">
          <ul>
            <li><a href="socios.php?target=faq">Preguntas Frecuentes</a></li>
            <li><a href="aviso-legal.php">Aviso Legal</a></li>
            <li><a href="mapa.php">Mapa del Sitio</a></li>
            <li><a href="">Enlaces de inter&eacute;s</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>    
    <!-- end footer -->  
    <!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150603274-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150603274-1');
</script> -->


  </body>
</html>

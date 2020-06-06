<?php
header('Content-Type: text/html; charset=iso-8859-1'); //esto es para los acentos
?>
<!DOCTYPE html>
<html>
  <head>
    <title>C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="circulo odontologico santiague&ntilde;o, odontologo, odontologos, odontologia, santiago del estero, dentista, diente, arreglo, insumos">
    <meta name="description" content="P&aacute;gina oficial del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o. Actualidad, socios, cursos e insumos.">
    <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sitio/favicon.png">
    <meta name="image" content="<?php echo Yii::app()->theme->baseUrl; ?>/css/sitio/favicon.png">
    <meta property="og:url" content="http://www.cosantiago.com.ar">
    <meta property="og:title" content="Toda la actualidad del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o.">
    <meta property="og:type" content="Website">
    <meta property="og:image" content="<?php echo Yii::app()->theme->baseUrl; ?>/css/sitio/favicon.png">
    <meta property="og:description" content="P&aacute;gina oficial del C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o. Actualidad, socios, cursos e insumos.">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cos.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/slider.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  </head>
  <body>
  
 <!-- Main menu -->
 <header>
  <div id="user-nav">
    <div class="container">
      <div class="row">
        <div class="span6 offset6">
          <div class="pull-right">
          <a href="index.php" title="Pagina de Inicio" class="home"><i class="icon-home icon-white"></i> Inicio</a>
          <a href="usuario-login.php"><i class="icon-user icon-white"></i> Acceso Usuario</a>
          <a href="usuario-login.php">Crear una cuenta</a> </div>
        </div>
      </div>
    </div>
  </div>
  <div id="navegacion">
    <div class="container">
      <div class="row">
        <div class="span4"> <a href="index.php" class="logo">C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o</a> </div>
        <div class="span8">
          <div class="upper-nav">
            <div class="row">
              <div class="span4 offset2">
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
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <ul id="main-nav">
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
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
 <!-- End Main Menu -->
    
  <div class="container">
      <div class="row">
      <div class="span8">
        <div id="sequence-theme">
          <div id="sequence">
            <ul>
              <li class="animate-in">
                <img class="slide1" src="img/slider/slider_1.jpg" alt="slider1"/>
                <a class="text-slide1" href="">
                  <h4>Congreso Internacional de Odontolog&iacute;a</h4>
                  <p>17 y 18 de Junio 2013 - Inscribite!</p><span></span>
                </a>
              </li>
              <li>
                <img class="slide2" src="img/slider/slider_2.jpg" alt="slider2"/>
                <a class="text-slide2" href="">
                  <h4>Nuevos Professionales Egresados</h4>
                  <p>Se unieron al C.O.S, presentaci&oacute;n de ellos</p><span></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="actu">
          <h4 class="titulo titulo-noticias">
            <span><i class="icon-noticias"></i> &Uacute;ltimas noticias</span>
            <span class="mas pull-right"><a href="actualidad.php">Todas las noticias &raquo;</a></span>
          </h4>
          <div class="row">
          <?php
          
          // ULTIMAS 2 NOTICIAS
          $Qry_Billete = "SELECT
          Billete.ID_Billete,
          Billete.Titulo_Billete,
          Billete.Prologo_Billete,
          Billete.Publicacion,
          Billete.Fecha_Hora,
          Billete.ID_Usuario,
          Autor.Nombre_Apellido_Usuario
          FROM actualidad AS Billete
              INNER JOIN usuarios AS Autor ON Autor.ID_Usuario = Billete.ID_Usuario
          WHERE Billete.Publicacion = '1'
              GROUP BY ID_Billete
              ORDER BY Billete.Fecha_Hora DESC
              LIMIT 0, 2";
          $dbResult_Billete = mysql_query($Qry_Billete, $dbLink) or exit ("Error al recuperar las 2 noticias:<br/>".mysql_error());
          while($Billete = mysql_fetch_array ($dbResult_Billete)){
          
            $ID_Billete = $Billete['ID_Billete'];
            
            // Cantidad comentarios
            $dbResult_Comentarios = mysql_query("SELECT * FROM actualidad_comentarios WHERE ID_Billete='$ID_Billete'", $dbLink) or exit("Error cant. coms:<br/>".mysql_error());
            $Total_Comentarios = @mysql_num_rows($dbResult_Comentarios);
            
            // Categorias
            $CatBillete = '<span>';
            $Q_Billete_Categorias = "SELECT
            Cat.Nombre_Actu_Categoria,
            Cat.ID_Actu_Categoria
            FROM categorias_actualidad AS Cat
              INNER JOIN actualidad_categorias AS BCat ON BCat.ID_Categoria_Actualidad = Cat.ID_Actu_Categoria
            WHERE BCat.ID_Billete = '$ID_Billete'";
            $dbResult_Billete_Categorias = mysql_query($Q_Billete_Categorias, $dbLink) or exit ("Error al recuperar las categorias de la noticia:<br/>".mysql_error());
            while ($Billete_Categorias = mysql_fetch_array ($dbResult_Billete_Categorias)){
                $CatBillete .= '<a href="actualidad.php?categoria='.$Billete_Categorias['ID_Actu_Categoria'].'">'.$Billete_Categorias['Nombre_Actu_Categoria'].', </a>';
            }
            
            $CatBillete .= '</span>';
            
            $Fecha = date($Billete['Fecha_Hora']);
            
            echo'
            <div class="span4 preview-actu">
              <h5><a href="billete.php?id='.$Billete['ID_Billete'].'">'.$Billete['Titulo_Billete'].'</a></h5>
              <p>'.html_entity_decode($Billete['Prologo_Billete']).'</p>
              <div class="clearfix"></div>
              <a href="billete.php?id='.$Billete['ID_Billete'].'" class="pull-right">Leer m&aacute;s &rarr;</a>
              <br/><br/>
              <div class="clearfix"></div>
              <div class="ef-bloginfo">
                <div class="ef-bloginfo-inner">
                  <ul class="inline-list">
                    <li class="ef-bloginfo-author">Por <a href="blog-singel.html">'.$Billete['Nombre_Apellido_Usuario'].'</a></li>
                    <li class="ef-bloginfo-cat">'.$CatBillete.'</li>
                    <li class="ef-bloginfo-comment">'.$Total_Comentarios.'</li>
                  </ul>
                </div>
              </div>
            </div>';
          }
          ?>
          </div>
        </div>
      </div>
      <div class="span4">
        <ul class="social">
          <li><a href="" class="email" data-toggle="tooltip" title="Email" id="email">email</a></li>
          <li><a href="" class="twitter" data-toggle="tooltip" title="Seguinos" id="twitter">twitter</a></li>
          <li><a href="http://www.facebook.com/circulo.odontologicosantiagueno" class="facebook" data-toggle="tooltip" title="Hazte fan" id="facebook">facebook</a></li>
        </ul>
        
        <div class="clearfix"></div>
        
        <div class="bienvenidos">
          <h1 class="titulo bienvenido">Bienvenidos</h1>
          <h3 class="titulo clastres">al sitio internet del<br>C&iacute;rculo Odontol&oacute;gico Santiague&ntilde;o.</h3>
          <a href="" class="directora pull-right">&rarr; Leer el mensaje de la directora</a>
        </div>
        <div class="clearfix"></div>
        
        <div class="capacitacion">
          <div class="capacitacion-header">
            <h3>Capacitaci&oacute;n</h3>
            <p>Proximos cursos</p>
          </div>
          <ul class="capacitacion-clases">
          <?php
          
          // CURSOS
          $Q_Cursos = "SELECT * FROM cursos ORDER BY Fecha_Curso DESC LIMIT 0, 5";
          $dbResult_Cursos = mysql_query($Q_Cursos, $dbLink) or exit ("Error al recuperar dbResult_Cursos:<br/>".mysql_error());
          while ($Cursos = mysql_fetch_array ($dbResult_Cursos)){
          
            if($Cursos['Fecha_Curso'] == '1970-01-01'){
              $Fecha_Curso = '
              <time>
                <span class="ef-date ef-round">
                  <span>sin</span><br>
                  <span class="ef-uppercase">fecha</span>
                </span>
              </time>';
            }else{
              $Fecha_Curso = '
              <time datetime="'.date('Y-m-d', strtotime($Cursos['Fecha_Curso'])).'">
                <span class="ef-date ef-round">
                  <span>'.date('d', strtotime($Cursos['Fecha_Curso'])).'</span><br>
                  <span class="ef-uppercase">'.date('M', strtotime($Cursos['Fecha_Curso'])).'</span>
                </span>
              </time>';
            }
            
            echo'
            <li>
              <a href="curso.php?id='.$Cursos['ID_Curso'].'">
                <span class="ef-date-comment text-center">
                  '.$Fecha_Curso.'
                </span>
                <h5>'.$Cursos['Nombre_Curso'].'</h5>';
                if($Cursos['Director'] != ''){ echo '<p>'.$Cursos['Director'].'</p>';}
                echo'
              </a>
            </li>
            ';
          }
          ?>
          </ul>
          <div class="text-center">
          <a class="btn btn-capacitacion" href="capacitacion.php">Ver todos los cursos &rarr;</a>
          </div>
          <br/>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="span12"> 
      <span class="grillage"></span>       
      </div>
    </div>
    <!--
    <div class="row">
      <div class="span12">
        <h4 class="titulo titulo-noticias">
          <span><a href="catalogo.php"><i class="icon-noticias icon-insumos"></i> Insumos Seleccionados</a></span>
          <span class="mas pull-right"><a href="catalogo.php">Todos los Insumos &raquo;</a></span>
        </h4>       
      </div>
    </div>
    <div class="row">
      <div class="span2 item">
        <a href="detalle-producto.php">
        <img src="img/productos/140/tets.jpg" alt="tet"/>
        <div class="desc">
          <h6>ACEITE P/ QUATROCARE KAVO</h6>
          <span class="pull-left">$ 599.99</span>
          <i class="icon-search pull-right"></i>
          <div class="clearfix"></div>
        </div>       
        </a>
      </div>
    </div>
    -->
  </div>
  
    <?php include 'includes/footer.php';?>  
  
  
  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script src="scripts/bootstrap.js"></script>
    <script src="scripts/sequence.jquery-min.js"></script>
    <script type="text/javascript">
      $('#twitter').tooltip()
      $('#facebook').tooltip()
      $('#email').tooltip()
      
      $(document).ready(function(){
        var options = {
              autoPlay: true,
              autoPlayDelay: 3000,
              pauseOnHover: false,
              preloader: true,
              fallback: {
                theme: "fade",
                speed: 500
            }
        }
        
        var sequence = $("#sequence").sequence(options).data("sequence");
    });
    </script>
  </body>
</html>

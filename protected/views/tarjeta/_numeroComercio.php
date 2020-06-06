<br>
<h3>N&uacute;meros de comercio:</h3>
<p>
<?php foreach ($model as $empresa) {
  	if ($empresa->datosGenerales(' - ')<>'') {
    	echo $empresa->nombre.' '.$empresa->datosGenerales(' - ').'</br>';
  	}	
}
?>
</p>


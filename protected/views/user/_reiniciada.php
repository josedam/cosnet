

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h3><?php echo $model->nombre.' ('.$model->username.')'; ?></h3>
<div class="form-actions">
	<h4><?php echo $msg ?></h4>
</div>

<h4><?php echo $tarjeta->nombre ?></h4>
<table class="table table-condensed table-bordered">
    <tbody>
        <?php foreach ($tarjeta->empresaitems as $item):?>
        <tr>
            <td><?php echo $item->descripcion ?></td>
            <td><?php echo $item->detalle?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<br>
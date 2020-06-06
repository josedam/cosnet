

<?php foreach($msg as $mm): ?>
  <?php foreach($mm as $i=>$v): ?>
  <div class='row'>
    <div class='span3'>
      <?php echo $i; ?>
    </div>
    <div class='span3'>
      <?php echo $v; ?>
    </div>
  </div>
  <?php endforeach; ?>
<?php endforeach; ?>  

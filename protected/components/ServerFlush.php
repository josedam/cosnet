<?php
class ServerFlush
{
   public static function enviar($id, $txt)
   {
     echo "<script>document.getElementById('".$id."').innerHTML = '".$txt."';</script>";
     self->flush();
   }

   public static function show($id)
   {
     echo "<script>document.getElementById('".$id."').style.visibility = 'visible';</script>";
     self->flush();
   }

   public static function hide($id)
   {
     echo "<script>document.getElementById('".$id."').style.visibility = 'hidden';</script>";
     self->flush();
   }

  public static function flush()
  {
     flush();
     ob_flush();
 
  }
}

?>

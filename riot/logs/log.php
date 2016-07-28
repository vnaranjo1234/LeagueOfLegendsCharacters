<?php
  $file = "logs\\log.txt";
  $update = date("M/D/Y h:i:sa",time())."\n";
  file_put_contents($file,$update, FILE_APPEND);
?>

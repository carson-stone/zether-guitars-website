<?php 
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  $header = fopen('header.html','r');
  echo fread($header, filesize('header.html'));
  $menu = fopen('menu.html','r');
  echo fread($menu, filesize('menu.html'));
  $footer = fopen('footer.html','r');
  
  $message = 'Successfully logged out';
  $_SESSION['logged-in'] = false;

  echo '<div style="height: 55vh;"><h2>' . $message . '</h2>' . 
        '<a href="index.php"><h3>To the Home Page</h3></a>' .
        fread($footer, filesize('footer.html')) . 
      '</div>';
  
  fclose($header);
  fclose($menu);
  fclose($footer);
?>
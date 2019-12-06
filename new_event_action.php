<?php 
  $header = fopen('header.html','r');
  echo fread($header, filesize('header.html'));
  $menu = fopen('menu.html','r');
  echo fread($menu, filesize('menu.html'));
  $footer = fopen('footer.html','r');
  
  $error = FALSE;
  $message = 'Successfully added your event!';
  if (empty($_POST['name']) || empty($_POST['sponsor']) || 
      empty($_POST['date']) || empty($_POST['time']) ||
      empty($_POST['description'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
    $error = TRUE;
  }
  if (!preg_match("/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/", $_POST['date']) ||
      !preg_match("/(0[0-9]|1[0-2]):[0-5][0-9] (AM|PM)/", $_POST['time'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
    $error = TRUE;
  }
  echo '<div style="height: 55vh;"><h2>' . $message . '</h2>' . 
          '<a href="events.php"><h3>To the Calender</h3></a>' .
          fread($footer, filesize('footer.html')) . 
      '</div>';
  if (!$error) {
    $db = new SQLite3('zether.db');
    $query = 'INSERT INTO events VALUES ("' .
                $_POST['name'] . '","' .
                $_POST['sponsor'] . '","' .
                $_POST['date'] . '","' .
                substr($_POST['time'], 0, 5) . ':00' . '","' .
                substr($_POST['time'], 6, 2) . '","' .
                $_POST['description'] . '"' .
            ');';
    $db->exec($query);
    $db->close();
  }

  fclose($header);
  fclose($menu);
  fclose($footer);
?>
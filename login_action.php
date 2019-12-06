<?php 
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  $header = fopen('header.html','r');
  echo fread($header, filesize('header.html'));
  $menu = fopen('menu.html','r');
  echo fread($menu, filesize('menu.html'));
  $footer = fopen('footer.html','r');
  
  $error = FALSE;
  $message = 'Successfully logged in!';
  if (empty($_POST['userid']) || empty($_POST['pswd'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
    $error = TRUE;
  }
  if (!preg_match("/[a-zA-Z0-9]{5,12}/", $_POST['userid']) ||
      !preg_match("/.{6,20}/", $_POST['pswd'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
  }

  $db = new SQLite3('zether.db');
  $query = 'SELECT password FROM users WHERE username="' . $_POST['userid'] . '";';
  $res = $db->query($query);
  $hashed_pswd = $res->fetchArray(SQLITE3_ASSOC)['password'];
  $db->close();
  if (!password_verify($_POST['pswd'], $hashed_pswd)) {
    $message = '<h2>ERROR - password does not match that user</h2>';
    $error = TRUE;
  }
  
  if ($error) {
    echo '<div style="height: 55vh;"><h2>' . $message . '</h2>' . 
          '<a href="login.php"><h3>Back to Login</h3></a>' .
          fread($footer, filesize('footer.html')) . 
        '</div>';
  } else {
    $_SESSION['logged-in'] = true;
    echo '<div style="height: 55vh;"><h2>' . $message . '</h2>' . 
          '<a href="shop.php"><h3>To the Shop</h3></a>' .
          fread($footer, filesize('footer.html')) . 
        '</div>';
  }

  fclose($header);
  fclose($menu);
  fclose($footer);
?>
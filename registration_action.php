<?php 
  $header = fopen('header.html','r');
  echo fread($header, filesize('header.html'));
  $menu = fopen('menu.html','r');
  echo fread($menu, filesize('menu.html'));
  $footer = fopen('footer.html','r');
  
  $error = FALSE;
  $message = 'Successfully registered! Welcome to Zether!';
  if (empty($_POST['userid']) || empty($_POST['pswd']) || 
      empty($_POST['pswd-confirm']) || empty($_POST['name']) ||
      empty($_POST['email']) || empty($_POST['address']) ||
      empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
    $error = TRUE;
  }
  if (!preg_match("/[a-zA-Z0-9]{5,12}/", $_POST['userid']) ||
      !preg_match("/.{6,20}/", $_POST['pswd']) || 
      !preg_match("/.{6,20}/", $_POST['pswd-confirm']) || 
      !preg_match("/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+/", $_POST['email']) || 
      !preg_match("/[a-zA-Z]+/", $_POST['state'])) {
    $message = '<h2>ERROR - invalid form responses</h2>';
    $error = TRUE;
  }
  echo '<div style="height: 55vh;"><h2>' . $message . '</h2>' . 
          '<a href="shop.php"><h3>To the Shop</h3></a>
          <img src="./guitar-images/2/3.png" alt="picture of a guitar" />
          <img src="./guitar-images/3/3.png" alt="picture of a guitar" />' .
          fread($footer, filesize('footer.html')) . 
      '</div>';
  if (!$error) {
    $offer_msg = "yes";
    $receive_offers = "true";
    if (empty($_POST['receive-offers'])) {
      $receive_offers = "false";
      $offer_msg = "no";
    }

    $db = new SQLite3('zether.db');
    $query = 'INSERT INTO users VALUES ("' .
                $_POST['userid'] . '","' .
                password_hash($_POST['pswd'], PASSWORD_BCRYPT) . '","' .
                $_POST['name'] . '","' .
                $_POST['email'] . '","' .
                $_POST['address'] . '","' .
                $_POST['city'] . '","' .
                $_POST['state'] . '",' .
                $_POST['zip'] . ',"' .
                $receive_offers .
            '");';
    $db->exec($query);
    $db->close();
  }
  fclose($header);
  fclose($menu);
  fclose($footer);
?>
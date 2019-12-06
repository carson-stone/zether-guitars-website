<?php
  if (session_id() == '' || !isset($_SESSION))
      session_start();
?>
<?php require('header.html') ?>
<?php require('menu.html') ?>
  <div class="sidebar-container">
    <ul class="sidebar">
      <li><a href="#first-item-location">Welcome</a></li>
      <li><a href="#most-popular">Most Popular Model</a></li>
      <?php 
        if (!$_SESSION['logged-in']) {
          echo '
            <li>
              <button id="form-button" onclick="window.location.href=\'login.php\'">
                Login
              </button>
            </li>
            <li>
              <button id="form-button" onclick="window.location.href=\'registration.php\'">
                Register an Account
              </button>
            </li>';
        } else {
          echo '
            <li>
              <button id="form-button" onclick="window.location.href=\'logout_action.php\'">
                Log Out
              </button>
            </li>
          ';
        }
      ?>
    </ul>
  </div>
  <div class="non-sidebar">
    <h2 id="page-heading">Welcome!</h2>
    <div id="first-item-location"></div>
    <h3>Why Zether?</h3>
      <p>
        Zether Guitars makes guitars that elevate your playing to the next
        level. Pros from all over the world use these to shred, rock, serenade,
        and everything in between. Just holding one will make you feel like a
        pro. Or if you are a pro, then welcome to the hall of fame, friend. Your
        father might even finally say that you made the right decision to drop
        out when he sees you with one of these. Dreams are made and hearts are broken
        with Zether.
        <br />
        <br />
        Zether Guitars: bringing families together since 2011.
      </p>
      <hr id="most-popular" />
      <h3>The Twister</h3>
      <img src="./guitar-images/2/2.png" alt="picture of a guitar" />
      <p>
        The Twister is our most popular and origiinal model. This and more can be found in 
        the <a href="./shop.php">Shop</a> 
        and in the <a href="./gallery.php">Gallery</a>!
      </p>
    </div>
  </div>
<?php require('footer.html') ?>

<?php require('header.html') ?>
<?php require('menu.html') ?>
<?php
  $sorted = array([], [], [], [], [], [], [], [], [], [], [], []);
  $after_2019 = array();

  $db = new SQLite3('zether.db');
  $query = 'SELECT * FROM events;';
  $res = $db->query($query);

  while ($event = $res->fetchArray(SQLITE3_ASSOC)) {
    $date = $event['date'];
    $yr = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    if ($yr > 2019) {
      $after_2019[] = $event;
    } else {
      $sorted[$month-1][] = $event;
    }
  }
    
  for ($k=0; $k<=11; $k++) {
    for ($i=0; $i<sizeof($sorted[$k]); $i++) {
      for ($j=0; $j<sizeof($sorted[$k])-$i-1; $j++) {
        $date = $sorted[$k][$j]['date'];
        $day = substr($date, 8, 2);
        $next_date = $sorted[$k][$j+1]['date'];
        $next_event_day = substr($next_date, 8, 2);
        if ($day > $next_event_day) {
          $temp = $sorted[$k][$j];
          $sorted[$k][$j] = $sorted[$k][$j+1];
          $sorted[$k][$j+1] = $temp;
        } else if ($day == $next_event_day) {
          $time = $sorted[$k][$j]['time'];
          $hr = substr($time, 0, 2);
          $min = substr($time, 3, 2);
          $m = $sorted[$k][$j]['ampm'];
          $next_time = $sorted[$k][$j+1]['time'];
          $next_event_hr = substr($next_time, 0, 2);
          $next_event_min = substr($next_time, 3, 2);
          $next_event_m = $sorted[$k][$j+1]['ampm'];
          if ($m == 'PM' && $next_event_m == 'AM') {
            $temp = $sorted[$k][$j];
            $sorted[$k][$j] = $sorted[$k][$j+1];
            $sorted[$k][$j+1] = $temp;
          } else if ($m == $next_event_m) {
            if ($hr > $next_event_hr) {
              $temp = $sorted[$k][$j];
              $sorted[$k][$j] = $sorted[$k][$j+1];
              $sorted[$k][$j+1] = $temp;
            } else if ($hr == $next_event_hr) {
              if ($min > $next_event_min) {
                $temp = $sorted[$k][$j];
                $sorted[$k][$j] = $sorted[$k][$j+1];
                $sorted[$k][$j+1] = $temp;
              }
            }
          }
        }
      }
    }
  }
  $db->close();  

  echo '
    <div class="sidebar-container">
      <ul class="sidebar">
        <li><a href="#first-item-location">January</a></li>
        <li><a href="#feb">February</a></li>
        <li><a href="#mar">March</a></li>
        <li><a href="#apr">April</a></li>
        <li><a href="#may">May</a></li>
        <li><a href="#jun">June</a></li>
        <li><a href="#jul">July</a></li>
        <li><a href="#aug">August</a></li>
        <li><a href="#sep">September</a></li>
        <li><a href="#oct">October</a></li>
        <li><a href="#nov">November</a></li>
        <li><a href="#dec">December</a></li>
        <li>
        <button id="form-button"
          onclick="window.location.href=\'new_event.php\'">Add an Event
        </button>
      </li>
      </ul>
    </div>
    <div class="non-sidebar" id="calender">
      <h2 id="page-heading">Events for 2019</h2>
      <div id="first-item-location"></div>
      <h3>January</h3>
  ';
    foreach ($sorted[0] as $event) {
      echo 
      "<dl>
        <dt>" . $event['name'] . "</dt>
        <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
          <a href=\"#\">" . $event['sponsor'] . "</a>
          <p>" . $event['description'] . "</p>
        </dd>
      </dl>";
    }
  echo    
      '<hr id="feb" />
      <h3>February</h3>';
      foreach ($sorted[1] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo    
      '<hr id="mar" />
      <h3>March</h3>';
      foreach ($sorted[2] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo
      '<hr id="apr" />
      <h3>April</h3>';
      foreach ($sorted[3] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo
      '<hr id="may" />
      <h3>May</h3>';
      foreach ($sorted[4] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo      
      '<hr id="jun" />
      <h3>June</h3>';
      foreach ($sorted[5] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo
      '<hr id="jul" />
      <h3>July</h3>';
      foreach ($sorted[6] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo    
      '<hr id="aug" />
      <h3>August</h3>';
      foreach ($sorted[7] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo    
      '<hr id="sep" />
      <h3>September</h3>';
      foreach ($sorted[8] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo    
      '<hr id="oct" />
      <h3>October</h3>';
      foreach ($sorted[9] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo      
      '<hr id="nov" />
      <h3>November</h3>';
      foreach ($sorted[10] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo     
      '<hr id="dec" />
      <h3>December</h3>';
      foreach ($sorted[11] as $event) {
        echo 
        "<dl>
          <dt>" . $event['name'] . "</dt>
          <dd>" . $event['date'] . " " . substr($event['time'], 0, 5) . " " . $event['ampm'] . " - 
            <a href=\"#\">" . $event['sponsor'] . "</a>
            <p>" . $event['description'] . "</p>
          </dd>
        </dl>";
      }
  echo  
    '</div>
    </div>
  ';
?>
<?php require('footer.html') ?>

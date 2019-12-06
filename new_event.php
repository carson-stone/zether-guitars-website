<?php 
  if (session_id() == '' || !isset($_SESSION))
  session_start();
  if (empty($_SESSION['logged-in']) || !$_SESSION['logged-in'])
  header('Location: login.php');
?>
<?php require('header.html') ?>
<?php require('menu.html') ?>
<div class="form">
  <h2 id="page-heading" class="form-heading">Add an Event</h2>
  <form method="POST" action="new_event_action.php" onsubmit="return validate()">
    <div>
      <p>
        Event Name:
      </p>
      <input required autofocus type="text" name="name" />
    </div>
    <div>
      <p>
        Sponsor:
      </p>
      <input required type="text" name="sponsor" />
    </div>
    <div>
      <p>
        Date:
      </p>
      <input required type="date" name="date" 
        title="yyyyy-mm-dd" pattern="[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])" 
      />
    </div>
    <div>
      <p>
        Time:
      </p>
      <input required type="time" name="time" 
        title="hh:mm AM/PM" pattern="(0[0-9]|1[0-2]):[0-5][0-9] (AM|PM)"
      />
    </div>
    <div>
      <p>
        Description:
      </p>
      <textarea name="description" rows="4">Enter a brief description of the event.</textarea>
    </div>
    <button id="form-button" type="submit">
        Submit
    </button>
  </form>
</div>
</div>
<script>
  const validate = () => {
    const now = new Date();
    const enterred = new Date(document.forms[0]['date'].value);
    console.log(now,enterred,document.forms[0]['date'].value);
    if (enterred <= now) {
      alert('date is invalid');
      return false;
    }
  }
</script>
<?php require('footer.html') ?>
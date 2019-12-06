<?php require('header.html') ?>
<?php require('menu.html') ?>
<div class="form">
  <h2 id="page-heading" class="form-heading">Login</h2>
  <form method="POST" action="login_action.php" onsubmit="return validate()">
    <div>
      <p>
        Username:
      </p>
      <input autofocus required type="text" name="userid" 
        pattern="[a-zA-Z0-9]{5,12}" title="5-12 characters long, no special characters" 
      />
    </div>
    <div>
      <p>
        Password:
      </p>
      <input required type="password" name="pswd" title="6-20 characters long" pattern=".{6,20}" />
    </div>
    <button id="form-button" type="submit">
        Submit
    </button>
  </form>
</div>
</div>
<script>
  const validate = () => {
    if ((document.forms[0]['pswd'].value.length < 6) || (document.forms[0]['pswd'].value.length < 6)) {
      alert('password must be 6-20 characters');
      return false;
    }
    else if ((document.forms[0]['userid'].value.length < 5 || (document.forms[0]['userid'].value.length < 12)) {
      alert('username must be 5-12 characters');
      return false;
    }
  }
</script>
<?php require('footer.html') ?>
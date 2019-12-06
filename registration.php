<?php require('header.html') ?>
<?php require('menu.html') ?>
<div class="form">
  <h2 id="page-heading" class="form-heading">Register an Account</h2>
  <form method="POST" action="registration_action.php" onsubmit="return validate()">
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
    <div>
      <p>
        Confirm Password:
      </p>
      <input required type="password" name="pswd-confirm" pattern=".{6,20}" />
    </div>
    <div>
      <p>
        Name:
      </p>
      <input required type="text" name="name" />
    </div>
    <div>
      <p>
        Email:
      </p>
      <input required type="email" name="email" 
        pattern="[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+" title="xx@yy.zz" 
      />
    </div>
    <div>
      <p>
        Address:
      </p>
      <input required type="text" name="address" />
    </div>
    <div>
      <p>
        City:
      </p>
      <input required type="text" name="city" />
    </div>
    <div>
      <p>
        State:
      </p>
      <input required type="text" name="state" pattern="[a-zA-Z]+" />
    </div>
    <div>
      <p>
        ZIP:
      </p>
      <input required type="number" name="zip" title="5 digit long postal code"  />
    </div>
    <div>
      <label id="receive-promotions">
        <input type="checkbox" name="receive-offers" value="1" checked />
        Check here if you would like to receive email offers and promotions.
      </label>
    </div>
    <button id="form-button" type="submit">
        Submit
    </button>
  </form>
</div>
</div>
<script>
  const validate = () => {
    if (document.forms[0]['pswd'].value !== document.forms[0]['pswd-confirm'].value) {
      alert('passwords must match');
      return false;
    }
  }
</script>
<?php require('footer.html') ?>
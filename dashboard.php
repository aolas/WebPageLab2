<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

  $User = new User($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <?php
      require_once "inc/head.php";
      ?>

    <title>Dashboard</title>

  </head>

  <body>
  <?php require_once "inc/navbar.php"; ?>
  	<div class="uk-section uk-container">
        <h2>Dashboard</h2>
        <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
        <p><a href="/logout.php">Logout</a></p>
        <p>Plans for aditional support:</p>
        <ul>
            <li class="password"></li>
            <li>CHANGE PASSWORD</li>
        </ul>
        <form class="uk-form-stacked js-user-update">
            <h2>User data</h2>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input email" id="form-stacked-text" type="email" required='required' value="<?php echo $User->email;  ?>" placeholder="email@email.com">
                </div>
            </div>
            <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit">Change</button>
            </div>
        </form>
  	</div>
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>

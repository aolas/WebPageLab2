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
        <p>Hello <?php echo $User->name; ?>, you registered at <?php echo $User->reg_time; ?></p>

        <form class="uk-form-stacked js-user-update">
            <h2>Update user info</h2>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input email" id="form-stacked-text" type="email" required='required' value="<?php echo $User->email;  ?>" placeholder="email@email.com">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input name" id="form-stacked-text" type="text" required='required' value="<?php echo $User->name;  ?>" placeholder="Name">
                </div>
            </div>
            <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
            <div class="uk-margin uk-alert uk-alert-success js-message" style='display: none;'></div>
            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit">Change</button>
            </div>
        </form>
        <form class="uk-form-stacked js-change-password">
            <h2>Change password</h2>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Current Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input current-password" id="form-stacked-text" type="Password" required='required' placeholder="Current Password">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">New password</label>
                <div class="uk-form-controls">
                    <input class="uk-input password" id="form-stacked-text" type="password" required='required' placeholder="New password">
                </div>
            </div>
            <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
            <div class="uk-margin uk-alert uk-alert-success js-message" style='display: none;'></div>
            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="submit">Change</button>
            </div>
        </form>
  	</div>
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>

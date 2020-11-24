<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceDashboard();
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <?php
    require_once "inc/head.php";
    ?>
    <title>Registration</title>
  </head>

  <body>
  <?php require_once "inc/navbar.php"; ?>
  	<div class="uk-section uk-container">
  		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
			<form class="uk-form-stacked js-register">
				
				<h2>Register</h2>

			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Email</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="form-stacked-text" type="email" required='required' placeholder="email@email.com">
			        </div>
			    </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input password" id="form-stacked-text" type="password" required='required' placeholder="Password">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="comfirm-password">Comfirm password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input comfirm-password" type="password" required='required' placeholder="Comfirm password">
                    </div>
                </div>

			    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

			    <div class="uk-margin">
			        <button class="uk-button uk-button-default" type="submit">Register</button>
			    </div>

			</form>
  		</div>
        <?php require_once "inc/footer.php"; ?>
    </div>


  </body>
</html>

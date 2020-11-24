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

        <p>Hello <?php echo $User->name; ?>, you registered at <?php echo date("Y-m-d H:i:s", strtotime($User->reg_time)); ?></p>

        <ul class="uk-subnav uk-subnav-pill" uk-switcher>
            <li><a href="#">Email and Name</a></li>
            <li><a href="#">Password</a></li>
            <li><a href="#">User list</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Cookies and files</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            <li>
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
            </li>
            <li>
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
            </li>
            <li>
                <button onclick="window.print()">Print</button>
                <table class="uk-table uk-table-responsive uk-table-divider">
                    <thead>
                    <tr>
                        <th>User id</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Registration time</th>
                        <th>Password hash</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $arrValues = $User::getUserList();
                    foreach ($arrValues as $row) {
                            echo "<tr>
                                <td>",$row->user_id,"</td><td>",$row->name,"</td><td>",$row->email,"</td> <td>",date("Y-m-d H:i:s",strtotime( $row->reg_time)) ,"</td><td>",$row->password,"</td>
                                </tr>";
                    } ?>

                    </tbody>
                </table>
            </li>
            <li>
                Generate report
                <?php
                $arrUsers = User::getUserIdAndEmailList();

                ?>
                <form class="uk-grid-small report" uk-grid >
                    <div class="uk-width-1-2@s uk-grid-margin">
                        <label class="uk-form-label" for="form-horizontal-select">User</label>
                        <div class="uk-form-controls">
                            <select class="uk-select user" id="form-horizontal-select ">
                                <?php
                                foreach ($arrUsers as $user){
                                    echo '<option value="',$user->user_id,'">',$user->email,'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-1-2@s uk-grid-margin">
                        <label class="uk-form-label" for="form-horizontal-select">Category</label>
                        <div class="uk-form-controls">
                            <select class="uk-select category" id="form-horizontal-select">
                                <option value=1 >Articles</option>
                                <option value=2 >Comments</option>
                            </select>
                        </div>
                    </div>


                    <div class="uk-width-1-6@s uk-grid-margin">
                        <button class="uk-button uk-button-default" type="submit">Get report</button>
                    </div>
                    <div class="uk-width-1-1@s uk-grid-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>
                    <div class="uk-width-1-1@s uk-grid-margin uk-alert uk-alert-success js-message" style="display: none;"></div>

                </form>
                <table id="results" class="uk-table uk-table-striped report-data">
                    <thead >

                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </li>
            <li>
                <p uk-margin class="containeractions">

                    <button class="uk-button uk-button-default add-cookie">Add message to cookie</button>
                    <button class="uk-button uk-button-default add-message">Add timestamp to file</button>
                    <button class="uk-button uk-button-default read-data">read cookie and file</button>

                    <div class="uk-margin uk-alert uk-alert-danger" id="js-error" style='display: none;'></div>
                    <div class="uk-margin uk-alert uk-alert-success " id="js-message" style='display: none;'></div>
                </p>

            </li>
        </ul>


        <?php require_once "inc/footer.php"; ?>
    </div>

  </body>
</html>

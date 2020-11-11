<?php
// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}
?>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
                <ul class="uk-navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Item</a></li>

                </ul>
            </div>
        </div>

        <div class="uk-navbar-center-right"><div>
                <ul class="uk-navbar-nav">

                    <?php
                    if(Page::IsLogedIn()) {
                        // The user is allowed here
                        echo '<li> <a href="/logout.php">Log out</a> </li>';
                    } else {
                        // The user is not allowed here.
                        echo '<li> <a href="/login.php">Log in</a> </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</nav>

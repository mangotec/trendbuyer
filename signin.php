<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="signin.js"></script>
        <title>Trendbuyer - Sign in</title>
        <?php if($_SESSION){echo "<script> location.replace('dashboard.php'); </script>";} ?>
        <script>
            function validateForm() {
                var username = document.forms["signinform"]["username"].value,
                    password = document.forms["signinform"]["password"].value,
                    snackbarContainer = document.querySelector('#toast');
                if (username == "" || password == "") {
                    var sdata = {message: 'All fields must be filled in. '};
                    snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    return false;
                }
                else {
                    return true;
                }
            }
        </script>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require("header.php"); ?>
            <main class="mdl-layout__content" style="flex: 1 0 auto;">
                <div class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-layout-spacer"></div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <h1>Trendbuyer</h1>
                            <p class="lead">Sign in below<br>Don't have an account? <a href="index.php">Sign up</a></p>
                            <div id="signupalert"></div>
                            <form name="signinform" id="signinform" method="post">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username" id="username">
                                    <label class="mdl-textfield__label" for="username">Username</label>
                                </div><br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="password" id="password">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div><br>
                                <input type="submit" id="signinbutton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="Sign in" name="submit">
                            </form>
                            <div class="mdl-spinner mdl-js-spinner" id="signinspinner"></div>
                            <div id="toast" class="mdl-js-snackbar mdl-snackbar">
                                <div class="mdl-snackbar__text"></div>
                                <button class="mdl-snackbar__action" type="button"></button>
                            </div>
                        </div>
                        <div class="mdl-layout-spacer"></div>
                    </div>
                </div>
            </main>
            <?php require("footer.php"); ?>
        </div>
    </body>
</html>

<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="signup.js"></script>
        <title>Trendbuyer - Sign up</title>
        <?php if($_SESSION){echo "<script> location.replace('dashboard.php'); </script>";} ?>
        <script>
            function validateForm() {
                var username = document.forms["signupform"]["username"].value,
                    email = document.forms["signupform"]["email"].value,
                    password = document.forms["signupform"]["password"].value,
                    password2 = document.forms["signupform"]["password2"].value,
                    snackbarContainer = document.querySelector('#toast');
                if (username == "" || email == "" || password == "" || password2 == "") {
                    var sdata = {message: 'All fields must be filled in. '};
                    snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    return false;
                }
                else if (password != password2) {
                    var sdata = {message: 'Passwords do not match. '};
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
                            <p class="lead">Sign up below<br>Already have an account? <a href="signin.php">Sign in</a></p>
                            <div id="signupalert"></div>
                            <form name="signupform" id="signupform" method="post">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username" id="username">
                                    <label class="mdl-textfield__label" for="username">Username</label>
                                </div><br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="email" name="email" id="email">
                                    <label class="mdl-textfield__label" for="email">Email</label>
                                </div><br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="password" id="password">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div><br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="password2" id="password2">
                                    <label class="mdl-textfield__label" for="password2">Confirm Password</label>
                                </div><br>
                                <input type="submit" id="signupbutton" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="Sign up" name="submit">
                            </form>
                            <div class="mdl-spinner mdl-js-spinner" id="signupspinner"></div>
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

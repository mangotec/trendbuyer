<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="account.js"></script>
        <title>Trendbuyer - <?php echo($_SESSION["username"]); ?></title>
        <?php if(!$_SESSION){echo "<script> location.replace('index.php'); </script>";} ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require("header.php"); ?>
            <main class="mdl-layout__content" style="flex: 1 0 auto;">
                <div class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%; overflow: visible">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Email</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <form name="emailform" id="emailform" method="post">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="email" name="email" id="email">
                                            <label class="mdl-textfield__label" for="email">New email</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit" onclick="$('#emailform').submit();" id="emailbutton">Go</button>
                                    <div class="mdl-spinner mdl-js-spinner" id="emailspinner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%; overflow: visible">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Password</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <form name="passwordform" id="passwordform" method="post">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="password" name="password" id="password">
                                            <label class="mdl-textfield__label" for="password">New password</label>
                                        </div>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="password" name="password2" id="password2">
                                            <label class="mdl-textfield__label" for="password2">Confirm password</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit" onclick="$('#passwordform').submit();" id="passwordbutton">Go</button>
                                    <div class="mdl-spinner mdl-js-spinner" id="passwordspinner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%; overflow: visible">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Theme</h2>
                                </div>
                                <div class="mdl-card__supporting-text" style="overflow:visible">
                                    <form name="themeform" id="themeform" method="post">
                                        <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                            <select class="mdl-selectfield__select" id="colour1" name="colour1">
                                                <option value="deep_orange">Deep Orange</option>
                                                <option value="red">Red</option>
                                                <option value="pink">Pink</option>
                                                <option value="purple">Purple</option>
                                                <option value="deep_purple">Deep Purple</option>
                                                <option value="indigo">Indigo</option>
                                                <option value="blue">Blue</option>
                                                <option value="light_blue">Light Blue</option>
                                                <option value="cyan">Cyan</option>
                                                <option value="teal">Teal</option>
                                                <option value="green">Green</option>
                                                <option value="light_green">Light Green</option>
                                                <option value="lime">Lime</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="amber">Amber</option>
                                                <option value="orange">Orange</option>
                                                <option value="brown">Brown</option>
                                                <option value="blue_grey" selected>Blue Grey</option>
                                                <option value="grey">Grey</option>
                                            </select>
                                            <label class="mdl-selectfield__label mdl-color-text--primary" for="colour1">Colour 1</label>
                                        </div>
                                        <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                            <select class="mdl-selectfield__select" id="colour2" name="colour2">
                                                <option value="deep_orange">Deep Orange</option>
                                                <option value="red">Red</option>
                                                <option value="pink">Pink</option>
                                                <option value="purple">Purple</option>
                                                <option value="deep_purple">Deep Purple</option>
                                                <option value="indigo">Indigo</option>
                                                <option value="blue" selected>Blue</option>
                                                <option value="light_blue">Light Blue</option>
                                                <option value="cyan">Cyan</option>
                                                <option value="teal">Teal</option>
                                                <option value="green">Green</option>
                                                <option value="light_green">Light Green</option>
                                                <option value="lime">Lime</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="amber">Amber</option>
                                                <option value="orange">Orange</option>
                                            </select>
                                            <label class="mdl-selectfield__label mdl-color-text--primary" for="colour2">Colour 2</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit" onclick="$('#themeform').submit();" id="themebutton">Go</button>
                                    <div class="mdl-spinner mdl-js-spinner" id="themespinner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col" style="z-index: 0;">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%; overflow: visible">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Delete account</h2>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" id="deletebutton" onclick="deleteaccount()">Delete</button>
                                    <div class="mdl-spinner mdl-js-spinner" id="deletespinner"></div>
                                </div>
                            </div>
                        </div>
                        <div id="toast" class="mdl-js-snackbar mdl-snackbar">
                            <div class="mdl-snackbar__text"></div>
                            <button class="mdl-snackbar__action" type="button"></button>
                        </div>
                    </div>
                </div>
            </main>
            <?php require("footer.php"); ?>
        </div>
    </body>
</html>

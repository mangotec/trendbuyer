<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="account.js"></script>
        <title>Trendbuyer - Premium</title>
        <?php if(!$_SESSION){echo "<script> location.replace('index.php'); </script>";} ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require("header.php"); ?>
            <main class="mdl-layout__content" style="flex: 1 0 auto;">
                <div class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Trendbuyer Premium</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    Subscribe to Trendbuyer Premium for £2.99 a month for exclusive features such as unlimited inventory items, themes and more!
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="RLBXLZ75K7YJE">
                                        <input type="hidden" name="notify_url" value="https://www.trendbuyer.xyz/ipn.php/">
                                        <input type="hidden" name="custom" value="<?php echo $_SESSION['id']; ?>">
                                        <input type="submit" class="mdl-button mdl-js-button mdl-button--accent" border="0" name="submit" value="Subscribe">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                                    </form>
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

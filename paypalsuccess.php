<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <title>Trendbuyer - Thank You</title>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require("header.php"); ?>
            <main class="mdl-layout__content" style="flex: 1 0 auto;">
                <div class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col">
                            <h1>Thank you</h1>
                            Thanks for signing up for Trendbuyer Premium. Your account should update shortly. If it doesn't, contact trendbuyer@mangotec.co.uk and I will sort it out.
                        </div>
                    </div>
                </div>
            </main>
            <?php require("footer.php"); ?>
        </div>
    </body>
</html>

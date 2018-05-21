<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="getleaderboard.js"></script>
        <script src="getinventory.js"></script>
        <script src="sell.js"></script>
        <title>Trendbuyer - Dashboard</title>
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
                                    <h2 class="mdl-card__title-text">Enter a keyword</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <form name="keywordform" action="keyword.php" id="keywordform" method="get">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="kw" id="kw">
                                            <label class="mdl-textfield__label" for="kw">Keyword</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit" onclick="$('#keywordform').submit();">Go</button>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-shadow--2dp" style="overflow-x: auto; white-space: nowrap;">
                                <div class="mdl-spinner mdl-js-spinner is-active" id="inventoryspinner"></div>
                                <table class="mdl-data-table mdl-js-data-table" style="display:none" id="inventorytable">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Trend</th>
                                            <th>Bought</th>
                                            <th>Value</th>
                                            <th class="mdl-data-table__cell--non-numeric">Sell</th>
                                        </tr>
                                    </thead>
                                    <tbody id="inventorytbody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-shadow--2dp" style="overflow-x: auto; white-space: nowrap;">
                                <div class="mdl-spinner mdl-js-spinner is-active" id="leaderboardspinner"></div>
                                <table class="mdl-data-table mdl-js-data-table" style="display:none" id="leaderboardtable">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th class="mdl-data-table__cell--non-numeric">User</th>
                                            <th>Trendcoin</th>
                                        </tr>
                                    </thead>
                                    <tbody id="leaderboardtbody"></tbody>
                                </table>
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

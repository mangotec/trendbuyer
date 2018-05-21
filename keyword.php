<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <?php require("include.php"); ?>
        <script src="buy.js"></script>
        <script src="getgraph.js"></script>
        <script>var kw = '<?php echo $_GET['kw']; ?>';</script>
        <title>Trendbuyer - <?php echo($_GET['kw']); ?></title>
        <?php if(!$_SESSION){echo "<script> location.replace('index.php'); </script>";} ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require("header.php"); ?>
            <main class="mdl-layout__content" style="flex: 1 0 auto;">
                <div class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col">
                            <div class="mdl-card mdl-shadow--2dp" id="graphcard" style="width:100%; overflow: visible">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text"><?php echo($_GET['kw']); ?></h2>
                                </div>
                                <div class="mdl-card__supporting-text" id="spinnersect">
                                    <div class="mdl-spinner mdl-js-spinner" id="graphspinner"></div>
                                </div>
                                <div class="mdl-card__media" id="graphsect">
                                    <canvas id="graph" style="position: relative"></canvas>
                                </div>
                                <div class="mdl-card__supporting-text" id="selectsect" style="overflow: visible">
                                    <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label" style="z-index: 3">
                                        <select class="mdl-selectfield__select" id="timeframe" name="timeframe">
                                            <option value="today 12-m">Year</option>
                                            <option value="today 1-m">Month</option>
                                            <option value="now 7-d">Week</option>
                                            <option value="now 1-d">Day</option>
                                        </select>
                                        <label class="mdl-selectfield__label mdl-color-text--primary" for="timeframe">Timeframe</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col" style="z-index:0">
                            <div class="mdl-card mdl-shadow--2dp" style="width:100%">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Buy <?php echo($_GET['kw']); ?></h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <form name="buyform" id="buyform" method="post">
                                        <input type="text" style="display:none" name="kw" value="<?php echo($_GET['kw']); ?>">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="number" name="amount" id="amount">
                                            <label class="mdl-textfield__label" for="amount">Amount</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit" onclick="$('#buyform').submit();" id="buybutton">Go</button>
                                    <div class="mdl-spinner mdl-js-spinner" id="buyspinner"></div>
                                </div>
                            </div>
                            <script>
                                function validateForm() {
                                    var kw = document.forms["buyform"]["kw"].value,
                                        amount = document.forms["buyform"]["amount"].value,
                                        snackbarContainer = document.querySelector('#toast');
                                    if (kw == "" || amount == "") {
                                        var sdata = {message: 'All fields must be filled in. '};
                                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                                        return false;
                                    }
                                    else {
                                        return true;
                                    }
                                }
                            </script>
                        </div>
                        <div id="toast" class="mdl-js-snackbar mdl-snackbar">
                            <div class="mdl-snackbar__text"></div>
                            <button class="mdl-snackbar__action" type="button"></button>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col"></div>
                    </div>
                </div>
            </main>
            <?php require("footer.php"); ?>
        </div>
    </body>
</html>

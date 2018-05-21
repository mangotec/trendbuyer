<header class="mdl-layout__header" id="header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Trendbuyer<?php if ($premium) {echo " Premium";} ?></span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <?php
            if ($_SESSION) {
                $username = $_SESSION["username"];
                echo("
                <a class='mdl-navigation__link' href='account.php'>$username</a>
                <a class='mdl-navigation__link' href='dashboard.php'>Dashboard</a>
                <a class='mdl-navigation__link' href='signout.php'>Sign out</a>
                ");
            }
            else {
                echo("
                <a class='mdl-navigation__link' href='index.php'>Sign up</a>
                <a class='mdl-navigation__link' href='signin.php'>Sign in</a>
                ");
            } ?>

        </nav>
        <nav class="mdl-navigation">
            <span id="trendcoin"></span>
        </nav>
    </div>
</header>
<div class="mdl-layout__drawer mdl-layout--small-screen-only">
    <?php
    if ($_SESSION) {
        $username = $_SESSION["username"];
        echo("
        <span class='mdl-layout-title'>$username</span>
        <nav class='mdl-navigation'>
            <a class='mdl-navigation__link' href='dashboard.php'>Dashboard</a>
            <a class='mdl-navigation__link' href='account.php'>Account</a>
            <a class='mdl-navigation__link' href='signout.php'>Sign out</a>
        </nav>
        ");
    }
    else {
        echo("
        <nav class='mdl-navigation'>
            <a class='mdl-navigation__link' href='index.php'>Sign up</a>
            <a class='mdl-navigation__link' href='signin.php'>Sign in</a>
        </nav>
        ");
    } ?>
</div>
<script>
function gettrendcoin() {
    $.ajax({
        type: 'POST',
        url: 'gettrendcoin.php',
        success: function(data) {
            if(data != "") {
                document.getElementById("trendcoin").innerHTML = "<b>"+data+" Trendcoin</b>";
            }
        }
    });
}
gettrendcoin();
</script>

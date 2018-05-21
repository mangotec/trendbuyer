<?php
if ($_SESSION) {
    require_once 'db.php';
    $id = $_SESSION["id"];
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $premiumexp = mysqli_result($result, 0, 'premium');
        $theme = mysqli_result($result, 0, 'theme');
        if ($premiumexp > time()) {
            $premium = true;
        }
        else {
            $premium = false;
        }
    }
    else {
        $theme = "blue_grey-blue";
    }
}
else {
    $premium = false;
}
 ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.<?php if ($_SESSION) {echo ($theme);} else {echo ("blue_grey-blue");} ?>.min.css" id="mdlcss" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script defer src="mdl-selectfield.min.js"></script>
<link rel="stylesheet" href="mdl-selectfield.min.css" />
<span id="primarycolour" style="display:none" class="mdl-color-text--primary"></span>
<span id="accentcolour" style="display:none" class="mdl-color-text--accent"></span>
<meta name="theme-color" content="#607D8B">
<meta name="description" content="A game for buying and selling Google search trends">
<script>
function getPrimaryColour() {
    return getComputedStyle(document.getElementById('primarycolour'))["color"];
}
function getAccentColour() {
    return getComputedStyle(document.getElementById('accentcolour'))["color"];
}
document.querySelector("meta[name=theme-color]").setAttribute("content", getPrimaryColour());
</script>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107276564-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-107276564-1');
</script>

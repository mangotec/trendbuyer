<?php
include 'googletrends.php';
echo json_encode(getGraph($_GET['kw'], $_GET['tf']));
?>

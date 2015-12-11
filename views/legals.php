<?php
    $title = "Catalogue | Mentions légales";
    ob_start();
?>
    <h1>Mentions légales</h1>
<?php
    $content = ob_get_clean();
    require_once("template.php");
?>
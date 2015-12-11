<?php
    ob_start();
?>
    <header class="head-back">
        <div class="cont-headb clearfix">
            <span style="color : #eee;">Bienvenue, <span style="color : #fe6600;"><?php echo $user['username']; ?></span></span>
            <a href="/admin/assets/php/unlog.php"><b>X</b> Deconnexion</a>
        </div>
    </header>
<?php
    $header = ob_get_clean();
    ob_start();
?>
    <main>
        
    </main>
<?php
    $content = ob_get_clean();
    ob_start();
?>
    <footer id="inner-back">
    </footer>
<?php
    $footer = ob_get_clean();
    require_once("tpl-back.php");
?>
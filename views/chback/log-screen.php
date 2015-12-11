<?php
    ob_start();
?>
    <main class="cont-admin">
        <img src="/assets/img/orange-logo.png" width="160" style="margin-bottom : 20px;" />
        <header class="titre-co">
            <h2>Administration | Catalogue</h2>
        </header>
        <form method="post" action="/login/post" class="form-admin">
            <div class="item-admin">
                <input type="text" name="login" required="required" />
            </div>
            <div class="item-admin">
                <input type="password" name="passwd" required="required" />
            </div>
            <div class="item-admin">
                <button type="submit">
                    Connexion
                </button>
            </div>
        </form>
        <a href="/">Retour au catalogue</a>
    </main>
<?php
    $content = ob_get_clean();
?>
<?php
    require_once("tpl-back.php");
?>
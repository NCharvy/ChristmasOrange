<?php
    ob_start();
?>
    <header class="head-back">
        <div class="cont-headb clearfix">
            <span style="color : #eee;"><a href="/christmasback"><i class="fa fa-home"></i></a>Bienvenue, <span style="color : #fe6600;"><?php echo $user['username']; ?></span></span>
            <a id="logout" href="/logout"><b><i class="fa fa-times"></i></b>Deconnexion</a>
        </div>
    </header>
<?php
    $header = ob_get_clean();
    ob_start();
?>
    <main class="alt-sect"> 
        <div class="tete clearfix">
            <nav id="menu-items">
                <a href="/christmasback">Produits</a><a href="/christmasback/bp-table">Bons plans</a><a href="/christmasback/cat-table">Catégories</a><a href="/christmasback/infos">Informations</a>
            </nav>
            <h2 style="text-align : center;">Modifications des informations générales du catalogue</h2>
        </div>
        <form method="post" enctype="multipart/form-data" action="/christmasback/update-infos">
            <div class="input-alt">
                <p class="alt-lab">Titre du catalogue : </p>
                <input type="text" name="titre"  value="<?php echo utf8_encode($infos->titre); ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Année : </p>
                <input type="text" name="annee" value="<?php echo $infos->annee; ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Copyright : </p>
                <input type="text" name="copy"  value="<?php echo $infos->copy; ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Fond du site : </p>
                <input type="file" name="background" />
            </div>
            <div class="input-alt">
                <button type="submit">
                    Modifier l'offre
                </button>
            </div>
        </form>
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
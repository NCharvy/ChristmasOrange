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
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="alt-re"><i class="fa fa-arrow-left"></i> Retour</a>
        <h2 style="text-align : center;">Création d'offre de remboursement</h2>
        <?php
            if(isset($stateup) && !empty($stateup)){
        ?>
        <p><?php echo $stateup; ?></p>
        <?php
            }
        ?>
        <form method="post" class="form-alt" enctype="multipart/form-data" action="/christmasback/postupcat/<?php echo $categ->id_cat; ?>">
            <div class="input-alt">
                <input type="hidden" name="id_cat" value="<?php echo $categ->id_cat; ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Description de la catégorie : </p>
                <textarea name="description_cat"><?php echo utf8_encode($categ->description_cat); ?></textarea>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Visuel de la catégorie : </p>
                <?php
                    if(isset($categ->image_cat)){
                ?>
                <p><a href="/upload/img/<?php utf8_encode($categ->image_cat); ?>"></a></p>
                <?php
                    }
                ?>
                <input type="file" accept="image/jpeg, image/jpg, image/png" name="img_cat" />
            </div>
            <div class="input-alt">
                <button type="submit">
                    Modifier la catégorie
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
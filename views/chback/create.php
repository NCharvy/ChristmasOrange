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
        <a href="/christmasback" class="alt-re"><i class="fa fa-arrow-left"></i> Retour</a>
        <h2 style="text-align : center;">Création de produit</h2>
        <?php
            if(isset($statecr) && !empty($statecr)){
        ?>
        <p><?php echo $statecr; ?></p>
        <?php
            }
        ?>
        <form method="post" class="form-alt" enctype="multipart/form-data" action="/christmasback/postcr">
            <div class="input-alt">
                <p class="alt-lab">Nom du produit : </p>
                <input type="text" name="nom_prod" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Description du produit : </p>
                <textarea name="desc_prod"></textarea>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Prix du produit : </p>
                <input type="text" name="prix_prod" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Image du produit : </p>
                <input type="file" accept="image/png, image/jpg" name="img_prod" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Vidéo de présentation/test : </p>
                <input type="file" accept="video/avi, video/mp4, video/ogg" name="vid_prod" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Sélection : </p>
                Oui <input type="checkbox" name="select_prod" value="oui" />
                Non <input type="checkbox" name="select_prod" value="non" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Catégorie : </p>
                <select name="cat_prod">
                    <?php
                        foreach($categories as $c){
                    ?>
                    <option value="<?php echo $c->id_cat; ?>"><?php echo utf8_encode($c->nom_cat); ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="input-alt">
                <button type="submit">
                    Créer le produit
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
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
        <h2 style="text-align : center;">Modifications du produit : <?php echo utf8_encode($prod->nom_prod); ?></h2>
        <?php
            if(isset($stateup) && !empty($stateup)){
        ?>
        <p><?php echo $stateup; ?></p>
        <?php
            }
        ?>
        <form method="post" class="form-alt" enctype="multipart/form-data" action="/christmasback/postup/<?php echo $prod->ref_prod; ?>">
            <div class="input-alt">
                <input type="hidden" name="id" value="<?php echo $prod->ref_prod; ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Nom du produit : </p>
                <input type="text" name="nom_prod" value="<?php echo utf8_encode($prod->nom_prod); ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Description du produit : </p>
                <textarea name="desc_prod"><?php echo utf8_encode($prod->description); ?></textarea>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Prix du produit : </p>
                <input type="text" name="prix_prod" value="<?php echo utf8_encode($prod->prix); ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Image du produit : </p>
                <img src="/upload/img/<?php echo $prod->image_prod; ?>" width="120" style="display : block;" />
                <input type="file" name="img_prod" accept="image/png, image/jpg" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Vidéo de présentation/test : </p>
                <video width="480" height="260" controls="controls">
                    <source src="/assets/videos/<?php echo $prod->test_video; ?>" type="video/avi" />
                    <!--<object width="480" height="260" data="http://www.youtube.com/watch?v=hoca3w_Z5RA"> 
                        <param name="movie" value="http://www.youtube.com/watch?v=hoca3w_Z5RA" />
                        <param name="wmode" value="transparent" />
                        Vous n'avez ni Flash ni une version assez récente de votre navigateur...
                    </object>-->
                </video>
                <input type="file" name="vid_prod" accept="video/avi, video/mp4, video/ogg" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Sélection : </p>
                <input type="checkbox" name="select_prod" value="oui" <?php if($prod->selection == 1){ echo 'checked'; } ?> />
                <input type="checkbox" name="select_prod" value="non" <?php if($prod->selection == 0){ echo 'checked'; } ?> />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Catégorie : </p>
                <select name="cat_prod">
                    <option value="<?php echo $prod->id_cat; ?>"><?php echo $prod->nom_cat; ?></option>
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
                    Modifier le produit
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
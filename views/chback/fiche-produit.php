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
        <h2 style="text-align : center;">Fiche produit de : <?php echo utf8_encode($prod->nom_prod); ?></h2>
        <section id="fiche-sect">
            <div class="cont-fiche">
                <p><span class="head-fiche">Description : </span><br /><br /><?php echo utf8_encode($prod->description); ?></p>
                <p><span class="head-fiche">Prix : </span>A partir de <?php echo utf8_encode($prod->prix); ?></p>
                <p><span class="head-fiche">Image : </span><br /><br /><img src="/upload/img/<?php echo utf8_encode($prod->image_prod); ?>" /></p>
                <?php
                    if(!empty($prod->test_video)){
                ?>
                <p><span class="head-fiche">Vidéo : </span><br /><br />
                    <video width="400" height="220" controls="controls">
                        <source src="/upload/video/test.avi" type="video/avi" />
                        <source src="/upload/video/test.mp4" type="video/mp4" />
                        <source src="/upload/video/test.ogv" type="video/ogg" />
                        <object width="480" height="260" data="http://www.youtube.com/watch?v=hoca3w_Z5RA"> 
                            <param name="movie" value="http://www.youtube.com/watch?v=hoca3w_Z5RA" />
                            <param name="wmode" value="transparent" />
                            Vous n'avez ni Flash ni une version assez récente de votre navigateur...
                        </object>
                    </video>
                </p>
                <?php
                    }
                ?>
                <p><span class="head-fiche">Sélection tendance : </span><?php if($prod->selection == 1){ echo "Oui"; } else if($prod->selection == 0){ echo "Non"; } ?></p>
                <p><span class="head-fiche">Catégorie : </span><?php echo utf8_encode($prod->nom_cat); ?></p>
            </div>
        </section>
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
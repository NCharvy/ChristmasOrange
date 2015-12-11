<?php
    $title = "Catalogue | Produit";
    ob_start();
?>
    <main>
        <h1><?php echo utf8_encode($prodsolo->nom_prod); ?></h1>
        <a class="return" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-arrow-left"></i> Retour</a>
        <section id="sect-prod">
            <div class="info-prod">
                <?php
                    if(isset($prodsolo->video_test) && !empty($prodsolo->video_test)){
                ?>
                <article id="art-vid">
                    <p style="text-align : center;">Vidéo de présentation du produit</p>
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
                </article>
                <?php
                    }
                ?>
                <div class="clearfix">
                    <img src="/upload/img/<?php echo utf8_encode($prodsolo->img_prod); ?>" />
                    <div id="prod-info">
                        <ul>
                            <li><p style="margin : 0; font-weight : bold; font-size : 16px; margin-bottom : 10px;">Description : </p><?php echo utf8_encode($prodsolo->description); ?></li>
                            <li><p style="margin : 0; margin-top : 10px;">A partir de <span style="font-weight : bold;"><?php echo utf8_encode($prodsolo->prix); ?></span></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    $content = ob_get_clean();
    require_once("template.php");
?>
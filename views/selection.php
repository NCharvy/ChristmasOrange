<?php
    $title = "Catalogue | Sélection tendance";
    ob_start();
?>
    <main>
        <h1>Sélection tendance 2015</h1>
        <a id="return-cat" class="return" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-arrow-left"></i> Retour</a>
        <section id="sect-cat" class="clearfix">
            <?php
                foreach($tend as $t){
            ?>
            <article class="item-prod">
                <h3><a href="/produit/<?php echo $t->ref_prod; ?>"><?php echo utf8_encode($t->nom_prod); ?></a></h3>
                <p id="p-img"><img src="/upload/img/<?php echo utf8_encode($t->image_prod); ?>" /></p>
                <p id="p-prix">A partir de <?php echo utf8_encode($t->prix); ?></p>
            </article>
            <?php
                }
            ?>
        </section>
    </main>
<?php
    $content = ob_get_clean();
    require_once("template.php");
?>
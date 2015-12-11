<?php
    $title = "Catalogue | " . utf8_encode($name->nom_cat);
    ob_start();
?>
    <main>
        <h1><?php echo utf8_encode($name->nom_cat); ?></h1>
        <a id="return-cat" class="return" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-arrow-left"></i> Retour</a>
        <section id="sect-cat" class="clearfix">
            <?php
                foreach($prods as $p){
            ?>
            <article class="item-prod">
                <h3><a href="/produit/<?php echo $p->ref_prod; ?>"><?php echo utf8_encode($p->nom_prod); ?></a></h3>
                <p id="p-img"><img src="/upload/img/<?php echo utf8_encode($p->image_prod); ?>" /></p>
                <p id="p-prix">A partir de <?php echo utf8_encode($p->prix); ?></p>
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
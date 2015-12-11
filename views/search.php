<?php
    $title = "Catalogue | Recherche";
    ob_start();
?>
    <main>
        <h1>Résultat de vos recherches</h1>
        <a id="return-cat" class="return" href="/"><i class="fa fa-arrow-left"></i> Retour</a>
        <section id="sect-cat" class="clearfix">
            <?php
                foreach($result as $r){
            ?>
            <article class="item-prod">
                <h3><a href="/produit/<?php echo $r->ref_prod; ?>"><?php echo utf8_encode($r->nom_prod); ?></a></h3>
                <p id="p-img"><img src="/upload/img/<?php echo utf8_encode($r->image_prod); ?>" /></p>
                <p id="p-prix">A partir de <?php echo utf8_encode($r->prix); ?></p>
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
<?php
    $title = "Catalogue | ".utf8_encode($them->nom_them);
    ob_start();
?>
    <main>
        <div class="categ">
            <h1><?php echo utf8_encode($them->nom_them); ?></h1>
        </div>
        <h2><a href="/bons-plans/<?php echo $them->id_them; ?>">Les bons plans</a></h2>
        <div id="return-them">
            <a class="return" href="/"><i class="fa fa-arrow-left"></i> Retour</a>
        </div>
        <section class="clearfix">
                <?php
                    $i = 1;
                    foreach($cat as $c){
                ?>
                <div id="block-cat-<?php echo $i++; ?>" class="clearfix block-cat">
                    <h3><a href="<?php echo utf8_encode($them->link); ?>/<?php echo utf8_encode($c->route_cat); ?>"><?php echo utf8_encode($c->nom_cat); ?></a></h3>
                    <div class="clearfix block-scat">
                        <p><?php echo utf8_encode($c->description_cat); ?></p><img src="<?php echo $c->image_cat; ?>" />
                    </div>
                </div>
                <?php
                    }
                ?>
        </section>
    </main>
<?php
    $content = ob_get_clean();
    require_once("template.php");
?>
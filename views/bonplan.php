<?php
    $title = "Catalogue | Bons plans";
    ob_start();
?>
    <main>
        <div class="categ">
            <h1>Bons plans</h1>
        </div>
        <a class="return" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-arrow-left"></i> Retour</a>
        <section id="sect-cat" class="clearfix">
            <?php
                foreach($bpcat as $bpc){
            ?>
            <article class="item-prod">
                <h3><a href="/produit/<?php echo $bpc->ref_prod; ?>"><?php echo utf8_encode($bpc->nom_prod); ?></a></h3>
                <p>Offre : <?php echo utf8_encode($bpc->nom_ope); ?></p>
                <p><a href="/upload/coupons/<?php echo $bpc->coupon; ?>">Télécharger le coupon</a></p>
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
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
            if(isset($statecr) && !empty($statecr)){
        ?>
        <p><?php echo $statecr; ?></p>
        <?php
            }
        ?>
        <form method="post" class="form-alt" enctype="multipart/form-data" action="/christmasback/postcrbp">
            <div class="input-alt">
                <p class="alt-lab">Nom du produit affecté : </p>
                <select name="ref_prod">
                    <?php
                        foreach($produits as $p){
                    ?>
                    <option value="<?php echo $p->ref_prod; ?>"><?php echo utf8_encode($p->nom_prod); ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Description de l'offre : </p>
                <textarea name="desc_ope"></textarea>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Coupon de réduction : </p>
                <input type="file" accept="application/pdf" name="coupon" />
            </div>
            <div class="input-alt">
                <button type="submit">
                    Créer l'offre
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
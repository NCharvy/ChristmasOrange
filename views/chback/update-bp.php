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
            if(isset($stateup) && !empty($stateup)){
        ?>
        <p><?php echo $stateup; ?></p>
        <?php
            }
        ?>
        <form method="post" class="form-alt" enctype="multipart/form-data" action="/christmasback/postupbp/<?php echo $bplan->id_ope; ?>">
            <div class="input-alt">
                <input type="hidden" name="id_ope" value="<?php echo $bplan->id_ope; ?>" />
            </div>
            <div class="input-alt">
                <p class="alt-lab">Nom du produit affecté : </p>
                <select name="ref_prod">
                    <option value="<?php echo $bplan->ref_prod; ?>"><?php echo utf8_encode($bplan->nom_prod); ?></option>
                    <?php
                        foreach($produits as $p):
                    ?>
                    <option value="<?php echo $p->ref_prod; ?>"><?php echo utf8_encode($p->nom_prod); ?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Description de l'offre : </p>
                <textarea name="desc_ope"><?php echo utf8_encode($bplan->nom_ope); ?></textarea>
            </div>
            <div class="input-alt">
                <p class="alt-lab">Coupon de réduction : </p>
                <?php
                    if(isset($bplan->coupon)){
                ?>
                <p><a href="/upload/coupon/<?php utf8_encode($bplan->coupon); ?>"></a></p>
                <?php
                    }
                ?>
                <input type="file" accept="application/pdf" name="coupon" />
            </div>
            <div class="input-alt">
                <button type="submit">
                    Modifier l'offre
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
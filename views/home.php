<?php
    $title = "Catalogue de noël Orange";
    ob_start();
?>
    <h1>Catalogue de noël Orange</h1>
    <div id="slide-bp">
        <div u="slides" id="slides">
            <?php
                foreach($prod as $p){
            ?>
            <div><a href="/produit/<?php echo $p->ref_prod; ?>"><img u="image" src="/assets/img/spinpadgrip-support-tablette.jpg" /></a></div>
            <?php
                }
            ?>
        </div>
        <span data-u="arrowleft" class="jssora12l" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" data-autocenter="2"></span>
    </div>
    <nav id="nav-them" class="clearfix">
        <?php
            foreach($homedb as $h){
        ?>
        <div class="nav-popout" style="background-image : url('assets/img/<?php echo $h->img_them; ?>'); background-size : 150px 150px;"><p><a href="<?php echo $h->link; ?>"><?php echo utf8_encode($h->nom_them); ?></a></p></div>
        <?php
            }
        ?>
    </nav>
<?php
    $content = ob_get_clean();
    require_once("template.php");
?>
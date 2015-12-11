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
    <main>
        <div class="tete clearfix">
            <nav id="menu-items">
                <a href="/christmasback">Produits</a><a href="/christmasback/bp-table">Bons plans</a><a href="/christmasback/cat-table">Catégories</a>
            </nav>
            <h2 style="text-align : center;">Liste des catégories</h2>
            <?php
                if(isset($stateup) && !empty($stateup)){
            ?>
            <p class="etat"><?php echo $stateup; ?></p>
            <?php
                }
            ?>
        </div>
        <table id="cat-table">
            <tr>
                <th>Nom catégorie</th>
                <th>Description</th>
                <th>Opération</th>
            </tr>
            <?php
                foreach($categories as $cat){
            ?>
            <tr>
                <td><?php echo utf8_encode($cat->nom_cat); ?></td>
                <td><?php echo utf8_encode($cat->description_cat); ?></td>
                <td align="center"><a href="/christmasback/upcat/<?php echo $cat->id_cat; ?>"><i class="fa fa-pencil"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </table>
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
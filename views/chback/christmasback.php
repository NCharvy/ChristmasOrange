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
            <h2 style="text-align : center;">Liste des produits du catalogue</h2>
            <?php
                if(isset($statedel) && !empty($statedel)){      
            ?>
            <p class="etat"><?php echo $statedel; ?></p>
            <?php
                }
                else if(isset($stateup) && !empty($stateup)){
            ?>
            <p class="etat"><?php echo $stateup; ?></p>
            <?php
                }
                else if(isset($statecr) && !empty($statecr)){
            ?>
            <p class="etat"><?php echo $statecr; ?></p>
            <?php
                }
            ?>
            <a href="/christmasback/create" class="add">Nouveau produit<i class="fa fa-plus-square"></i></a>
        </div>
        <table id="prod-table">
            <thead>
                <th>Nom</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Opérations</th>
            </thead>
            <?php
                foreach($products as $pr){
            ?>
            <tr>
                <td><?php echo utf8_encode($pr->nom_prod); ?></td>
                <td><?php echo utf8_encode($pr->description); ?></td>
                <td><?php echo utf8_encode($pr->nom_cat); ?></td>
                <td align="center"><a href="/christmasback/fiche/<?php echo $pr->ref_prod; ?>"><i class="fa fa-file"></i></a> <a href="/christmasback/up/<?php echo $pr->ref_prod; ?>"><i class="fa fa-pencil"></i></a> <a href="/christmasback/del/<?php echo $pr->ref_prod; ?>"><i class="fa fa-trash"></i></a></td>
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
<?php
    require_once("connect.php");
    function connect_db(){
        $dsn = "mysql:dbname=".BASE.";host=".SERVER;
        try{
            $bdd = new PDO($dsn, USER, PASSWD);
        }
        catch(PDOException $e){
            printf("Echec de connexion : %s\n", $e->getMessage());
            exit();
        }
        return $bdd;
    }

    function get_home(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique";
        
        $results = $bdd->query($sql);
        $homedb = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $homedb;
    }

    function get_infos(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM infos WHERE id_cata = 1";
        
        $result = $bdd->query($sql);
        $infos = $result->fetch(PDO::FETCH_OBJ);
        
        return $infos;
    }

    function update_infos($titre, $annee, $copy){
        $bdd = connect_db();
        
        $sql = "UPDATE infos SET titre = :titre, annee = :annee, copy = :copy WHERE id_cata = 1";
        $result = $bdd->prepare($sql);
        $result->bindParam(':titre', $titre);
        $result->bindParam(':annee', $annee);
        $result->bindParam(':copy', $copy);
        $upinfos = $result->execute();
        
        return $upinfos;
    }

    function update_background($bck){
        $bdd = connect_db();
        
        $sql = "UPDATE infos SET background = :bck WHERE id = 1";
        $result = $bdd->prepare($sql);
        $result->bindParam(':bck', $bck);
        $upback = $result->execute();
        
        return $upback;
    }

    function get_them($id){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique WHERE id_them = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $them = $result->fetch(PDO::FETCH_OBJ);
        
        return $them;
    }

    function get_produits(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit WHERE selection = 1";
        
        $results = $bdd->query($sql);
        $prod = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $prod;
    }

    function get_produits_cat($cat){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit p INNER JOIN categorie c ON p.id_cat = c.id_cat WHERE route_cat = :cat";
        
        $results = $bdd->prepare($sql);
        $results->bindParam(':cat', $cat);
        $results->execute();
        $prodcat = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $prodcat;
    }

    function get_selection(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit WHERE selection = 1";
        $results = $bdd->query($sql);
        $ptend = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $ptend;
    }

    function get_prod_by_ref($ref){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit WHERE ref_prod = :ref";
        $result = $bdd->prepare($sql);
        $result->bindParam(':ref', $ref);
        $result->execute();
        $sprod = $result->fetch(PDO::FETCH_OBJ);
        
        return $sprod;
    }

    function get_indispmod(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique WHERE id_them = 1";
        
        $results = $bdd->query($sql);
        $utiles = $results->fetch(PDO::FETCH_OBJ);
        
        return $utiles;
    }

    function get_ind_cat(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie c INNER JOIN thematique t ON c.id_them = t.id_them WHERE c.id_them = 1";
        
        $results = $bdd->query($sql);
        $indcat = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $indcat;
    }

    function get_utiles(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique WHERE id_them = 2";
        $results = $bdd->query($sql);
        $utiles = $results->fetch(PDO::FETCH_OBJ);
        
        return $utiles;
    }

    function get_utl_cat(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie c INNER JOIN thematique t ON c.id_them = t.id_them WHERE c.id_them = 2";
        
        $results = $bdd->query($sql);
        $utlcat = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $utlcat;
    }

    function get_tendance(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique WHERE id_them = 3";
        $results = $bdd->query($sql);
        $tendance = $results->fetch(PDO::FETCH_OBJ);
        
        return $tendance;
    }

    function get_fun(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM thematique WHERE id_them = 4";
        $results = $bdd->query($sql);
        $fun = $results->fetch(PDO::FETCH_OBJ);
        
        return $fun;
    }

    function get_cat_name($cat){
        $bdd = connect_db();
        
        $sql = "SELECT nom_cat FROM categorie WHERE route_cat = :cat";
        $result = $bdd->prepare($sql);
        $result->bindParam(':cat', $cat);
        $result->execute();
        $catname = $result->fetch(PDO::FETCH_OBJ);
        
        return $catname;
    }

    function get_td_cat(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie c INNER JOIN thematique t ON c.id_them = t.id_them WHERE c.id_them = 3";
        
        $results = $bdd->query($sql);
        $tdcat = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $tdcat;
    }

    function get_fun_cat(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie c INNER JOIN thematique t ON c.id_them = t.id_them WHERE c.id_them = 4";
        
        $results = $bdd->query($sql);
        $funcat = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $funcat;
    }

    function get_search($search){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit WHERE nom_prod LIKE '%$search%'";
        $results = $bdd->query($sql);
        $psearch = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $psearch;
    }

    function get_bp($id){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM operation o INNER JOIN produit p ON o.ref_prod = p.ref_prod INNER JOIN categorie c ON p.id_cat = c.id_cat INNER JOIN thematique t ON c.id_them = t.id_them WHERE t.id_them = :id";
        $results = $bdd->prepare($sql);
        $results->bindParam(':id', $id);
        $results->execute();
        $bps = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $bps;
    }

/** Partie back-office */

    function get_logs($l, $p){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM christmasroot WHERE ch_login = :log AND ch_passwd = :pass";
        $result = $bdd->prepare($sql);
        $result->bindParam(':log', $l, PDO::PARAM_STR);
        $result->bindParam('pass', $p, PDO::PARAM_STR);
        $result->execute();
        $ch_connect = $result->fetch(PDO::FETCH_OBJ);
        
        return $ch_connect;
    }

    function create_produit($np, $dp, $pp, $ip, $sp, $ict){
        $bdd = connect_db();
        
        $sql = "INSERT INTO produit(nom_prod, description, prix, image_prod, selection, id_cat) VALUES(:n, :d, :p, :i, :s, :ic)";
        $results = $bdd->prepare($sql);
        $results->bindParam(':n', $np);
        $results->bindParam(':d', $dp);
        $results->bindParam(':p', $pp);
        $results->bindParam(':i', $ip);
        $results->bindParam(':s', $sp);
        $results->bindParam(':ic', $ict);
        
        $crprod = $results->execute();
        
        return $crprod;
    }

    function create_produit_with_vid($np, $dp, $pp, $ip, $vp, $sp, $ict){
        $bdd = connect_db();
        
        $sql = "INSERT INTO produit(nom_prod, description, prix, image_prod, test_video, selection, id_cat) VALUES(:n, :d, :p, :i, :v, :s, :ic)";
        $results = $bdd->prepare($sql);
        $results->bindParam(':n', $np);
        $results->bindParam(':d', $dp);
        $results->bindParam(':p', $pp);
        $results->bindParam(':i', $ip);
        $results->bindParam(':v', $vp);
        $results->bindParam(':s', $sp);
        $results->bindParam(':ic', $ict);
        
        $crprod = $results->execute();
        
        return $crprod;
    }

    function update_produit($rp, $np, $dp, $pp, $sp, $ict){
        $bdd = connect_db();
        
        $sql = "UPDATE produit SET nom_prod= :n, description = :d, prix = :p, selection = :s, id_cat = :ic WHERE ref_prod = :rp";
        $results = $bdd->prepare($sql);
        $results->bindParam(':n', $np);
        $results->bindParam(':d', $dp);
        $results->bindParam(':p', $pp);
        $results->bindParam(':s', $sp);
        $results->bindParam(':ic', $ict);
        $results->bindParam(':rp', $rp);
        $upprod = $results->execute();
        
        return $upprod;
    }

    function update_produit_img($rp, $ip){
        $bdd = connect_db();
        
        $sql = "UPDATE produit SET image_prod = :i WHERE ref_prod = :rp";
        $results = $bdd->prepare($sql);
        $results->bindParam(':i', $ip);
        $results->bindParam(':rp', $rp);
        $upimg = $results->execute();
        
        return $upimg;
    }

    function update_produit_vid($rp, $vp){
        $bdd = connect_db();
        
        $sql = "UPDATE produit SET test_video = :v WHERE ref_prod = :rp";
        $results = $bdd->prepare($sql);
        $results->bindParam(':v', $vp);
        $results->bindParam(':rp', $rp);
        $upvid = $results->execute();
        
        return $upvid;
    }

    function get_prods(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit p INNER JOIN categorie c ON p.id_cat = c.id_cat";
        
        $results = $bdd->query($sql);
        $prods = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $prods;
    }

    function get_prod_up($ref){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit p INNER JOIN categorie c ON p.id_cat = c.id_cat WHERE ref_prod = :ref";
        $result = $bdd->prepare($sql);
        $result->bindParam(':ref', $ref);
        $result->execute();
        
        $produp = $result->fetch(PDO::FETCH_OBJ);
        
        return $produp;
    }

    /*function get_cat_up($ref){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie MINUS SELECT * FROM categorie c INNER JOIN produit p ON c.id_cat = p.id_cat WHERE ref_prod = :ref";
        $result = $bdd->prepare($sql);
        $result->bindParam(':ref', $ref);
        $result->execute();
        
        $cats = $result->fetchAll(PDO::FETCH_OBJ);
        
        return $cats;
    }*/

    function get_cat_up(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie";
        $result = $bdd->query($sql);
        
        $cats = $result->fetchAll(PDO::FETCH_OBJ);
        
        return $cats;
    }

    function get_categ_up($id){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie WHERE id_cat = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $cat = $result->fetch(PDO::FETCH_OBJ);
        
        return $cat;
    }

    function delete_prod_by_ref($ref){
        $bdd = connect_db();
        
        $sql = "DELETE FROM produit WHERE ref_prod = :ref";
        $result = $bdd->prepare($sql);
        $result->bindParam(':ref', $ref);
        $delprod = $result->execute();
        
        return $delprod;
    }

    function get_bp_solo($id){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM operation WHERE id_ope = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $bps = $result->fetch(PDO::FETCH_OBJ);
        
        return $bps;
    }

    function get_bp_table(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM operation o INNER JOIN produit p ON o.ref_prod = p.ref_prod";
        $results = $bdd->query($sql);
        $bps = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $bps;
    }

    function create_ope($d, $cp, $rp){
        $bdd = connect_db();
        
        $sql = "INSERT INTO operation(nom_ope, coupon, ref_prod) VALUES(:d, :cp, :rp)";
        $result = $bdd->prepare($sql);
        $result->bindParam(':d', $d);
        $result->bindParam(':cp', $cp);
        $result->bindParam(':rp', $rp);
        $crope = $result->execute();
        
        return $crope;
    }

    function update_ope($id, $d, $rp){
        $bdd = connect_db();
        
        $sql = "UPDATE operation SET nom_ope = :d, ref_prod = :rp WHERE id_ope = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':d', $d);
        $result->bindParam(':rp', $rp);
        $result->bindParam(':id', $id);
        $upope = $result->execute();
        
        return $upope;
    }

    function update_ope_coupon($id, $cp){
        $bdd = connect_db();
        
        $sql = "UPDATE operation SET coupon = :cp WHERE id_ope = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':cp', $cp);
        $result->bindParam(':id', $id);
        $upcp = $result->execute();
        
        return $upcp;
    }

    function delete_ope_by_id($id){
        $bdd = connect_db();
        
        $sql = "DELETE FROM operation WHERE id_ope = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':id', $id);
        $dlcp = $result->execute();
        
        return $dlcp;
    }

    function get_bp_up($id){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM operation o INNER JOIN produit p ON o.ref_prod = p.ref_prod WHERE id_ope = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $bp = $result->fetch(PDO::FETCH_OBJ);
        
        return $bp;
    }
    
    function get_prod_upbp(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM produit";
        $results = $bdd->query($sql);
        $prodbp = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $prodbp;
    }

    function get_categories(){
        $bdd = connect_db();
        
        $sql = "SELECT * FROM categorie WHERE id_cat <> 11";
        $results = $bdd->query($sql);
        $categories = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }

    function update_cat_desc($id, $desc){
        $bdd = connect_db();
        
        $sql = "UPDATE categorie SET description_cat = :desc WHERE id_cat = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':desc', $desc);
        $result->bindParam(':id', $id);
        $upcat = $result->execute();
        
        return $upcat;
    }

    function update_cat_img($id, $img){
        $bdd = connect_db();
        
        $sql = "UPDATE categorie SET image_cat = :img WHERE id_cat = :id";
        $result = $bdd->prepare($sql);
        $result->bindParam(':img', $img);
        $result->bindParam(':id', $id);
        $upcat = $result->execute();
        
        return $upcat;
    }

?>
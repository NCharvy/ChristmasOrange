<?php

    use Silex\Application;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

    class Controller{
        
        private $app;
        private $infos;

        public function __construct(){
            $this->app = new Application();
            $this->app['debug'] = true;
            $this->app->register(new Silex\Provider\TwigServiceProvider(), array(
                'twig.path' => __DIR__.'/../views'
            ));
            $this->infos = get_infos();
        }
        public function display_home(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $homedb = get_home();
            $prod = get_produits();
            
            return  $this->app['twig']->render('/home.html.twig', array('homedb' => $homedb, 'prod' => $prod, 'infos' => $this->infos));
        }
        
        public function display_legal(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            
            return  $this->app['twig']->render('/legals.html.twig', array('infos' => $this->infos));
        }
        
        public function display_bp(Request $req, $id){
            $referer = $_SERVER['HTTP_REFERER'];
            $session = $req->getSession();
            $session->invalidate();
            ob_start();
            $bpcat = get_bp($id);
            $them = get_them($id);
            
            return  $this->app['twig']->render('/bonplan.html.twig', array('bpcat' => $bpcat, 'them' => $them, 'referer' => $referer, 'infos' => $this->infos));
        }
        
        public function display_utiles(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $cat = get_utl_cat();
            $them = get_utiles();
            
            return  $this->app['twig']->render('/thematique.html.twig', array('cat' => $cat, 'them' => $them, 'infos' => $this->infos));
        }
        
        public function display_prod_by_ref(Request $req, $ref){
	    $referer = $_SERVER['HTTP_REFERER'];
            $session = $req->getSession();
            $session->invalidate();
            $prodsolo = get_prod_by_ref($ref);
            
            return  $this->app['twig']->render('/produit.html.twig', array('prodsolo' => $prodsolo, 'infos' => $this->infos, 'referer' => $referer));
        }
        
        public function display_indisp(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $cat = get_ind_cat();
            $them = get_indispmod();
            
            return  $this->app['twig']->render('/thematique.html.twig', array('cat' => $cat, 'them' => $them, 'infos' => $this->infos));
        }
        
        public function display_tendance(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $cat = get_td_cat();
            $them = get_tendance();
            
			return  $this->app['twig']->render('/thematique.html.twig', array('cat' => $cat, 'them' => $them, 'infos' => $this->infos));
        }
        
        public function display_tendance_prod(Request $req){
            $referer = $_SERVER['HTTP_REFERER'];
            $session = $req->getSession();
            $session->invalidate();
            $tend = get_selection();
            
            return  $this->app['twig']->render('/selection.html.twig', array('tend' => $tend, 'referer' => $referer, 'infos' => $this->infos));
        }
        
        public function display_fun(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $cat = get_fun_cat();
            $them = get_fun();
            
            return  $this->app['twig']->render('/thematique.html.twig', array('cat' => $cat, 'them' => $them, 'infos' => $this->infos));
        }
        
        public function display_cat(Request $req, $cat){
            $referer = $_SERVER['HTTP_REFERER'];
            $session = $req->getSession();
            $session->invalidate();
            $name = get_cat_name($cat);
            $prods = get_produits_cat($cat);
            
            return  $this->app['twig']->render('/categorie.html.twig', array('name' => $name, 'prods' => $prods, 'referer' => $referer, 'infos' => $this->infos));
        }
        
        public function post_search(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            $search = $req->get('search');
            $result = get_search($search);
            
            return  $this->app['twig']->render('/search.html.twig', array('result' => $result, 'infos' => $this->infos)); 
        }
        
        
/** Partie back-office */
        
        /*public function display_login(Request $req){
            $app = new Silex\Application();
            $session = $req->getSession();
            $login = $req->server->get('PHP_AUTH_USER', false);
            $passwd = $req->server->get('PHP_AUTH_PW');
            
            $testco = get_logs($login, $passwd);
            
            if($testco->ch_login === $login && $testco->ch_passwd === $passwd){
                $session->set('user', array('username' => $login));
                return $app->redirect('/christmasback');
            }
            $response = new Response();
            $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
            $response->setStatusCode(401, 'Please sign in');
            return $response;
        }*/
        public function display_login(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            ob_start();
            require_once('../views/chback/log-screen.php');
            $login = ob_get_clean();
                
            return $login;
        }
        
        public function post_login(Request $req){
            $session = $req->getSession();
            $login = $req->get('login');
            $passwd = sha1($req->get('passwd'));
            
            $testco = get_logs($login, $passwd);
            
            if($testco->ch_login === $login && $testco->ch_passwd === $passwd){
                $session->set('user', array('username' => $login));
                return $this->app->redirect('/christmasback');
            }
            else{
                return $this->app->redirect('/login');
            }
        }
        
        public function back_logout(Request $req){
            $session = $req->getSession();
            $session->invalidate();
            
            return $this->app->redirect('/login'); 
        }
        
        public function display_backlog(Request $req, $sdel = null, $sup = null, $scr = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($sdel) && !empty($sdel)){
                if($sdel == 'delt'){
                    $statedel = "Suppression effectuée";
                }
                else{
                    $statedel = "La suppression du produit a échoué !";
                }
            }
            if(isset($sup) && !empty($sup)){
                $stateup = "Modification effectuée";
            }
            if(isset($scr) && !empty($scr)){
                $statecr = "Un nouveau produit a été créé !";
            }
            $products = get_prods();
            require_once('../views/chback/christmasback.php');
            $backin = ob_get_clean();
            if(!$backin){
                $this->app->abort(404, "L'administration est introuvable !");
            }
            else{
                return $backin;
            }
            
        }
        
        public function display_backlogbp(Request $req, $sdel = null, $sup = null, $scr = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($sdel) && !empty($sdel)){
                if($sdel == 'delt'){
                    $statedel = "Suppression effectuée";
                }
                else{
                    $statedel = "La suppression du produit a échoué !";
                }
            }
            if(isset($sup) && !empty($sup)){
                $stateup = "Modification effectuée";
            }
            if(isset($scr) && !empty($scr)){
                $statecr = "Un nouveau produit a été créé !";
            }
            $bonsplans = get_bp_table();
            require_once('../views/chback/bp-table.php');
            $backbp = ob_get_clean();
            if(!$backbp){
                $this->app->abort(404, "L'administration est introuvable !");
            }
            else{
                return $backbp;
            }
            
        }
        
        public function display_backlogcat(Request $req, $sup = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($sup) && !empty($sup)){
                $stateup = "Modification effectuée";
            }
            $categories = get_categories();
            require_once('../views/chback/cat-table.php');
            $backcat = ob_get_clean();
            if(!$backcat){
                $this->app->abort(404, "L'administration est introuvable !");
            }
            else{
                return $backcat;
            }
            
        }
        
        public function post_insert(Request $req){
            ob_start();
            $nom = $req->get('nom_prod');
            $desc = $req->get('desc_prod');
            $sprix = $req->get('prix_prod');
			$prix = str_replace('€', '&euro;', $sprix);
            
            $upimg = $req->files->get('img_prod');
            if(isset($upimg) && !empty($upimg)){
                $upimg->move('../upload/img/', $upimg->getClientOriginalName());
                $img = $upimg->getClientOriginalName();
            }
            
            $upvid = $req->files->get('vid_prod');
            if(isset($upvid) && !empty($upvid)){
                
                $upvid->move('../upload/video/', $upvid->getClientOriginalName());
                $video = $upvid->getClientOriginalName();
            }
            
            if($req->get('select_prod') == 'oui'){
                $select = 1;
            }
            else if($req->get('select_prod') == 'non'){
                $select = 0;
            }
            $id_cat = $req->get('cat_prod');
            
            if(isset($video) && !empty($video)){
                $crprod = create_produit_with_vid($nom, $desc, $prix, $img, $video, $select, $id_cat);
            }
            else{
                $crprod = create_produit($nom, $desc, $prix, $img, $select, $id_cat);
            }
            if(!$crprod){
                //return $app->redirect('/christmasback/cr/errcr');
                return '';
            }
            else{
                return $this->app->redirect('/christmasback/statecr/crtd');
            }
        }
        
        public function post_update(Request $req, $ref){
            ob_start();
            $nom = utf8_decode($req->get('nom_prod'));
            $sdesc = utf8_decode($req->get('desc_prod'));
            $desc = nl2br($sdesc);
            $sprix = $req->get('prix_prod');
			$prix = str_replace('€', '&euro;', $sprix);
            $upimg = $req->files->get('img_prod');

            if(isset($upimg) && !empty($upimg)){
                if($upimg != NULL){
                    $upimg->move(__DIR__.'../upload/img', $upimg->getClientOriginalName());
                    $img = $upimg->getClientOriginalName();
                    $updimg = update_produit_img($ref, $img);
                }
            }
            $upvid = $req->files->get('vid_prod');
            if(isset($upvid) && !empty($upvid)){
                if($upvid != NULL){
                    $upvid->move(__DIR__.'../upload/video', $upvid->getClientOriginalName());
                    $video = $upvid->getClientOriginalName();
                    $updvid = update_produit_video($ref, $vid);
                }
            }
            if($req->get('select_prod') == 'oui'){
                $select = 1;
            }
            else if($req->get('select_prod') == 'non'){
                $select = 0;
            }
            $id_cat = $req->get('cat_prod');
            
            $upprod = update_produit($ref, $nom, $desc, $prix, $select, $id_cat);
            if(!$upprod || (isset($upimg) && !$upimg) || (isset($upvid) && !$upvid)){
                return $this->app->redirect('/christmasback/errup/'.$ref);
            }
            else{
                return $this->app->redirect('/christmasback/stateup/updt');
            }
        }
        
        public function display_create(Request $req, $errcr = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($errcr) && !empty($errcr)){
                $statecr = "La création a échoué !";
            }
            $categories = get_cat_up();
			require '../views/chback/create.php';
            $create = ob_get_clean();
            if(!$create){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $create;
            }
        }
        
        public function display_update(Request $req, $ref, $stup = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($errup) && !empty($errup)){
                $stateup = "Erreur lors de la modification du produit !";
            }
            $prod = get_prod_up($ref);
            $categories = get_cat_up();
			require '../views/chback/update.php';
            $create = ob_get_clean();
            if(!$create){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $create;
            }
        }
        
        public function display_fiche(Request $req, $ref){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            $prod = get_prod_up($ref);
			require '../views/chback/fiche-produit.php';
            $fiche = ob_get_clean();
            if(!$fiche){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $fiche;
            }
        }
        
        public function backprod_del(Request $req, $ref){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            $delprod = delete_prod_by_ref($ref);
            if($delprod){
                return $this->app->redirect('/christmasback/statedel/delt');  
            }
            else{
                return $this->app->redirect('/christmasback/statedel/err');
            }
        }
        
        /** Partie bons plans */
        
        public function display_bptable(Request $req){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            $bonsplans = get_bp_table();
			require '../views/chback/bp-table.php';
            $bp = ob_get_clean();
            if(!$bp){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $bp;
            }
        }
        
        public function backbp_del(Request $req, $id){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            $delbp = delete_ope_by_id($id);
            if($delprod){
                return $this->app->redirect('/christmasback/statedelbp/delt');  
            }
            else{
                return $this->app->redirect('/christmasback/statedelbp/err');
            }
        }
        
        public function display_updatebp(Request $req, $id, $errup = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($errup) && !empty($errup)){
                $stateup = "Erreur lors de la modification du produit !";
            }
            $bplan = get_bp_up($id);
            $produits = get_prod_upbp();
			require '../views/chback/update-bp.php';
            $createbp = ob_get_clean();
            if(!$createbp){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $createbp;
            }
        }
        
        public function display_createbp(Request $req, $errcr = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($errcr) && !empty($errcr)){
                $statecr = "La création a échoué !";
            }
            $produits = get_prod_upbp();
			require '../views/chback/create-bp.php';
            $createbp = ob_get_clean();
            if(!$createbp){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $createbp;
            }
        }
        
        public function post_insertbp(Request $req){
            ob_start();
            $ref = $req->get('ref_prod');
            $sdesc = $req->get('desc_ope');
			$desc = str_replace('€', '&euro;', $sdesc);
            
            $coupon = $req->files->get('coupon');
            if(isset($coupon) && !empty($coupon)){
                $coupon->move('../upload/coupon/', $coupon->getClientOriginalName());
                $cp = $coupon->getClientOriginalName();
            }
            
            $crbp = create_ope($desc, $cp, $ref);
            
            if(!$crbp){
                return $this->app->redirect('/christmasback/statecrbp/errcr');
                return $ref . $desc . $coupon->getClientOriginalName();
            }
            else{
                return $this->app->redirect('/christmasback/statecrbp/crtd');
            }
        }
        
        public function post_updatebp(Request $req, $id){
            ob_start();
            $id = $req->get('id_ope');
            $ref = $req->get('ref_prod');
            $desc = utf8_decode($req->get('desc_ope'));
            
            $coupon = $req->files->get('coupon');
            if(isset($coupon) && !empty($coupon)){
                if($coupon != NULL){
                    $coupon->move('../upload/coupon/', $coupon->getClientOriginalName());
                    $cp = $coupon->getClientOriginalName();
                    $updcp = update_ope_coupon($id, $cp);
                }
            }
            
            $upbplan = update_ope($id, $desc, $ref);
            if(!$upbplan || (isset($updcp) && !$updcp)){
                return $this->app->redirect('/christmasback/errupbp/'.$id.'/err');
            }
            else{
                return $this->app->redirect('/christmasback/stateupbp/updt');
            }
        }
        
        /** Partie categories    */
        
        public function display_cattable(Request $req){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            $categories = get_categories();
			require '../views/chback/cat-table.php';
            $cat = ob_get_clean();
            if(!$cat){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $cat;
            }
        }
        
        public function display_updatecat(Request $req, $id, $stup = null){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            if(isset($errup) && !empty($errup)){
                $stateup = "Erreur lors de la modification de la catégorie !";
            }
            $categ = get_categ_up($id);
			require '../views/chback/update-cat.php';
            $upcat = ob_get_clean();
            if(!$upcat){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $upcat;
            }
        }
        
        public function post_updatecat(Request $req, $id){
            ob_start();
            $id = $req->get('id_cat');
            $desc = $req->get('description_cat');
            
            $image = $req->files->get('img_cat');
            if(isset($image) && !empty($image)){
                if($image != NULL){
                    $image->move('assets/img/', $image->getClientOriginalName());
                    $img = $image->getClientOriginalName();
                    $upimg = update_cat_img($id, $img);
                }
            }
            
            $upcat = update_cat_desc($id, $desc);
            if(!$upcat || (isset($upimg) && !$upimg)){
                return $this->app->redirect('/christmasback/errupcat/'.$id.'/err');
            }
            else{
                return $this->app->redirect('/christmasback/stateupcat/updt');
            }
        }
        
        public function display_infos(Request $req){
            $session = $req->getSession();
            if(null === $user = $session->get('user')){
                return $this->app->redirect('/login');
            }
            ob_start();
            $infos = get_infos();
            require '../views/chback/infos.php';
            $pinfo = ob_get_clean();
            if(!$pinfo){
			     $this->app->abort(404, "La page d'accueil est introuvable !");
            }
            else{
                return $pinfo;
            }
        }
        
        public function post_updateinfo(Request $req){
            ob_start();
            $titre = utf8_decode($req->get('titre'));
            $annee = $req->get('annee');
            $copy = $req->get('copy');
            $image = $req->files->get('background');
            if(isset($image) && !empty($image)){
                if($image != NULL){
                    $image->move('assets/img/', $image->getClientOriginalName());
                    $img = $image->getClientOriginalName();
                    $upimg = update_background($img);
                }
            }
            
            $upinfo = update_infos($titre, $annee, $copy);
            if(!$upinfo || (isset($upimg) && !$upimg)){
                return $this->app->redirect('/christmasback/infos');
            }
            else{
                return $this->app->redirect('/christmasback');
            }
        }
    }

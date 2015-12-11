<?php
	use Silex\Application;
    //use Symfony\Component\HttpFoundation\Request;

	require_once '../models/Model.php';
	require_once '../controllers/Controller.php';

	class Route {
		private $app;
		
		public function __construct(){
			$this->app = new Application();
			$this->app['debug'] = true;
		}

		public function routing(){
            /*$this->app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
                'http_cache.cache_dir'  =>  __DIR__.'/http_cache/',
                'http_cache.esi'        =>  null
            ));*/
            
            $this->app->register(new Silex\Provider\SessionServiceProvider());
            
            $this->app->before(function($req){
                $req->getSession()->start();
            });
            
			$this->app->get('/', 'Controller::display_home');
            
            $this->app->get('/mentions-legales', 'Controller::display_legal');
            
            $this->app->get('/bons-plans/{id}', 'Controller::display_bp');
            
            $this->app->get('/indispensables', 'Controller::display_indisp');
            $this->app->get('/indispensables/{cat}', 'Controller::display_cat');
            
            $this->app->get('/utiles', 'Controller::display_utiles');
            $this->app->get('/utiles/{cat}', 'Controller::display_cat');
            
            $this->app->get('/tendance', 'Controller::display_tendance_prod');
            
            $this->app->get('/fun/{cat}', 'Controller::display_cat');
            
            $this->app->get('/produit/{ref}', 'Controller::display_prod_by_ref');
            
            $this->app->post('/search', 'Controller::post_search');
            
            /** Partie back office */
            
            $this->app->get('/login', 'Controller::display_login');
            
            $this->app->get('/logout', 'Controller::back_logout');
            
            $this->app->post('/login/post', 'Controller::post_login');
            
            $this->app->get('/christmasback', 'Controller::display_backlog');
            
            
            $this->app->get('/christmasback/bp-table', 'Controller::display_bptable');
            
            $this->app->get('/christmasback/createbp', 'Controller::display_createbp');

            $this->app->get('/christmasback/upbp/{id}', 'Controller::display_updatebp');
            
            $this->app->get('/christmasback/delbp/{id}', 'Controller::backbp_del');
            
            $this->app->post('/christmasback/postcrbp', 'Controller::post_insertbp');
            
            $this->app->post('/christmasback/postupbp/{id}', 'Controller::post_updatebp');
            
            $this->app->get('/christmasback/errupbp/{id}/{stup}', 'Controller::display_updatebp');
            
            $this->app->get('/christmasback/stateupbp/{sup}', 'Controller::display_backlogbp');
            
            $this->app->get('/christmasback/statedelbp/{sdel}', 'Controller::display_backlogbp');
            
            $this->app->get('/christmasback/statecrbp/{scr}', 'Controller::display_backlogbp');
            
            
            $this->app->get('/christmasback/cat-table', 'Controller::display_cattable');
            
            $this->app->get('/christmasback/upcat/{id}', 'Controller::display_updatecat');
            
            $this->app->post('/christmasback/postupcat/{id}', 'Controller::post_updatecat');
            
            
            $this->app->get('/christmasback/statedel/{sdel}', 'Controller::display_backlog');
            
            $this->app->post('/christmasback/postup/{ref}', 'Controller::post_update');
            
            $this->app->get('/christmasback/create', 'Controller::display_create');
            
            $this->app->post('/christmasback/postcr', 'Controller::post_insert');
            
            $this->app->get('christmasback/fiche/{ref}', 'Controller::display_fiche');
            
            $this->app->get('/christmasback/errup/{ref}/{stup}', 'Controller::display_update');
            
            $this->app->get('/christmasback/cr/{errcr}', 'Controller::display_create');
            
            $this->app->get('/christmasback/statecr/{scr}', 'Controller::display_backlog');
            
            $this->app->get('/christmasback/stateup/{sup}', 'Controller::display_backlog');
            
            $this->app->get('/christmasback/up/{ref}', 'Controller::display_update');
            
            $this->app->get('/christmasback/del/{ref}', 'Controller::backprod_del');
            
            $this->app->get('/christmasback/statedel/{sdel}', 'Controller::display_backlog');

            //Request::setTrustedProxies(array('127.0.0.1'));
            
			$this->app/*['http_cache']*/->run();
		}
	}
?>
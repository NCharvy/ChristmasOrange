<!doctype html>
<html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Site vitrine présentant le catalogue de noël des objets connectés Orange" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.4.0/css/font-awesome.min.css" />
    </head>
    <body>
        <header>
            <div class="main-wrapper clearfix">
                <a href="/"><img src="/assets/img/orange-logo.png" alt="Logo Orange" width="80"/></a>
                <form method="post" action="/search" class="clearfix">
                    <input type="text" id="search" name="search" placeholder="Recherche..." />
                    <button id="button"><img src="/assets/img/search.png" width="21" /></button>
                </form>
            </div>
        </header>
        <div class="main-wrapper">
            <?php echo $content; ?>
        </div>
        <footer>
            <div class="main-wrapper clearfix">
                <p id="copy">2015 &copy; Orange - Catalogue de noël</p>
                <p id="legal"><a href="/mentions-legales">Mentions légales</a></p>
            </div>
        </footer>
        <script type="text/javascript" src="/assets/js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="/assets/js/simple-fade-slideshow/js/jssor.slider.min.js"></script>
        <script type="text/javascript" src="/assets/js/global.js"></script>
    </body>
</html>
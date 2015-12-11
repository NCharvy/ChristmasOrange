<?php
    $title = "Catalogue | Administration";
?>
<!doctype html>
<html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Site vitrine présentant le catalogue de noël des objets connectés Orange" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="/assets/css/styles-back.css" />
        <link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/js/DataTables-1.10.10/media/css/jquery.dataTables.min.css" />
    </head>
    <body>
        <?php 
            if(isset($header) && !empty($header)){
                echo $header;
            }
        ?>
        <div class="main-wrapper">
            <?php echo $content; ?>
        </div>
        <?php
            if(isset($footer) && !empty($footer)){
                echo $footer;
            }
        ?>
        <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/assets/js/DataTables-1.10.10/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#prod-table').DataTable(); 
            } );
        </script>
    </body>
</html>
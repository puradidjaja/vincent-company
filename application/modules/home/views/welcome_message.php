<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sangkuriangindo.com</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
        <?php if (isset($css)): ?>
            <?php foreach ($css as $stylesheet): ?>
                <link rel="stylesheet" href="<?php echo base_url('assets/css/' . $stylesheet); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            var site_url = '<?php echo base_url(); ?>'
        </script>
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <?php if (isset($js_url)): ?>
            <?php foreach ($js_url as $src): ?>
                <script type="text/javascript" src="<?php echo $src; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($js)): ?>
            <?php foreach ($js as $script): ?>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/<?php echo $script; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>

</head>
<body>
<div class="navbar  navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"></a>

                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
</div>
</body>
</html>
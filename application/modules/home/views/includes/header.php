<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $profile->website_name; ?></title>
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

    <body class="app">
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                   
                    channelUrl : '<?php echo base_url();?>', // Channel File
                    status     : true, // check login status
                    cookie     : true, // enable cookies to allow the server to access the session
                    xfbml      : true  // parse XFBML
                });

                // Additional initialization code here
            };

            // Load the SDK Asynchronously
            (function(d){
                var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                ref.parentNode.insertBefore(js, ref);
            }(document));
        </script>
        <div class="navbar  navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo $profile->website_name; ?></a>

                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li <?php if ($this->uri->segment(1) == "") echo ' class="active"'; ?>><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                            <li <?php if ($this->uri->segment(1) == "about") echo ' class="active"'; ?>><a href="<?php echo base_url('about') ?>"><i class="icon-question-sign"></i> About</a></li>
                            <li <?php if ($this->uri->segment(1) == "product") echo ' class="active"'; ?>><a href="<?php echo base_url('product') ?>"><i class="icon-screenshot"></i> Product</a></li>
                            <li <?php if ($this->uri->segment(1) == "contact") echo ' class="active"'; ?>><a href="<?php echo base_url('contact') ?>"><i class="icon-globe"></i> Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Member <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>admin">Admin</a></li>

                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>

                                </ul>
                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
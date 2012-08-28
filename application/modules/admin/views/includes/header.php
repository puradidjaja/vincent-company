<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title><?php echo $profile->website_name; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
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
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 				
                    </a>
                    <a class="brand" href="<?php echo base_url(); ?>"><?php echo $profile->website_name; ?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li <?php if ($this->uri->segment(2) == "") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin'); ?>" ><i class="icon-home"></i> Home</a>
                            </li>

                            <li  <?php if ($this->uri->segment(2) == "account") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/account'); ?>"><i class="icon-group"></i> Account</a>
                            </li>
                            <li  <?php if ($this->uri->segment(2) == "area") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/area'); ?>"><i class="icon-globe"></i>Branch Area</a>
                            </li>
                            <li  <?php if ($this->uri->segment(2) == "article") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/article'); ?>"><i class="icon-rss"></i> Article</a>
                            </li>
                           
                            <li  <?php if ($this->uri->segment(2) == "product") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/product'); ?>"><i class="icon-tags"></i> Product/Service</a>
                            </li>
                            <li  <?php if ($this->uri->segment(2) == "portfolio") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/portfolio'); ?>"><i class="icon-bookmark"></i> Portfolio</a>
                            </li>
                            <li  <?php if ($this->uri->segment(2) == "image") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/image'); ?>"><i class="icon-camera"></i> Image</a>
                            </li>
                            <li  <?php if ($this->uri->segment(2) == "video") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/video'); ?>"><i class="icon-film"></i> Video (YouTube only)</a>
                            </li>

                        </ul>
                        <div class="btn-group pull-right">
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user icon-large"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>admin/account_setting"><i class="icon-wrench"></i> Account Settings</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/auth/logout"><i class="icon-signout"></i> Log out</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Nav header</li>

                            </ul>
                        </div>


                    </div> <!-- /nav-collapse -->

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->
        <div id="content">
            <div class="container">
                <div class="row">
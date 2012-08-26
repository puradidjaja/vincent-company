<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sangkuriangindo.com</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin.css">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
        <?php if (isset($css)): ?>
            <?php foreach ($css as $stylesheet): ?>
                <link rel="stylesheet" href="<?php echo base_url('assets/css/'.$stylesheet); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
		var site_url = '<?php echo base_url();?>'
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
            <div id="nav" class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 				
                    </a>
                    <a class="brand active" href="<?php echo base_url();?>">sangkuriangindo.com</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if ($this->uri->segment(1) == "") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin'); ?>" ><i class="icon-home"></i> Home</a>
                            </li>
                           
                            <li  <?php if ($this->uri->segment(1) == "account") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/account'); ?>"><i class="icon-user"></i> Account</a>
                            </li>
                            <li  <?php if ($this->uri->segment(1) == "area") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/area'); ?>"><i class="icon-globe"></i> Area</a>
                            </li>
                             <li  <?php if ($this->uri->segment(1) == "article") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/article'); ?>"><i class="icon-rss"></i> Article</a>
                            </li>
                            <li  <?php if ($this->uri->segment(1) == "profile") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/profile'); ?>"><i class="icon-asterisk"></i> Profile</a>
                            </li>
                            <li  <?php if ($this->uri->segment(1) == "product") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/product'); ?>"><i class="icon-tags"></i> Product</a>
                            </li>
                             <li  <?php if ($this->uri->segment(1) == "image") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/image'); ?>"><i class="icon-camera"></i> Image</a>
                            </li>
                            <li  <?php if ($this->uri->segment(1) == "video") echo ' class="active"'; ?>>
                                <a href="<?php echo site_url('admin/video'); ?>"><i class="icon-film"></i> Video (YouTube only)</a>
                            </li>
                        </ul>
                        <p class="navbar-text pull-right"><a href="<?php echo site_url("admin/auth/logout"); ?>" ><i class="icon-off"></i> Logout</a></p>
                        

                    </div> <!-- /nav-collapse -->

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->
        <div id="content">
            <div class="container">
                <div class="row">
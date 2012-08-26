<html>
    <head>
        <title>Upload File</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">

        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        <div id="content">
            <div class="container">
                <div class="row">
                    <div span="12">
                      
                         <ul class='nav nav-tabs' data-tabs='tabs'>
                            <li class='active'><a href="<?php echo site_url('admin/image/upload/'.$wysiwyg);?>">Upload</a></li>
                             <?php if($is_gallery==1):?>
                            <li><a href="<?php echo site_url('admin/image/image_gallery/'.$wysiwyg);?>">Gallery</a></li>
                            <?php endif;?>
                        </ul>
                       
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
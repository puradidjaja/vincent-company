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
                        
                        <div class="widget">
                            <div class="widget-header">
                                <h3>Image List</h3>
                            </div>
                            <div class="widget-content">
                                <?php if (isset($images) && count($images)): ?>
                                    <ul class="thumbnails">
                                        <?php foreach ($images as $image): ?>
                                        <li class="span3">
                                                 <img src="<?php echo base_url() . 'uploads/thumbs/' . $image->name; ?>" id="file-<?php echo $image->id; ?>" class="thumbnail"/>
                                                    <div class="caption">
                                                        <p>
                                                            <?php echo $image->name; ?>

                                                        </p>
                                                        <p> <button class="insert-image-gallery btn btn-primary" data="<?php echo $image->id; ?>">Insert into Content</button>
                                                    </div>
                                                 <img src="<?php echo base_url() . 'uploads/images/' . $image->name; ?>" id="file-url-<?php echo $image->id; ?>" style="display: none;"/>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($wysiwyg==1):?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".insert-image-gallery").click(function(){
                    id = $(this).attr('data');
                    src = $("#file-"+id).attr('src');
                    window.parent.tinyMCE.execCommand('mceInsertContent',false,'<img src="'+src+'" class="float_left" width="300" />');
                    parent.jQuery.fancybox.close();
                });
            });
        </script>
        <?php else:?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".insert-image-gallery").click(function(){
                    id = $(this).attr('data');
                    img_url = $("#file-url-"+id).attr('src');
                    thumb_url = $("#file-"+id).attr('src');
                    parent.$('#logo_url').val(img_url);
                    parent.$('#logo_thumb').val(thumb_url);
                    parent.jQuery.fancybox.close();
                });
            });
        </script>
        <?php endif;?>
    </body>
</html>
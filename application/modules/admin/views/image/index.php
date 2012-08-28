<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js',
    ),
    'css' => array(
        'fancybox/jquery.fancybox.css',
        'fancybox/jquery.fancybox-buttons.css',
        'fancybox/jquery.fancybox-thumbs.css',
    )
);
?>
<?php $this->load->view('includes/header', $assets); ?>
<div class="span12">
    <h1 class="page-title"> Image
        <a id="setImage" class="btn btn-warning pull-right" data-fancybox-type="iframe" ><i class="icon-upload-alt" ></i>Upload Image</a>
       
        <input type="hidden" id="logo_url" class="input-xlarge" value=" "/>
        <input type="hidden" id="logo_thumb" value=" "/>
    </h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Image List</h3><a href="<?php echo site_url('admin/image');?>" class="btn"><i class="icon-refresh"></i>&nbsp; refresh</a>
        </div>
        <div class="widget-content">
            <?php if (isset($images) && count($images)): ?>
                <ul class="thumbnails">
                    <?php foreach ($images as $image): ?>
                        <li class="thumbnail">
                            <a class="img-fancy " href="<?php echo base_url() . 'uploads/images/' . $image['name']; ?>" data-fancybox-group="thumb">
                                <img src="<?php echo base_url() . 'uploads/thumbs/' . $image['name']; ?>"/>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php echo $this->pagination->create_links(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.logo-preview').hide();
        $("#setImage").fancybox({

            'width'				: '60%',

            'height'			: '80%',

            'hideOnOverlayClick': false, 

            'autoScale'			: false,

            'transitionIn'		: 'elastic',

            'transitionOut'		: 'elastic',

            'type'				: 'iframe',

            'href' : site_url+'admin/image/upload_form/0/0'

        });
        $('a.img-fancy').fancybox({ 
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            }

                
        });
    });
</script>
<?php $this->load->view('includes/footer'); ?>
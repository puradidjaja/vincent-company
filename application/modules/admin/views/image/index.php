<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js','fancybox.setting.js'
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
            <div id="preview_thumb"></div>
            <h3>Image List</h3><a href="<?php echo site_url('admin/image');?>" class="btn"><i class="icon-refresh"></i>&nbsp; refresh</a>
        </div>
        <div class="widget-content">
            <?php if (isset($images) && count($images)): ?>
                <ul class="thumbnails">
                    <?php foreach ($images as $image): ?>
                        <li class="span2 thumbnail">
                            <a class="img-fancy " href="<?php echo base_url() . 'uploads/images/' . $image['name']; ?>" data-fancybox-group="thumb">
                                <img src="<?php echo base_url() . 'uploads/thumbs/' . $image['name']; ?>"/>
                            </a>
                            <div class="caption">
                                 <a href="#image-modal" class="image-delete-btn" rel="tooltip" data-toggle="modal" 
                                   action="<?php echo site_url('admin/image/delete/' . $image['id']); ?>"
                                   data-original-title="delete" title="delete"><i class="icon-remove"></i> delete
                                </a> 
                                
                            </div>
                      </li>
                    <?php endforeach; ?>
                </ul>
                <?php echo $this->pagination->create_links(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="modal hide fade" id="image-modal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Delete Image</h3>
    </div>
    <div class="modal-body">
        <p><strong>Are you sure you want to delete this image?</strong></p>
    </div>
    <div class="modal-footer">
        <a id="image-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function(){
         $('.image-delete-btn').click(function() {
            deleteUrl = $(this).attr('action');
        });
        $('#image-modal').on('show', function() {
            $('#image-modal-delete-btn').attr('href', deleteUrl);
        });
        $('.logo-preview').hide();
         init_fancybox(site_url+"admin/image/upload_form/0/0");
        
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
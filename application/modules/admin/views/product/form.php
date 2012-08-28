<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js',
        'tiny_mce/tiny_mce.js', 'wysiwyg.image.tinymce.js'
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

    <div class="widget">
        <div class="widget-header">
            <h3>Product/Service</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open($action); ?>

                <fieldset><legend>Product/Service Information</legend>

                    <?php echo form_error('name') ?>
                    <?php echo form_label('Name', 'name'); ?>
                    <input type="text" name="name" class="input-xlarge" value="<?php echo (set_value('name'))?set_value('name'):$product_data['name'];?>"/>
                    <?php echo form_label('Image', 'image_url'); ?>
                    <div class="input-append">
                        <input type="text" name="image_url" id="logo_url" class="input-xlarge" value="<?php echo (set_value('image_url'))?set_value('image_url'):$product_data['image_url'];?>"/>
                        <button class="btn" id="setImage" type="button"><i class="icon-upload-alt"></i></button>
                        <input type="hidden" name="thumb" id="logo_thumb" value="<?php echo (set_value('image_url'))?set_value('thumb'):$product_data['thumb'];?>"/>
                    </div>
                    <div id="preview_thumb"></div>
                    <?php echo form_error('description'); ?>
                    <?php echo form_label('Description', 'description'); ?>
                     <button id="wysiwygImage" class="btn"><i class="icon-picture" ></i> Insert Image </button>
                    <textarea name="description" class="mceEditor"><?php echo (set_value('description'))?set_value('description'):$product_data['description'];?></textarea>
                     <?php echo form_label('Type', 'type'); ?>
                    <?php echo form_dropdown('type', array('product'=>'product','service'=>'service'), set_value('type')?set_value('type'):$product_data['type']);?>
                    <?php echo form_label('Tags', 'tags');?>
                    <input type="text" name="tags" class="input-xlarge" value="<?php echo (set_value('tags'))?set_value('tags'):$product_data['tags'];?>"/>
                    <?php echo form_label('Add to Page Gallery', 'is_gallery'); ?>
                    <?php echo form_dropdown('is_gallery', array(1=>'Yes',0=>'No'), array(0));?>
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('admin/product'); ?>" class="btn">Cancel</a>
                </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        init_wysiwyg();
        $("#setImage").fancybox({

            'width'				: '60%',

            'height'			: '80%',

            'hideOnOverlayClick': false, 

            'autoScale'			: false,

            'transitionIn'		: 'elastic',

            'transitionOut'		: 'elastic',

            'type'				: 'iframe',

            'href' : site_url+'admin/image/upload_form/1/0'

        });
        $("#logo_thumb").change(function () {
            $('#preview-thumb').html("<img src='"+$('#logo_thumb').val()+"' class='thumbnail'/>");
        }).change();
    });
</script>

<?php $this->load->view('includes/footer'); ?>
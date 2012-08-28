<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js',
        'tiny_mce/tiny_mce.js', 'wysiwyg.image.tinymce.js','fancybox.setting.js'
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
            <h3>Product</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open($action); ?>

                <fieldset><legend>Article</legend>

                    <?php echo form_error('title') ?>
                    <?php echo form_label('Title', 'title'); ?>
                    <input type="text" name="title" class="input-xlarge" value="<?php echo (set_value('title'))?set_value('title'):$article_data['title'];?>"/>
                    <?php echo form_error('summary');?>
                    <?php echo form_label('Summary','summary');?>
                    <textarea name="summary"><?php echo (set_value('summary'))?set_value('summary'):$article_data['summary'];?></textarea>
                    <?php echo form_label('Image', 'image_url'); ?>
                    <div class="input-append">
                        <input type="text" name="image_url" id="logo_url" class="input-xlarge" value="<?php echo (set_value('image_url'))?set_value('image_url'):$article_data['image_url'];?>"/>
                        <button class="btn" id="setImage" type="button"><i class="icon-upload-alt"></i></button>
                        <input type="hidden" name="thumb" id="logo_thumb" value="<?php echo (set_value('thumb'))?set_value('thumb'):$article_data['thumb'];?>"/>
                    </div>
                    <div id="preview_thumb"></div>
                    <?php echo form_error('content'); ?>
                    <?php echo form_label('Content', 'content'); ?>
                     <button id="wysiwygImage" class="btn"><i class="icon-picture" ></i> Insert Image </button>
                    <textarea name="content" class="mceEditor"><?php echo (set_value('content'))?set_value('content'):$article_data['content'];?></textarea>
                    <?php echo form_label('Tags', 'tags'); ?>
                    <input type="text" name="tags" class="input-xlarge" value="<?php echo (set_value('tags'))?set_value('tags'):$article_data['tags'];?>"/>
                    <?php echo form_label('Linked In Main Page','linked');?>
                    <?php echo form_dropdown('linked', array(1=>'Yes',0=>'No'), (set_value('is_linked'))?set_value('is_linked'):$article_data['is_linked']);?>
                    <?php echo form_error('status'); ?>
                    <?php echo form_label('Status', 'status'); ?>
                    <select name = "status">
                        <option value = "1" <?php echo set_select('status', '1'); ?>>Draft</option>
                        <option value = "2"<?php echo set_select('status', '2',TRUE); ?>>Publish</option>
                    </select>
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('admin/article'); ?>" class="btn">Cancel</a>
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
        init_wysiwyg(site_url+'admin/image/upload_form/1/1');
        init_fancybox(site_url+"admin/image/upload_form/1/0");
        
    });
</script>

<?php $this->load->view('includes/footer'); ?>
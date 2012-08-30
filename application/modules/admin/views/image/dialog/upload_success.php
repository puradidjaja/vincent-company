<?php echo form_open('upload/files/edit'); ?>
<img class="thumbnail" src="
     <?php echo base_url(); ?>/uploads/thumbs/<?php echo $upload_data['name']; ?>" alt="" id="thumb_result">
<div class="caption">
    <p><strong>File name:</strong> <?php echo $upload_data['name']; ?></p>
    <p><strong>File type:</strong> <?php echo $upload_data['type']; ?></p>
    <p><strong>Upload date:</strong> <?php echo date('Y-m-d'); ?></p>
</div>
<div class="well">
    <label for="caption">Caption</label>
    <input type="hidden" name="img_id" value="<?php echo $img_id; ?>" id="img_id"/>
    <input type="text" name="caption" id="caption"/>
    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>
    <div class="form-actions">
        <a href="#" class="btn btn-primary" id="insert-image">Save</a>
        <a href="#" class="btn ">Cancel</a>
    </div>
</div>
<?php echo form_close(); ?>

<?php if ($wysiwyg == 1): ?>
    <script >
        $(document).ready(function(){
            $("#insert-image").click(function(){                    
                description = $('#description').val();
                caption = $('#caption').val();
                img_id =$('#img_id').val();
                data_kirim =({
                    'img_id':img_id,
                    'caption':caption,
                    'description':description
                });
                   
                $.ajax({
                    url : '<?php echo site_url("admin/image/edit") ?>',
                    data : data_kirim,
                    type : 'POST',
                    success : function (msg){
                        window.parent.tinyMCE.execCommand('mceInsertContent',false,'<img src="<?php echo base_url(); ?>uploads/images/<?php echo $upload_data['name'] ?>" />');	
                        parent.jQuery.fancybox.close();
                           
                    }

                })
                // alert(name+alternate+description+caption);
            }); 
                        
        })
                
    </script>
<?php else: ?>
    <script >
        $(document).ready(function(){
            $("#insert-image").click(function(){                    
                description = $('#description').val();
                caption = $('#caption').val();
                img_id =$('#img_id').val();
                data_kirim =({
                    'img_id':img_id,
                    'caption':caption,
                    'description':description
                });
                   
                $.ajax({
                    url : '<?php echo site_url("admin/image/edit") ?>',
                    data : data_kirim,
                    type : 'POST',
                    success : function (msg){
                       // console.log(msg);
                        msg=jQuery.parseJSON(msg);
                        parent.$('#logo_url').val(msg.image_url);
                        parent.$('#logo_thumb').val(msg.thumb_url);
                        
                        parent.jQuery.fancybox.close();
                           
                    }

                })
                // alert(name+alternate+description+caption);
            }); 
                        
        })
                
    </script>
<?php endif; ?>


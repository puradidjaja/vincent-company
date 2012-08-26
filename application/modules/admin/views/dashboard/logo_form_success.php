<img class="thumbnail" src="<?php echo $logo_url; ?>" alt="" id="uploadedImage">

<div class="well">

    <div class="form-actions">
        <a href="#" class="btn btn-primary" id="insert-image">Save</a>
        <a href="#" class="btn ">Cancel</a>
    </div>
</div>
<?php echo form_close(); ?>

<script >
    $(document).ready(function(){
        $("#insert-image").click(function(){                    
            parent.$('#logo_url').val($('#uploadedImage').attr("src"));
            parent.jQuery.fancybox.close();
        }); 
                    
    })
            
</script>

<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-money"></i> Product Details
                <i class="icon-chevron-left"></i><a href="<?php echo site_url('admin/product'); ?>"title="back to list"> back </a>
                <i class="icon-pencil"></i><a href="<?php echo site_url('admin/product/edit/' . $product->id); ?>" title="edit"> edit </a>
                <i class="icon-trash"></i><a href="#account-modal" class="account-delete-btn" title="Delete" rel="tooltip" data-toggle="modal" 
                   action="<?php echo site_url("admin/product/delete/$product->id"); ?>"
                   data-original-title="delete"> delete </a>
            </h3>
        </div>
        <div class="widget-content">
            <h3 class="page-header">Product Name: <?php echo $product->name;?></h3>
             <blockquote><?php echo $product->tags;?></blockquote>
            <img src="<?php echo $product->thumb;?>" class="thumbnail"/>
           
            <h3>Description:</h3>
            <span><?php echo $product->description; ?></span>
        </div>
    </div>
</div>
<div class="modal hide fade" id="account-modal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Delete Account</h3>
    </div>
    <div class="modal-body">
        <p><strong>Are you sure you want to delete this account?</strong></p>
    </div>
    <div class="modal-footer">
        <a id="account-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.account-delete-btn').click(function() {
            deleteUrl = $(this).attr('action');
        });
        $('#account-modal').on('show', function() {
            $('#account-modal-delete-btn').attr('href', deleteUrl);
        });
    });
</script>

<?php $this->load->view('includes/footer'); ?>
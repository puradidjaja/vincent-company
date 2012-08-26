<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-user"></i> <?php echo $account->name; ?> Details|
                <a href="<?php echo site_url('admin/account'); ?>"title="back to list"><i class="icon-chevron-left"></i> back </a>
                <a href="<?php echo site_url('admin/account/edit/' . $account->id); ?>" title="edit"><i class="icon-pencil"></i> edit </a>
                <a href="#account-modal" class="account-delete-btn" title="Delete" rel="tooltip" data-toggle="modal" 
                   action="<?php echo site_url("admin/account/delete/$account->id"); ?>"
                   data-original-title="delete"><i class="icon-trash"></i> delete </a>
            </h3>
        </div>
        <div class="widget-content">
            <div class="row">
                <div class="span3">
                    <img src="<?php echo $account->avatar_url; ?>" title="<?php echo $account->name; ?>" 
                         class="thumbnail" style="width: 200px;height: 200px;"/>
                </div>
                <div class="span3">
                    <h2 class="page-header">
                        <?php echo $account->name; ?>
                    </h2>
                    <p><?php echo $user->email; ?></p>
                    <p><?php
                        if ($user->role == 1)
                            echo 'Admin';
                        else if ($user->role == 2)
                            echo 'Member';
                       
                        else
                            echo '';
                        ?>
                    </p>
                </div>
                <div class="span6">
                    <h2 class="page-header">
                        Profile
                    </h2>
                    <?php echo $account->profile; ?>
                </div>
            </div>
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
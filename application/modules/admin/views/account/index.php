<?php $this->load->view('includes/header'); ?>
<div class="span12">
    <h1 class="page-title">Account <a class="btn btn-warning pull-right" href="<?php echo site_url('admin/account/create'); ?>">Create New Account</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Account List</h3>
        </div>
        <div class="widget-content">
            <?php if(isset($accounts) && count($accounts)):?>
            <table class="table table-striped">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Last Login</th>
                <th>View</th>
                </thead>
                <tbody>
                    <?php foreach ($accounts as $key => $account): ?>
                        <tr>
                            <td><?php echo $account['name']; ?></td>
                            <td><?php echo $account['email']; ?></td>
                            <td><?php echo $account['last_login']; ?></td>
                            <td>
                                <a href="<?php echo site_url("admin/account/detail/" . $account['id']); ?>"><i class="icon-search"></i> Detail</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
            <?php else:?>
            <h2>No User Found</h2>
            <?php endif;?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
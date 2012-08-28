<?php $this->load->view('includes/header'); ?>

<div class="span12">
    <h1 class="page-title">Portfolio<a class="btn btn-warning pull-right" href="<?php echo site_url('admin/portfolio/create'); ?>">Add new Portfolio</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Portfolio</h3>
        </div>
        <div class="widget-content">
            <?php if (isset($portfolios) && count($portfolios)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Project</th>
                            <th>Experties</th>
                            <th>Client</th>
                            <th>Function</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($portfolios as $portfolio): ?>
                            <tr>
                                <td><?php echo $portfolio['year']; ?></td>
                                <td><?php echo $portfolio['project']; ?></td>
                                <td><?php echo $portfolio['experties']; ?></td>
                                <td><?php echo $portfolio['client']; ?></td>
                                <td><?php echo $portfolio['function']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('admin/portfolio/edit/'.$portfolio['id']);?>"><i class="icon-pencil"></i> Edit</a></li>

                                            <li><a class="portfolio-delete-btn" href="#portfolio-modal" data-toggle="modal" 
                                                   rel="tooltip" action="<?php echo site_url('admin/portfolio/delete/'.$portfolio['id']); ?>" data-original-title="delete" title="delete"><i class="icon-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h1 class="page-header">No Portfolios Found</h1>

            <?php endif; ?>

            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="modal hide fade" id="portfolio-modal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Delete Video</h3>
    </div>
    <div class="modal-body">
        <p><strong>Are you sure you want to delete this portfolio?</strong></p>
    </div>
    <div class="modal-footer">
        <a id="portfolio-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function(){
            
        $('.portfolio-delete-btn').click(function() {
            deleteUrl = $(this).attr('action');
        });
        $('#portfolio-modal').on('show', function() {
            $('#portfolio-modal-delete-btn').attr('href', deleteUrl);
        });
    });
</script>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/header'); ?>
<div class="span12">


    <div class="widget">
        <div class="widget-header">
            <h3>Article Detail
                <i class="icon-chevron-left"></i><a href="<?php echo site_url('admin/article') ?>"title="back to list"> back </a>
                <i class="icon-pencil"></i><a href="<?php echo site_url('admin/article/edit/' . $article->id) ?>" title="edit"> edit </a>
                <i class="icon-trash"></i><a href="#article-modal" class="article-delete-btn" title="Delete" rel="tooltip" data-toggle="modal" 
                                             action="<?php echo site_url("admin/article/delete/$article->id"); ?>"
                                             data-original-title="delete"> delete </a>
            </h3>
        </div>
        <div class="widget-content">
            <h3 class="page-header"><?php echo $article->title; ?></h3>
            <blockquote><?php echo $article->summary; ?></blockquote>
            <img src="<?php echo $article->thumb; ?>" class="thumbnail"/></p>

            <span><?php echo $article->content; ?></span>
            <hr/>
            <?php if (isset($comments) && count($comments)): ?>
                <?php foreach ($comments as $c): ?>
                    <table class="table table-striped">
                        <thead><h2><i class="icon-comment"></i> Comments</h2></thead>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td>
                                    <h3><?php echo $comment->name; ?> | <?php echo $comment->email; ?> | <i class="icon-remove"></i>
                                        
                                    </h3>
                                    <blockquote><?php echo $comment->content; ?></blockquote>
                                    <a href="<?php echo site_url('admin/article/delete_comment/' . $comment->id) ?>" title="delete"> delete </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="modal hide fade" id="article-modal">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Delete Article</h3>
            </div>
            <div class="modal-body">
                <p><strong>Are you sure you want to delete this article?</strong></p>
            </div>
            <div class="modal-footer">
                <a id="article-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
            
        $('.article-delete-btn').click(function() {
            deleteUrl = $(this).attr('action');
        });
        $('#article-modal').on('show', function() {
            $('#article-modal-delete-btn').attr('href', deleteUrl);
        });
    });
</script>
<?php $this->load->view('includes/footer'); ?>
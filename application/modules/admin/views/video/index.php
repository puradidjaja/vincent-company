<?php $this->load->view('includes/header'); ?>
<div class="span12">
    <h1 class="page-title">Video <a class="btn btn-warning pull-right" href="<?php echo site_url('admin/video/create'); ?>">Add New Video</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Video List</h3>
        </div>
        <div class="widget-content" style="display: block;">
            <?php if (isset($videos) && count($videos)): ?>
                <ul class="thumbnails" style="alignment-adjust: central; alignment-baseline: middle;">
                    <?php foreach ($videos as $video): ?>
                        <li class="span2">
                            <img src="<?php echo $video['thumbnail_src']; ?>" class="thumbnail"/>
                            <div class="caption">
                                <p><?php echo $video['name']; ?></p>
                                <a href="<?php echo site_url('admin/video/play/' . $video['id']); ?>" title="play"><i class="icon-play"></i></a>   | 
                                <a href="#video-modal" class="video-delete-btn" rel="tooltip" data-toggle="modal" 
                                   action="<?php echo site_url('admin/video/delete/' . $video['id']); ?>"
                                   data-original-title="delete" title="delete"><i class="icon-remove"></i>
                                </a>|
                                <a href="#" title="edit"><i class="icon-edit"></i></a>

                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php echo $this->pagination->create_links(); ?>
            <?php else: ?>
                <h2>No Video Found</h2>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="modal hide fade" id="video-modal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Delete Video</h3>
    </div>
    <div class="modal-body">
        <p><strong>Are you sure you want to delete this video?</strong></p>
    </div>
    <div class="modal-footer">
        <a id="video-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function(){
            
        $('.video-delete-btn').click(function() {
            deleteUrl = $(this).attr('action');
        });
        $('#video-modal').on('show', function() {
            $('#video-modal-delete-btn').attr('href', deleteUrl);
        });
    });
</script>
<?php $this->load->view('includes/footer'); ?>
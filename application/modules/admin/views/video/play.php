<?php $this->load->view('includes/header'); ?>
<div class="span12">
    <h1 class="page-title">Video <a class="btn btn-warning pull-right" href="<?php echo site_url('admin/video/create'); ?>">Add New Video</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Video <?php echo $video->name;?></h3>
        </div>
        <div class="widget-content">
            
            <?php echo youtube_player(array(
                'width'=>853,
                'height'=>'505',
                'src'=>$video->src
            ));?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
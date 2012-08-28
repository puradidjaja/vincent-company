<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-plus"></i>  Add New Video</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open('admin/video/create'); ?>
                <fieldset><legend>YouTube Video Info</legend>
                    <?php echo form_error('video_url') ?>
                    <?php echo form_label('Source', 'source'); ?>
                    <input type="text" id="video_url" class="input-xlarge" name="source"/>
                    <input class="video_thumb" type="hidden" value="" name="thumbnail_src"/>
                    <div id="preview_thumb"></div>
                    <?php echo form_error('name') ?>
                    <?php echo form_label('Name', 'name'); ?>
                    <input type="text" name="name" class="input-xlarge" id="vid_title"/>
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Add', 'class' => 'btn btn-primary'));
                    ?>

                    <a href="<?php echo site_url('admin/video'); ?>" class="btn">Cancel</a>

                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>

<script>
    
    function createThumbnail(url){
        return "http://img.youtube.com/vi/"+url+"/0.jpg";
    }
    
    function youtubeFeedCallback(data) {
        var s = '';
        s += '<img src="' + data.entry.media$group.media$thumbnail[3].url + '" width="' + data.entry.media$group.media$thumbnail[0].width + '" height="' + data.entry.media$group.media$thumbnail[0].height + '" alt="' + data.entry.media$group.media$thumbnail[0].yt$name + '" align="right"/>';
        s += '<b>Title:</b> ' + data.entry.title.$t + '<br/>';
        s += '<b>Author:</b> ' + data.entry.author[0].name.$t + '<br/>';
        s += '<b>Published:</b> ' + new Date(data.entry.published.$t).toLocaleDateString() + '<br/>';
        s += '<b>Duration:</b> ' + Math.floor(data.entry.media$group.yt$duration.seconds / 60) + ':' + (data.entry.media$group.yt$duration.seconds % 60) + ' (' + data.entry.media$group.yt$duration.seconds + ' seconds)<br/>';
        if (data.entry.gd$rating) {
            s += '<b>Rating:</b> ' + data.entry.gd$rating.average.toFixed(1) + ' out of ' + data.entry.gd$rating.max + ' (' + data.entry.gd$rating.numRaters + ' ratings)<br/>';
        }
        s += '<b>Statistics:</b> ' + data.entry.yt$statistics.favoriteCount + ' favorite(s); ' + data.entry.yt$statistics.viewCount + ' view(s)<br/>';
        s += '<br/>' + data.entry.media$group.media$description.$t.replace(/\n/g, '<br/>') + '<br/>';
        s += '<br/><a href="' + data.entry.media$group.media$player.url + '" target="_blank">Watch on YouTube</a>';
        $('#preview_thumb').html(s)
    }
    
    function getVideoData(data){
        $('#preview_thumb').html('<img src="'+data.entry.media$group.media$thumbnail[3].url+'" class="thumbnail" />');
        $('#vid_title').val(data.entry.title.$t)
        //$('.video_thumb').val(data.entry.media$group.media$thumbnail[3].url);
    }
    
    $("document").ready(function(){
        
        $("#video_url").blur(function(){
            src=$(this).val();
            thumb_url=createThumbnail(src);
            $('.video_thumb').val(thumb_url);
            var script=document.createElement('script');
            script.type='text/javascript';
            script.src='http://gdata.youtube.com/feeds/api/videos/'+src+'?v=2&alt=json-in-script&callback=getVideoData';
            $("body").append($(script));

        });
       
    });
</script>
<?php $this->load->view('includes/footer'); ?>
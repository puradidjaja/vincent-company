<?php $this->load->view('includes/header'); ?>

<header>
    <div class="container">
        
        <div class="row">
            
            <div class="span12">
                <div class="page-heading">
                <h2 class="page-header"><i class="icon-info-sign"></i> About</h2>
            </div>
                <?php echo $profile->about; ?>
            </div>

        </div>

    </div>
</header>
<div class="main">
    <div class="container">
        <div class="span12">
            <div class="page-heading">
                <h1 class="page-header"><i class="icon-group"></i> Menteri</h1>
            </div>
            <?php if (isset($menteries) && count($menteries)): ?>
                <ul class="thumbnails">
                    <?php foreach ($menteries as $m): ?>
                        <li class="span2">
                            <div class="thumbnail">
                                <img src="<?php echo $m['avatar_url']; ?>" alt="" />
                                <div class="caption">
                                    <p><?php echo $m['name']; ?></p>
                                  
                                    <a href="<?php echo base_url('about/profile/' . $m['link']); ?>" class="btn btn-primary">Profile</a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <hr>
    </div> <!-- /container -->
</div>

<div class="bottom">
    <div class="bottom-inner">
        <div class="container">
            <div class="row">
                <div class="span12">                            
                    Powered By: <a href="http://pt-swg.com"><img src="http://pt-swg.com/img/logo_small.jpg"/></a>                    
                </div>
            </div>
        </div>

    </div>
</div><!--end bottom-->
<!-- Le javascript

================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>

<?php $this->load->view('includes/footer'); ?>
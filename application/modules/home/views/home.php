<?php $this->load->view('includes/header') ?>

<header>
    <div class="container">

        <div class="row">
            <div class="span4 pull-left">
                <img src="<?php echo $profile->logo; ?>" />
            </div>
            <div class="span8 pull-right">
                <div id=homeCarousel class="carousel slide">
                    <!-- Carousel items -->
                    <div class=carousel-inner>
                        <?php foreach ($articles as $article): ?>
                            <div class="item">
                                <img src="<?php echo $article->image_url; ?>" alt=""/>
                                <div class="carousel-caption">
                                    <h1><?php echo $article->title; ?></h1>
                                    <p><?php echo $article->summary; ?>
                                        <a href="<?php echo site_url('article/' . $article->link); ?>" class="btn btn-warning">View More &raquo;</a>
                                    </p>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#homeCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#homeCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>
</header>
<div class="main">
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="span6">
                <h2 class="page-heading"><i class="icon-rss icon-large"></i> News</h2>
                <?php if (isset($rss) && count($rss) > 0): ?>
                    <table class="table">
                        <?php foreach ($rss as $key => $value) : ?>
                            <tr>
                                <td><strong><?php echo $value['title']; ?></strong>&mdash;<?php echo $value['summary']; ?>...
                                    <a href="<?php echo base_url('article/' . $value['link']); ?>">more</a></td>
                            </tr>

                        <?php endforeach; ?>
                    </table>
                    <span><a href="<?php echo base_url('article') ?>" class="btn btn-info">I Want More!!</a></span>
                <?php else:?>
                    <h2>No article yet</h2>
                <?php endif; ?>
            </div>



        </div>

        <hr>
    </div> <!-- /container -->
</div>
<div class="footer">
    <br>
    <div class="container">
        <div class="row">
            <div class="span8">
                <h2 class="page-header"><i class="icon-facebook icon-large"></i> Likes &amp; Comments</h2>
                <?php echo like_comment(array('url' => site_url(), 'width' => 500)); ?>

            </div>
            <div class="span4 pull-right">
                <h2 class="page-header"><i class="icon-twitter icon-large"></i> Tweets</h2>
                <?php echo tweet(array(
                    'user'=>'ptswg',
                    'shell_bg'=>'none',
                    'shell_color'=>'#EFF299',
                    'tweets_bg'=>'none',
                    'tweets_color'=>'#EFF299',
                    'link'=>'#fff'
                ))?>
                
            </div>
            <hr>
        </div>
    </div>
    <div class="bottom">
        <div class="bottom-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">                            
                        <p class="pull-right">Powered By: <a href="http://pt-swg.com"><img src="http://pt-swg.com/img/logo_small.jpg"/></a></p>                    
                    </div>
                </div>
            </div>

        </div>
    </div><!--end bottom-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        $(document).ready(function(){
            $('.carousel').carousel({
                interval: 3000,
                pause:'hover'
            })
        });
    </script>
    <?php $this->load->view('includes/footer'); ?>
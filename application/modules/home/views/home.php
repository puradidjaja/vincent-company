<?php $this->load->view('includes/header') ?>

<header>

    <div class="container">

        <div class="row">
            <?php if (!empty($profile->logo)): ?>
                <div class="span4 pull-left">
                    <img src="<?php echo $profile->logo; ?>" />
                </div>
            <?php else: ?>
                <div class="span4 pull-left">
                    <h1>Your Logo and Slogan Here</h1>
                </div>
            <?php endif; ?>

            <?php if (isset($products) && count($products)): ?>
                <div class="span8 pull-right">
                    <div id=homeCarousel class="carousel slide">
                        <!-- Carousel items -->
                        <div class=carousel-inner>
                            <?php foreach ($products as $p): ?>
                                <div class="item" >
                                    <img src="<?php echo $p->image_url; ?>" alt="" class="img-rounded"/>
                                    <div class="carousel-caption">
                                        <h1><?php echo $p->name; ?></h1>
                                        <a href="#" class="btn btn-warning">View More &raquo;</a>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#homeCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#homeCarousel" data-slide="next">&rsaquo;</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="span8 pull-right">
                    <h1>Your Slideshow here</h1>
                </div>
            <?php endif; ?>
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
                <?php else: ?>
                    <h2>No article yet</h2>
                <?php endif; ?>
            </div>
            <?php if (!empty($profile->home_video)): ?>
                <div class="span6">
                    <h2 class="page-heading">
                        <i class="icon-film"></i>&nbsp;Video
                    </h2>
                    <?php
                    echo youtube_player(array(
                        'width' => 560,
                        'height' => 315,
                        'src' => $profile->home_video
                    ));
                    ?>

                </div>
            <?php else: ?>
                <div class="span6">
                    <h2 class="page-heading">
                        <i class="icon-film"></i>&nbsp;Video
                    </h2>
                    <h3>Your video here</h3>

                </div>
            <?php endif; ?>



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
                <?php
                echo tweet(array(
                    'user' => 'ptswg',
                    'shell_bg' => 'none',
                    'shell_color' => '#EFF299',
                    'tweets_bg' => 'none',
                    'tweets_color' => '#EFF299',
                    'link' => '#fff'
                ))
                ?>

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
        $('.carousel').carousel({
            interval: 3000,
            pause:'hover'
        });
    </script>
    <?php $this->load->view('includes/footer'); ?>
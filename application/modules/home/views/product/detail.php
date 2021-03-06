<?php $this->load->view('includes/header'); ?>
<div class="main">
    <div class="container">

        <div class="row">
            <div class="span3 pull-left">
                <img src="<?php echo $profile->logo; ?>"/>
                <hr>
                <h2><i class="icon-twitter-sign icon-large"></i> Tweets</h2>
                <?php
                $tw = 'ptswg';
                if (!empty($profile->twitter)) {
                    $tw = $profile->twitter;
                }
                echo tweet(array(
                    'user' => $tw,
                    'shell_bg' => 'none',
                    'shell_color' => '#000',
                    'tweets_bg' => 'none',
                    'tweets_color' => '#000',
                    'link' => 'grey'
                ))
                ?>

            </div>
            <div class="span9 pull-right">
                <div class="page-header">
                    <h1 class="page-heading"><?php echo $product->name; ?></h1>

                </div>
                <div class="article-content">
                    <?php if (!empty($product->image_url)): ?>
                        <img src="<?php echo $product->image_url; ?>" class="img-rounded"/>
                    <?php endif; ?>
                    <?php echo $product->description; ?>
                </div>
                <hr/>


            </div>
        </div>
    </div>
</div>
<div class="footer">

    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span9 pull-right">                            

                    <h2><i class="icon-facebook-sign icon-large"></i> Likes</h2>
                    <?php echo like_comment(array('url' => site_url('product/'.$product->link), 'width' => 500)); ?>
                                      
                </div>
                
            </div>
        </div>

    </div>
</div><!--end bottom-->
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
<?php $this->load->view('includes/footer'); ?>
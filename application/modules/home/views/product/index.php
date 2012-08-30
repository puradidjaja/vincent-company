<?php $this->load->view('includes/header') ?>
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
                <hr>
                <h2><i class="icon-facebook-sign icon-large"></i> Likes</h2>
<?php echo like(array('url' => site_url('product'), 'width' => 300)); ?>
            </div>
            <div class="span9 pull-right">
<?php if (isset($products) && count($products)): ?>
                    <table>
                    <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <div class="page-header">
                                        <h1 class="page-heading"><?php echo $product['name']; ?></h1>

                                    </div>
                                    <img src="<?php echo $product['thumb']; ?>" class="thumbnail" />

                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('product/' . $product['link']); ?>" class="btn btn-primary"><i class="icon-search"></i> detail</a></td>
                            </tr>
    <?php endforeach; ?>
                    </table>
                        <?php echo $this->pagination->create_links(); ?>
                <?php else: ?>
                    <h3>No Product</h3>
                <?php endif; ?>
                <hr/>



            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span12">                            
                    Powered By: <a href="http://pt-swg.com"><img src="http://pt-swg.com/img/logo_small.jpg"/></a>                    
                </div>
            </div>
        </div>

    </div>
</div><!--end bottom-->
<?php $this->load->view('includes/footer'); ?>
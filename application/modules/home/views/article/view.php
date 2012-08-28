  <?php $this->load->view('includes/header');?>
        <div class="main">
            <div class="container">

                <div class="row">
                    <div class="span3 pull-left">
                        <img src="<?php echo $profile->logo;?>"/>
                        
                    </div>
                    <div class="span9 pull-right">
                        <div class="page-header">
                            <h1 class="page-heading"><?php echo $article->title; ?></h1>
                            <p><i class="icon-time"></i> <?php echo $article->create_date; ?>|
                               
                                <i class="icon-user"></i> <?php echo $article->author; ?>
                            </p>
                            <blockquote><?php echo $article->summary; ?></blockquote>

                        </div>
                        <div class="article-content">
                            <?php if (!empty($article->thumb)): ?>
                                <img src="<?php echo $article->thumb; ?>"/>
                            <?php endif; ?>
                            <?php echo $article->content; ?>
                        </div>
                        <hr/>
                        
                        <div class="footer">

                        </div>

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
  <?php $this->load->view('includes/footer');?>
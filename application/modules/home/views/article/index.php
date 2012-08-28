<?php $this->load->view('includes/header')?>
        <div class="main">
            <div class="container">

                <div class="row">
                    <div class="span3 pull-left">
                        <img src="<?php echo $profile->logo; ?>"/>
                        <hr>
                        
                    </div>
                    <div class="span9 pull-right">
                        <table>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td>
                                        <div class="page-header">
                                            <h1 class="page-heading"><?php echo $article['title']; ?></h1>
                                            <p>
                                                <a href="<?php echo base_url('article/'.$article['link']);?>" class="btn btn-primary"><i class="icon-zoom-in"></i> Read</a> 
                                            </p>
                                            <blockquote><?php echo $article['summary']; ?></blockquote>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $this->pagination->create_links(); ?>
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
  <?php $this->load->view('includes/footer');?>
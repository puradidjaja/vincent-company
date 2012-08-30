<?php $this->load->view('includes/header')?>
        <header>
            <div class="container">
                <div class="span4">
                    <img src="<?php echo $avatar_url;?>" alt="" class="thumbnail"/>
                </div>
                <div class="span6 pull-left">
                    <h2>Name : <?php echo $name;?></h2>
                    <h3>Email: <?php echo $email;?></h3>
                </div>
                
            </div>
        </header>
        <div class="main">
            <div class="container">
                <div class="span12">
                    <div class="page-heading">
                        <h1 class="page-header"><i class="icon-bookmark-empty"></i> Profile</h1>
                    </div>
                    <?php echo $_profile;?>
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
                 <?php echo like_comment(array('url' => site_url('about/profile/'.$link), 'width' => 500)); ?>
            </div>

            

        </div>
        <hr>
    </div>
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
       
  <?php $this->load->view('includes/footer');?>
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
                    'shell_color' => '000',
                    'tweets_bg' => 'none',
                    'tweets_color' => '000',
                    'link' => 'grey'
                ))
                ?>
                <hr>
                <h2><i class="icon-facebook-sign icon-large"></i> Likes</h2>
                <?php echo like(array('url' => site_url('article/' . $article->link), 'width' => 300)); ?>
            </div>
            <div class="span9 pull-right">
                <div class="page-header">
                    <h1 class="page-heading"><?php echo $article->title; ?></h1>
                    <p><i class="icon-time"></i> <?php echo $article->create_date; ?>|
                        <i class="icon-comment"></i> <?php echo '(' . count($comments) . ')'; ?>|
                        <i class="icon-user"></i> <?php echo $article->author; ?>
                    </p>
                    <blockquote><?php echo $article->summary; ?></blockquote>

                </div>
                <div class="article-content">
                    <?php if (!empty($article->image_url)): ?>
                        <img src="<?php echo $article->thumb; ?>"/>
                    <?php endif; ?>
                    <?php echo $article->content; ?>
                </div>
                <hr/>
                <div class="comment-form well">
                    <?php echo form_open('home/article/post_comment/' . $article->id); ?>

                    <fieldset><legend>Post Comment</legend>
                        <?php echo form_error('name') ?>
                        <?php echo form_label('Name', 'name'); ?>
                        <input type="text" name="name" class="input-xlarge"/>

                        <?php echo form_error('email') ?>
                        <?php echo form_label('Email', 'email'); ?>
                        <input type="text" name="email" class="input-xlarge"/>

                        <?php echo form_label('content', 'Comment'); ?>
                        <textarea name="content" rows="30" cols="150" style="width: 300px;height: 200px;"></textarea>

                    </fieldset>
                    <div class="form-actions">
                        <?php
                        echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Post', 'class' => 'btn btn-primary'));
                        ?>

                    </div>

                    <?php
                    echo form_close();
                    ?>
                </div>

                <?php if (isset($comments) && count($comments) > 0): ?>
                    <table class="table table-striped">
                        <thead><h2><i class="icon-comment"></i> Comments</h2></thead>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td>
                                    <h3><?php echo $comment->name; ?></h3>
                                    <blockquote><?php echo $comment->content; ?></blockquote>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
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
<?php $this->load->view('includes/footer'); ?>
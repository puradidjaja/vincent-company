<?php $this->load->view('includes/header'); ?>

<div class="span12">
    <h1 class="page-title">Dashboard </h1>
    <div class="row">
        <div class="span7">
            <div class="widget">
                <div class="widget-header">
                    <h3><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;Stats</h3>
                </div>
                <div class="widget-content">
                    <div class="well">


                        <div class="row">
                            <div class="span6">
                                <h1 class="page-header">Page Hit</h1>
                            </div>  	
                            <div class="span1">
                                <h1><?php echo $daily; ?></h1>
                                today						    			
                            </div>

                            <div class="span1">
                                <h1><?php echo $monthly; ?></h1>
                                this month						    			
                            </div>
                            <div class="span1">
                                <h1><?php echo $yearly; ?></h1>
                                this year						    			
                            </div>
                            <div class="span1">
                                <h1><?php echo count($total); ?></h1>
                                total						    			
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span5">
            <div class="widget">
                <div class="widget-header">
                    <h3><i class="icon-info-sign icon-large"></i>&nbsp;&nbsp;Website Profile</h3>
                    <i class="icon-pencil"></i><a href="<?php echo site_url('admin/profile/'.$profile->id) ?>" title="edit"> edit </a>
                </div>
                <div class="widget-content">
                    <p><strong>Website Name: <?php echo $profile->website_name; ?></strong></p>
                    <img src="<?php echo $profile->logo_thumb; ?>" alt="" class="thumbnail" id="preview-thumb"/><br>
                    <p>Address:
                    <span>
                        <?php echo $profile->address; ?>
                    </span>
                    </p>
                    <p>Contact:
                        <span>
                            <?php echo $profile->email;?>|<?php echo $profile->contact;?>
                        </span>
                    </p>
                </div>

            </div>
        </div>
    </div>


    <?php $this->load->view('includes/footer'); ?>
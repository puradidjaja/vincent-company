<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3>Account</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open('admin/change_email'); ?>

                <fieldset><legend>Change Email</legend>

                    <?php echo form_error('email') ?>
                    <?php echo form_label('Email', 'email'); ?>
                    <div class="input-append">
                        <input type="text" name="email" class="input-xlarge" 
                               value="<?php echo (set_value('email')) ? set_value('email') : $account_data->email; ?>"
                               /> <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => '<i class="icon-ok"></i> Save', 'class' => 'btn'));
                    ?>

                    </div>

                </fieldset>
               
                <?php
                echo form_close();
                ?>
                <?php echo form_open('admin/change_password'); ?>
                    <fieldset><legend>Change Password</legend>
                    <?php echo form_error('password'); ?>
                    <?php echo form_label('New Password', 'password'); ?>
                    <input type="password" name="password" class="input-xlarge"/>
                    
                    <?php echo form_error('passconf'); ?>
                    <?php echo form_label('Password Confirmation', 'passconf'); ?>
                    <input type="password" name="passconf" class="input-xlarge"/>
                    <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('admin'); ?>" class="btn">Cancel</a>
                </div>
                
                    </fieldset>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
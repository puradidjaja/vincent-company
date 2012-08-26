<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3>Account</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open($action); ?>

                <fieldset><legend>Account</legend>

                    <?php echo form_error('email') ?>
                    <?php echo form_label('Email', 'email'); ?>
                    <input type="text" name="email" class="input-xlarge" value="<?php echo (set_value('email'))?set_value('email'):$account_data['email'];?>"/>


                    <?php echo form_error('password'); ?>
                    <?php echo form_label('Password', 'password'); ?>
                    <input type="password" name="password" class="input-xlarge"/>
                    
                    <?php echo form_error('passconf'); ?>
                    <?php echo form_label('Password Confirmation', 'passconf'); ?>
                    <input type="password" name="passconf" class="input-xlarge"/>

                    <?php echo form_error('name') ?>
                    <?php echo form_label('Name', 'name'); ?>
                    <input type="text" name="name" class="input-xlarge" value="<?php echo (set_value('name'))?set_value('name'):$account_data['name'];?>"/>

                    <?php echo form_label('Role', 'role'); ?>
                    <?php echo form_dropdown('role', array(1 => 'admin', 2 => 'member'), (set_value('role'))?set_value('role'):2); ?>

                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('admin/account'); ?>" class="btn">Cancel</a>
                </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
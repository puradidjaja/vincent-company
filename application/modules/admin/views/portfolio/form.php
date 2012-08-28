
<?php $this->load->view('includes/header'); ?>
<div class="span12">

    <div class="widget">
        <div class="widget-header">
            <h3>Product</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php echo form_open($action); ?>

                <fieldset><legend>Article</legend>

                    <?php echo form_error('year') ?>
                    <?php echo form_label('Year', 'year'); ?>
                   <?php echo "<select name=" . 'year' . ">\n";
                        $useDate=time();
                        $startYear = DATE( "Y", $useDate);
                        for($currentYear = $startYear - 30; $currentYear <= $startYear;$currentYear++)
                        {
                        echo "<option value='".$currentYear."'";
                                      if(date( "Y", $useDate)==$currentYear)
                                      {
                                      echo " selected";
                                      }
                                      echo ">$currentYear\n";
                                      }
                                     echo "</select>";
                    ?>
                    <?php echo form_error('project') ?>
                    <?php echo form_label('Project', 'project'); ?>
                    <input type="text" name="project" class="input-xlarge" value="<?php echo (set_value('project'))?set_value('project'):$portfolio_data['project'];?>"/>
                   
                    <?php echo form_label('Experties', 'experties'); ?>
                    <input type="text" name="experties" class="input-xlarge" value="<?php echo (set_value('experties'))?set_value('experties'):$portfolio_data['experties'];?>"/>
                    
                    <?php echo form_label('Client', 'client'); ?>
                    <input type="text" name="client" class="input-xlarge" value="<?php echo (set_value('client'))?set_value('client'):$portfolio_data['client'];?>"/>
                    
                    <?php echo form_label('Function','function');?>
                    <textarea name="function" style="width: 412px;height: 120px;"><?php echo (set_value('function'))?set_value('function'):$portfolio_data['function'];?></textarea>
                    
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Save', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('admin/portfolio'); ?>" class="btn">Cancel</a>
                </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>
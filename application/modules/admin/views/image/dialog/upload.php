<html>
    <head>
        <title>Upload File</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js'); ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        <div id="content">
            <div class="container">
                <div class="row">
                    <div span="12">
                         

                        <div class="widget">
                            <div class="widget-header">
                                <h3>Image Upload</h3>
                            </div>
                            <div class="widget-content">

                                <?php echo form_open_multipart('admin/image/upload/'.$wysiwyg, '', 'id="image-form" class="form well"') ?>
                                <?php
                                if (!empty($error)):
                                    echo "<p>" . $error . "</p>";
                                endif;
                                ?>
                                <div id="html-upload-ui" class="hide-if-js">
                                    <p id="async-upload-wrap">
                                        <label class="screen-reader-text" for="userfile">Upload</label>
                                        <input type="file" name="userfile" id="userfile" />
                                        <input type="submit" name="html-upload" id="html-upload" class="btn" value="Upload"  />      
                                    </p>
                                    <div class="clear"></div>


                                    <span class="max-upload-size">Maximum upload file size: 2MB.</span>
                                    <span class="after-file-upload">After a file has been uploaded, you can add titles and descriptions.</span>
                                </div>
                                <?php echo form_close(); ?>
                                <?php if (!empty($success_upload)): ?>
                                    <?php $this->load->view('image/dialog/upload_success') ?>
                                <?php endif; ?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
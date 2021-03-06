<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js',
        'tiny_mce/tiny_mce.js', 'wysiwyg.image.tinymce.js', 'fancybox.setting.js'
    ),
    'css' => array(
        'fancybox/jquery.fancybox.css',
        'fancybox/jquery.fancybox-buttons.css',
        'fancybox/jquery.fancybox-thumbs.css',
    ),
    'js_url' => array('http://maps.google.com/maps/api/js?sensor=false')
);
?>
<?php $this->load->view('includes/header', $assets); ?>
<?php
$x = -1.4981274943586464;
$y = 118.38712968593495;
$zoom = 5;
if ($profile->addr_x != 0.00000 && $profile->addr_y != 0.00000) {
    $x = $profile->addr_x;
    $y = $profile->addr_y;
    $zoom = 18;
}
?>
<script type="text/javascript">
    var peta;
    function init_map(){
        // daftar_lokasi();
        var x=$('#xcord').val();
        var y=$('#ycord').val();
       
        var currentArea = new google.maps.LatLng(x, y);
        var petaoption = {
            zoom: <?php echo $zoom; ?>,
            center: currentArea,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        peta=new google.maps.Map(document.getElementById("petaku"),petaoption);
        create_marker(x, y);
        google.maps.event.addListener(peta,'click',function(event){
            init_form(event.latLng);
        });
    }
        
    function create_marker(lat,lng){
      
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            map: peta
        });
        
        return marker;
    }
            
    function init_form(lokasi){
       
        $("#cx").val(lokasi.lat());
        $("#cy").val(lokasi.lng());
        
    }

            
</script>
<div class="span12">
    <h1 class="page-title">Profile </h1>
    <div class="row">

        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <h3><i class="icon-info-sign icon-large"></i>&nbsp;&nbsp;Website Profile</h3>
                    <input id="area-id" type="hidden" value="<?php echo $profile->id; ?>"/>

                    <input id="xcord" type="hidden" value="<?php echo $x; ?>"/>
                    <input id="ycord" type="hidden" value="<?php echo $y; ?>"/>
                    <input id="zoom_level" type="hidden" value="<?php echo $zoom; ?>"/>
                </div>
                <div class="widget-content">
                    <?php echo form_open('admin/profile/' . $profile->id); ?>
                    <div id="form_store"  class="well">
                        <legend>Web Site Information</legend>
                        Company Name: <br>
                        <input type="text" name="company_name" id="company_name" class="input-xlarge" value="<?php echo $profile->company_name; ?>"/><br>
                        Slogan: <br>
                        <input type="text" name="slogan" id="slogan" class="input-xlarge" value="<?php echo $profile->slogan; ?>"/><br>
                        Website Name: <br>
                        <input type="text" name="website_name" id="website_name" class="input-xlarge" value="<?php echo $profile->website_name; ?>"/>
                        <legend>Area Information</legend>
                        <div id="petaku" style="height:400px"></div>
                        Coordinate : <br>X<input type=text name=latlng id=cx size=25 value="<?php echo $profile->addr_x; ?>">, Y<input type=text name=latlngy id=cy size=25 value="<?php echo $profile->addr_y; ?>"><br>

                        Address :<br>
                        <textarea id="address" name="address"><?php echo $profile->address; ?></textarea><br/>
                        <legend>Contact Information</legend>
                        <?php echo form_label('Email', 'email'); ?><br>
                        <?php echo form_error('email'); ?>
                        <input type="text" name="email" id="email" class="input-xlarge" value="<?php echo $profile->email; ?>"/><br/>
                        Contact:<br>
                        <input type="text" name="contact" id="contact" class="input-xlarge" value="<?php echo $profile->contact; ?>"/>


                        <legend>About Company</legend>
                        <button id="wysiwygImage" class="btn"><i class="icon-picture" ></i> Insert Image </button>
                        <textarea name="content" class="mceEditor"><?php echo $profile->about; ?></textarea>

                        Image URL:<br/>
                        <div class="input-append">
                            <input type="text" name="logo" id="logo_url" class="input-xlarge" value="<?php echo $profile->logo; ?>"/><button class="btn" id="setImage" type="button"><i class="icon-upload-alt"></i></button>
                        </div>
                        <input type="text" name="thumb" id="logo_thumb" value="<?php echo $profile->logo_thumb; ?>" style="display: none;"/>
                        <img src="" alt="" class="thumbnail" id="preview-thumb"/>
                        <legend>Company Video</legend>
                        Home Page Vide:<br/>
                        <select name="home_video">
                            <?php foreach ($videos as $video): ?>

                                <option value="<?php echo $video->src; ?>"><?php echo $video->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-twitter"></i></span><input class="input-xlarge" id="prependedInput" name="twitter" type="text" value="<?php echo $profile->twitter; ?>"/>
                        </div>
                       
                        <div class="form-actions">
                            <?php
                            echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Save', 'class' => 'btn btn-primary'));
                            ?>

                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
</div>

<script>
  
    
    $(document).ready(function(){
        init_wysiwyg(site_url+'admin/image/upload_form/1/1');
        init_fancybox(site_url+"admin/image/upload_form/1/0");
        init_map();
        
        
    });

</script>
<?php $this->load->view('includes/footer'); ?>
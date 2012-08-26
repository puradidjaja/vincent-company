<?php
$assets = array(
    'js' => array(
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js'
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
<?php $x=-1.4981274943586464;$y=118.38712968593495;$zoom=5;
                  if($profile->addr_x!=0.00000 && $profile->addr_y!=0.00000){
                      $x=$profile->addr_x;
                      $y=$profile->addr_y;
                      $zoom=18;
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
            zoom: <?php echo $zoom;?>,
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
    <h1 class="page-title">Dashboard </h1>
<div class="row">
    <div class="span12">
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
                        <h1><?php echo count($daily);?></h1>
                        today						    			
                    </div>
                   
                    <div class="span1">
                       <h1><?php echo count($monthly);?></h1>
                        this month						    			
                    </div>
                    <div class="span1">
                       <h1><?php echo count($yearly);?></h1>
                        this year						    			
                    </div>
                    <div class="span1">
                        <h1><?php echo count($total);?></h1>
                        total						    			
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span12">
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-info-sign icon-large"></i>&nbsp;&nbsp;Website Information</h3>
            <input id="area-id" type="hidden" value="<?php echo $profile->id; ?>"/>
            
            <input id="xcord" type="hidden" value="<?php echo $x; ?>"/>
            <input id="ycord" type="hidden" value="<?php echo $y; ?>"/>
            <input id="zoom_level" type="hidden" value="<?php echo $zoom;?>"/>
        </div>
        <div class="widget-content">
            <?php echo form_open('admin/update_profile/'.$profile->id); ?>
          
              
            <div id="form_store"  class="well">
                  <legend>Area Information</legend>
                <div id="petaku" style="height:400px"></div>
                Coordinate : <br>X<input type=text name=latlng id=cx size=25 value="<?php echo $profile->addr_x;?>">, Y<input type=text name=latlngy id=cy size=25 value="<?php echo $profile->addr_y;?>"><br>
               
                Address :<br>
                <textarea id="address" name="address"><?php echo $profile->address;?></textarea><br/>
                <legend>Contact Information</legend>
                Email:<br>
                <input type="text" name="email" id="email" class="input-xlarge" value="<?php echo $profile->email;?>"/><br/>
                Contact:<br>
                <input type="text" name="contact" id="contact" class="input-xlarge" value="<?php echo $profile->contact;?>"/>
                
                
                <legend>About Company</legend>
                
                <textarea name="content" style="width: 400px; height: 107px;"><?php echo $profile->about;?></textarea>
                <legend>Company Logo</legend>
                Image URL:<br/>
                <div class="input-append">
                    <input type="text" name="logo" id="logo_url" class="input-xlarge" value="<?php echo $profile->logo;?>"/><button class="btn" id="setImage" type="button"><i class="icon-upload-alt"></i></button>
                </div>
                <div class="logo-preview">
                    <img src="<?php echo $profile->logo;?>" alt="" class="thumbnail"/>
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
      
        init_map();
        $("#setImage").fancybox({

            'width'				: '60%',

            'height'			: '80%',

            'hideOnOverlayClick': false, 

            'autoScale'			: false,

            'transitionIn'		: 'elastic',

            'transitionOut'		: 'elastic',

            'type'				: 'iframe',

            'href' : site_url+'admin/logo_form'

        });
                
        
    });

</script>
<?php $this->load->view('includes/footer'); ?>
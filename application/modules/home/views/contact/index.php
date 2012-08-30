<?php
$assets = array(
    
    'js_url' => array('http://maps.google.com/maps/api/js?sensor=false')
);
?>
<?php $x=4.561329125776635;$y=116.79411210781245;$zoom=5;
                  if($profile->addr_x!=0.00000 && $profile->addr_y!=0.00000){
                      $x=$profile->addr_x;
                      $y=$profile->addr_y;
                      $zoom=15;
                  }
            ?>
<?php $this->load->view('includes/header',$assets) ?>
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
<header>
    <div class="container">
         <input id="xcord" type="hidden" value="<?php echo $x; ?>"/>
            <input id="ycord" type="hidden" value="<?php echo $y; ?>"/>
            <input id="zoom_level" type="hidden" value="<?php echo $zoom;?>"/>
        <div class="row">
            <div class="page-heading">
                <h2 class="page-header"><i class="icon-home"></i> Address & Contact</h2>
                
            </div>
             <div class="span3">
                <h3><?php echo $profile->address;?></h3>
                <p style="display: none;"><?php echo $profile->addr_x;?></p>
                <p style="display: none;"><?php echo $profile->addr_y;?></p>
            </div>
            <div class="span6">
                <div id="petaku" style="height:300px"></div>
            </div>
            
             <div class="span3">
                <h3><?php echo $profile->email;?></h3>
                <h3><?php echo $profile->contact;?></h3>
            </div>
        </div>
      
    </div>
</header>
<br/>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="span3 pull-left">
              <div class="page-heading">
                  <h2 class="page-header"><i class="icon-glass"></i> Find Our Outlet &rarr;</h2>
              </div>
            </div>
            <?php if(isset($area) && count($area)):?>
            <div class="span3 pull-left">
                <ul class="thumbnails">
              <?php foreach($area as $a):?>
                    <li><?php echo $a->name.', '.$a->province;?> 
                     <a href="<?php echo site_url('contact/area/'.$a->name.'/'.$a->id);?>" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                    </li>
              <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>
        </div>
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
<script>
  
    
    $(document).ready(function(){
      
        init_map();
                
        
    });

</script>
<?php $this->load->view('includes/footer'); ?>
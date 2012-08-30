<?php
$assets = array(
    
    'js_url' => array('http://maps.google.com/maps/api/js?sensor=false')
);
?>
<?php $x=4.561329125776635;$y=116.79411210781245;$zoom=5;
                  if($area->x!=0.00000 && $area->y!=0.00000){
                      $x=$area->x;
                      $y=$area->y;
                      $zoom=15;
                  }
            ?>
<?php $this->load->view('includes/header',$assets); ?>
<script type="text/javascript">
    var peta;
    var peta;
    function init_map(){
        // daftar_lokasi();
        var x=$('#xcord').val();
        var y=$('#ycord').val();
        var currentArea = new google.maps.LatLng(x, y);
        var petaoption = {
            zoom: 13,
            center: currentArea,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        peta=new google.maps.Map(document.getElementById("petaku"),petaoption);
        init_marker();
        
    }
    function init_marker(){
        id=$('#area-id').val();
        $.getJSON(site_url+'home/contact/detail_json/'+id, function(data){
            console.log(data);
            $.each(data,function(i){
                var contents="<h3>"+data[i].name+"</h3><br/>"+
                    "<p>"+data[i].address+"</p><br/>"+
                    "<p><strong>"+data[i].contact+"</strong></p>";
                var marker=create_marker(data[i].x, data[i].y, contents);
                marker.setMap(peta);
            });
        });
    }
            
    function create_marker(lat,lng,content){
        var infowindow = new google.maps.InfoWindow({
            content: content
        });
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            map: peta
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(peta,marker);
        });   
       
        return marker;
    }
</script>
<header>
    <div class="container">
         <input id="area-id" type="hidden" value="<?php echo $area->id; ?>"/>
         <input id="xcord" type="hidden" value="<?php echo $area->x; ?>"/>
         <input id="ycord" type="hidden" value="<?php echo $area->y; ?>"/>
          
        <div class="row">
            <div class="page-heading">
                <h2 class="page-header"><i class="icon-home"></i> <?php echo $area->name;?></h2>
                
            </div>
             
            <div class="span12">
                <div id="petaku" style="height:600px"></div>
            </div>
            
        </div>
      
    </div>
</header>
<br/>
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
<script>
  
    
    $(document).ready(function(){
      
        init_map();
                
        
    });

</script>
<?php $this->load->view('includes/footer'); ?>
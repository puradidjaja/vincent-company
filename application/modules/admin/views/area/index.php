<?php
$assets = array('js_url' => array('http://maps.google.com/maps/api/js?sensor=false'),
    'css' => array('standard.css'));
?>
<?php $this->load->view('includes/header', $assets); ?>
<script type="text/javascript">
    var peta;
    function init_map(){
        var ind= new google.maps.LatLng(-1.4981274943586464, 118.38712968593495);
        var mapoption={
            zoom: 5,
            center: ind,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        peta=new google.maps.Map(document.getElementById("peta"),mapoption);
        init_marker();
        google.maps.event.addListener(peta,'click',function(event){
            init_form(event.latLng);
        });
    }
    
    function init_form(lokasi){
        $("#form_lokasi").slideDown();
        $("#cx").val(lokasi.lat());
        $("#cy").val(lokasi.lng());
        
    }
    
    
    function init_marker(){
        $.getJSON("<?php echo site_url('admin/area/areas_json'); ?>",function(data){
            $.each(data, function(i){
                console.log(data[i].x+","+data[i].y);
                var content='<a href="'+site_url+'admin/area/detail/'+data[i].id+'">'+data[i].name+'</a>';
                var marker=create_marker(data[i].x, data[i].y, content);
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

<div class="span12">
    <div class="widget">
        <div class="widget-header">
            <h3>Map</h3>
        </div>
        <div class="widget-content">
            <h3>Click on the map the add new Area, click on the marker <i class="icon-map-marker"></i> the view the details</h3>
            <div id="peta"  style="height:400px;">

            </div>
            <div id="form_lokasi" style="display:none;" class="well">
                <legend>Area Info</legend>
                Coordinate : <br>X<input type=text name=latlng id=cx size=25 disabled="true">, Y<input type=text name=latlngy id=cy size=25 disabled="true"><br>
                Location Name : <br><input type=text name="nama" id="namax"><br>
                Province :<br>
                <select id="provincex">
                    <?php foreach ($province as $key => $value): ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-actions">
                    <button id="saveArea" class="btn btn-primary">Save</button>
                    <button id="cancelSave" class="btn">Cancel</button>
                </div>
                <img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" style="display:none" id="loading">

            </div>
        </div>

    </div>
</div>

<script>
  
    
    $(document).ready(function(){
      
        init_map();
                
        $('#saveArea').click(function(){
            var koordinatx = $("#cx").val();
            var koordinaty = $("#cy").val();
            var nama = $("#namax").val();
            var province=$("#provincex").val();
            data_kirim=({
                'name':nama,
                'province':province,
                'x':koordinatx,
                'y':koordinaty
            });
            $("#loading").show();
            $.ajax({
                url:site_url+'admin/area/create',
                data:data_kirim,
                type:'POST',
                success:function(msg){
                    msg=$.parseJSON(msg);
                  
                    var id=msg.id;
                    var location_name=msg.name;
                    var content='<a href="'+site_url+'admin/area/detail/'+id+'">'+location_name+'</a>';
                    var new_marker=create_marker(msg.x, msg.y, content);
                    new_marker.setMap(peta);
                    $("#loading").hide();
                    $("#form_lokasi").slideUp();
                }
            });
        });
        $("#cancelSave").click(function(){
            $("#form_lokasi").slideUp();
        });
    });

</script>
<?php $this->load->view('includes/footer'); ?>
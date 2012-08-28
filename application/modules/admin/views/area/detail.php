<?php
$assets = array('js_url' => array('http://maps.google.com/maps/api/js?sensor=false'),
    'css' => array('standard.css'));
?>
<?php $this->load->view('includes/header', $assets); ?>
<script type="text/javascript">
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
        google.maps.event.addListener(peta,'click',function(event){
            init_form(event.latLng);
        });
    }
    function init_marker(){
        id=$('#area-id').val();
        $.getJSON(site_url+'admin/area/detail_json/'+id, function(data){
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
            
    function init_form(lokasi){
        $("#form_store").slideDown();
        $("#cx").val(lokasi.lat());
        $("#cy").val(lokasi.lng());
        
    }

            
</script>
<div class="span12">
    <div class="widget">
        <div class="widget-header">
            <h3><?php echo $area->name . ', ' . $area->province; ?></h3>
            <a href="<?php echo site_url('admin/area') ?>"title="back to list"><i class="icon-chevron-left"></i> back </a>
            <a href="<?php echo site_url('admin/area/edit/' . $area->id) ?>" title="edit"><i class="icon-pencil"></i> edit </a>
             <a href="#area-modal" class="area-delete-btn" title="Delete" rel="tooltip" data-toggle="modal" 
                   action="<?php echo site_url("admin/area/delete_area/$area->id"); ?>"
                   data-original-title="delete"><i class="icon-trash"></i> delete </a>
            <input id="area-id" type="hidden" value="<?php echo $area->id; ?>"/>
            <input id="xcord" type="hidden" value="<?php echo $area->x; ?>"/>
            <input id="ycord" type="hidden" value="<?php echo $area->y; ?>"/>
        </div>
        <div class="widget-content">
            <h3>Click on the map to add a branch/store to the <span class="label label-info"><?php echo $area->name;?></span> area, click on the marker <i class="icon-map-marker"></i> the view to store details</h3>
            <div id="petaku" style="height:400px"></div>
            <div id="form_store" style="display:none;" class="well">
                <legend>Area Info</legend>
                Coordinate : <br>X<input type=text name=latlng id=cx size=25 disabled="true">, Y<input type=text name=latlngy id=cy size=25 disabled="true"><br>
                Location Name : <br><input type=text name="nama" id="namax"><br>
                Address :<br>
                <textarea id="address" name="address"></textarea><br/>
                Contact:<br>
                <input type="text" name="contact" id="contact" class="input-xlarge"/>
                <div class="form-actions">
                    <button id="saveStore" class="btn btn-primary">Save</button>
                    <button id="cancelSave" class="btn">Cancel</button>
                </div>
                <img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" style="display:none" id="loading">

            </div>
        </div>
        <div class="modal hide fade" id="area-modal">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Delete Area</h3>
            </div>
            <div class="modal-body">
                <p><strong>Are you sure you want to delete this area?</strong></p>
            </div>
            <div class="modal-footer">
                <a id="area-modal-delete-btn" href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        init_map();
        $('.area-delete-btn').click(function() {
                deleteUrl = $(this).attr('action');
            });
            $('#area-modal').on('show', function() {
                $('#area-modal-delete-btn').attr('href', deleteUrl);
            });
        $('#saveStore').click(function(){
            var koordinatx = $("#cx").val();
            var koordinaty = $("#cy").val();
            var nama = $("#namax").val();
            var addr=$("#address").val();
            var contact=$("#contact").val();
            var area_id=$('#area-id').val();
            data_kirim=({
                'name':nama,
                'address':addr,
                'contact':contact,
                'x':koordinatx,
                'y':koordinaty
            });
            $("#loading").show();
            $.ajax({
                url:site_url+'admin/area/create_store/'+area_id,
                data:data_kirim,
                type:'POST',
                success:function(msg){
                    msg=$.parseJSON(msg);
                           
                    var contents="<h3>"+msg.name+"</h3><br/>"+
                        "<p>"+msg.address+"</p><br/>"+
                        "<p><strong>"+msg.contact+"</strong></p>";
                    var new_marker=create_marker(msg.x, msg.y, contents);
                    new_marker.setMap(peta);
                    $("#loading").hide();
                    $("#form_store").slideUp();
                }
            });
        });
        $("#cancelSave").click(function(){
            $("#form_store").slideUp();
        });
    });
</script>
<?php $this->load->view('includes/footer'); ?>
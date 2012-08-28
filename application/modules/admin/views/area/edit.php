<?php
$assets = array('js_url' => array('http://maps.google.com/maps/api/js?sensor=false'),
    'css' => array('standard.css'));
?>
<?php $this->load->view('includes/header', $assets); ?>
<script type="text/javascript">
    var peta;
    function init_map(){
        var ind= new google.maps.LatLng(4.561329125776635, 116.79411210781245);
        var mapoption={
            zoom: 4,
            center: ind,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        peta=new google.maps.Map(document.getElementById("peta"),mapoption);
        google.maps.event.addListener(peta,'click',function(event){
            init_form(event.latLng);
        });
    }
    
    function init_form(lokasi){
        $("#form_lokasi").slideDown();
        $("#cx").val(lokasi.lat());
        $("#cy").val(lokasi.lng());
        
    }

            
</script>
<div class="span12">
    <div class="widget">
        <div class="widget-header">
            <h3><?php echo $area->name . ', ' . $area->province; ?></h3>
            <a href="<?php echo site_url('admin/area') ?>"title="back to list"><i class="icon-chevron-left"></i> back </a>
            <a href="<?php echo site_url('admin/area/detail/' . $area->id) ?>" title="edit"><i class="icon-pencil"></i> edit </a>
            <input id="area-id" type="hidden" value="<?php echo $area->id; ?>"/>
            <input id="xcord" type="hidden" value="<?php echo $area->x; ?>"/>
            <input id="ycord" type="hidden" value="<?php echo $area->y; ?>"/>
        </div>
        <div class="widget-content">
            <h3>Click on the map to edit the map coordinates, <span class="label label-warning">Caution</span> edit the area will removes all its branches/stores locations</h3>
            <div id="peta" style="height:400px"></div>
            <div id="form_lokasi" class="well">
                <?php echo form_open('admin/area/edit/'.$area->id);?>
                <legend>Area Info</legend>
                Coordinate : <br>X<input type=text name=latlng id=cx size=25 value="<?php echo $area->x;?>">, Y<input type=text name=latlngy id=cy size=25 value="<?php echo $area->y;?>"><br>
                <?php echo form_error('name') ?>
                <?php echo form_label('Location Name', 'name'); ?>
                <input type=text name="name" id="name" value="<?php echo $area->name;?>"><br>
                Province :<br>
                <select id="provincex" name="province">
                    <?php foreach ($province as $key => $value): ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-actions">
                    <button id="saveArea" class="btn btn-primary" name="submit" type="submit">Save</button>
                    <button id="cancelSave" class="btn">Cancel</button>
                </div>
                <?php echo form_close();?>
                
            </div>
        </div>
    </div>
</div>
<script>
  
    
    $(document).ready(function(){
      
        init_map();
                
        
    });

</script>


<?php $this->load->view('includes/footer'); ?>
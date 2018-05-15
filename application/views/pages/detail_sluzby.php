<h1>Detaily:</h1>
<div class="row">
    <div class="col-lg-1"><h2>ID</h2></div><div class="col-lg-11"><h4><?php echo $sluzba[0]->ID; ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-adult"></i></i></h2></div><div class="col-lg-11"><h4><?php echo $sluzba[0]->taxikar; ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-car"></i></h2></div><div class="col-lg-11"><h5><?php echo $sluzba[0]->vozidlo; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-play"></i></h2></div><div class="col-lg-11"><h5><?php echo $sluzba[0]->zaciatok_sluzby; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-time"></i></h2></div><div class="col-lg-11"><h5><?php echo $sluzba[0]->dlzka_sluzby; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-bell"></i></h2></div><div class="col-lg-11"><h5><?php echo $sluzba[0]->koniec; ?></h5></div>
</div><br>

<?php echo anchor(base_url()."Sluzby/index", "Späť", ['class' => 'btn btn-primary']) ?>
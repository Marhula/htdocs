<h1>Detaily:</h1>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-car"></i></h2></div><div class="col-lg-11"><h4><?php echo ($vozidla->znacka)." ".($vozidla->model); ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-indent-left"></i></h2></div><div class="col-lg-11"><h5><?php echo $vozidla->spz; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-road"></i></h2></div><div class="col-lg-11"><h5><?php echo $vozidla->najazdeneKM." km"; ?></h5></div>
</div><br>

<?php echo anchor(base_url()."Vozidla/index", "Späť", ['class' => 'btn btn-primary']) ?>
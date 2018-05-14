<h1>Detaily:</h1>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-user"></i></h2></div><div class="col-lg-11"><h4><?php echo ($zakaznici->meno)." ".($zakaznici->priezvisko); ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-phone"></i></h2></div><div class="col-lg-11"><h5><?php echo $zakaznici->tel; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-calendar"></i></h2></div><div class="col-lg-11"><h5><?php echo $zakaznici->mesto; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-smiley"></i></h2></div><div class="col-lg-11"><h5><?php echo $zakaznici->userName; ?></h5></div>
</div><br>

<?php echo anchor(base_url()."Zakaznici/index", "Späť", ['class' => 'btn btn-primary']) ?>
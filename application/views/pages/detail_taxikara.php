<h1>Detaily:</h1>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-user"></i></h2></div><div class="col-lg-11"><h4><?php echo ($taxikari->meno)." ".($taxikari->priezvisko); ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-phone"></i></h2></div><div class="col-lg-11"><h5><?php echo $taxikari->telCislo; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-1"><h2><i class="el el-calendar"></i></h2></div><div class="col-lg-11"><h5><?php echo $taxikari->zamestnany; ?></h5></div>
</div><br>
<?php echo anchor('taxikari', "Späť", ['class' => 'btn btn-primary']) ?>
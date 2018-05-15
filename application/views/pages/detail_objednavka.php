<h1>Detaily:</h1>
<div class="row">
    <div class="col-lg-2"><h2>ID</h2></div><div class="col-lg-10"><h4><?php echo $objednavka[0]->ID; ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h3>ID Služby</h3></div><div class="col-lg-10"><h4><?php echo $objednavka[0]->sluzba_ID; ?></h4></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h2>Smena</h2></div><div class="col-lg-10"><h5><?php echo $objednavka[0]->trvanie; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h2><i class="el el-adult"></i></h2></div><div class="col-lg-10"><h5><?php echo $objednavka[0]->zakaznik; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h2>Stav</div><div class="col-lg-10"><h5><?php echo $objednavka[0]->stav; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h2><i class="el el-eur"></i></h2></div><div class="col-lg-10"><h5><?php echo $objednavka[0]->cena; ?></h5></div>
</div><br>
<div class="row">
    <div class="col-lg-2"><h2><i class="el el-road"></i></h2></div><div class="col-lg-10"><h5><?php echo $objednavka[0]->pocetKM; ?></h5></div>
</div><br>

<?php echo anchor(base_url()."Objednavky/index", "Späť", ['class' => 'btn btn-primary']) ?>
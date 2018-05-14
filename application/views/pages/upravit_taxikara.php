<?php echo form_open("Taxikari/upravitTaxikara/{$taxikari->ID}"); ?>
<div class="form-group">
    <?php echo form_input(['name' => 'meno', 'placeholder' => 'Meno', 'class' => 'form-control','value'=>set_value('meno',$taxikari->meno)]);
    echo form_error('meno', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'priezvisko', 'placeholder' => 'Priezvisko', 'class' => 'form-control','value'=>set_value('priezvisko',$taxikari->priezvisko)]);
    echo form_error('priezvisko', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'telCislo', 'placeholder' => 'Telefónne číslo', 'class' => 'form-control','value'=>set_value('telCislo',$taxikari->telCislo)]);
    echo form_error('telCislo', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<?php echo anchor(base_url()."/Taxikari/index", "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Upraviť", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>

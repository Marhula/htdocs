<?php echo form_open('Taxikari/ulozit'); ?>
<div class="form-group">
    <?php echo form_input(['name' => 'meno', 'placeholder' => 'Meno', 'class' => 'form-control']);
    echo form_error('meno', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'priezvisko', 'placeholder' => 'Priezvisko', 'class' => 'form-control']);
    echo form_error('priezvisko', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'telCislo', 'placeholder' => 'Telefónne číslo', 'class' => 'form-control']);
    echo form_error('telCislo', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<?php echo anchor('taxikari', "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Pridať", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>

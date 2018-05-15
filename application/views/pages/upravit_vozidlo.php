<?php echo form_open("Vozidla/upravit_vozidlo/{$vozidla->ID}"); ?>
    <div class="form-group">
        <?php echo form_input(['name' => 'znacka', 'placeholder' => 'Značka', 'class' => 'form-control','value'=>set_value('znacka',$vozidla->znacka)]);
        echo form_error('znacka', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'model', 'placeholder' => 'Model', 'class' => 'form-control','value'=>set_value('model',$vozidla->model)]);
        echo form_error('model', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'spz', 'placeholder' => 'ŠPZ', 'class' => 'form-control','value'=>set_value('spz',$vozidla->spz)]);
        echo form_error('spz', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'najazdeneKM','type'=>'number' ,'placeholder' => 'Počet najazdených km', 'class' => 'form-control','value'=>set_value('najazdeneKM',$vozidla->najazdeneKM)]);
        echo form_error('najazdeneKM', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
<?php echo anchor(base_url() . "Vozidla/index", "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Upraviť", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>
<?php echo form_open("Zakaznici/upravit_zakaznika/{$zakaznici->ID}"); ?>
    <div class="form-group">
        <?php echo form_input(['name' => 'meno', 'placeholder' => 'Meno', 'class' => 'form-control','value'=>set_value('meno',$zakaznici->meno)]);
        echo form_error('meno', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'priezvisko', 'placeholder' => 'Priezvisko', 'class' => 'form-control','value'=>set_value('priezvisko',$zakaznici->priezvisko)]);
        echo form_error('priezvisko', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'tel', 'placeholder' => 'Telefónne číslo', 'class' => 'form-control','value'=>set_value('tel',$zakaznici->tel)]);
        echo form_error('tel', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'mesto', 'placeholder' => 'Mesto', 'class' => 'form-control','value'=>set_value('mesto',$zakaznici->mesto)]);
        echo form_error('mesto', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'userName', 'placeholder' => 'Prihlasovacie meno', 'class' => 'form-control','value'=>set_value('userName',$zakaznici->userName)]);
        echo form_error('userName', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
    <div class="form-group">
        <?php echo form_input(['name' => 'heslo', 'placeholder' => 'Heslo', 'class' => 'form-control', 'type'=>'password']);
        echo form_error('heslo', '<span class="badge badge-danger">', '</span>'); ?>
    </div>
<?php echo anchor(base_url()."Zakaznici/index", "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Upraviť", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>
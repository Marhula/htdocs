
<?php echo form_open('Sluzby/ulozit'); ?>
<div class="form-group">
    <?php if (count($taxikari)): ?>
        <label for="vodici">Vodič:</label>
        <select class="form-control" name="taxikar" id="vodici">
            <?php foreach ($taxikari as $taxikar): ?>
                <option value="<?php echo $taxikar->IDtaxikar; ?>"><?php echo $taxikar->meno . " (ID: " . $taxikar->IDtaxikar . ")"; ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <div class="alert alert-danger">
            <strong>Pozor!</strong> Tabuľka vodičov je prázdna!
        </div>
    <?php endif ?>
</div>
<div class="form-group">
    <?php if (count($vozidla)): ?>
        <label for="vozidla">Vozidlo:</label>
        <select class="form-control" name="auto_ID" id="vozidla">
            <?php foreach ($vozidla as $vozidlo): ?>
                <option value="<?php echo $vozidlo->IDauto; ?>"><?php echo $vozidlo->auto . " (ID: " . $vozidlo->IDauto . ")"; ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <div class="alert alert-danger">
            <strong>Pozor!</strong> Tabuľka vodičov je prázdna!
        </div>
    <?php endif ?>
</div>
<div class="form-group">
    <div class="input-group date form_datetime " data-date="" data-date-format="yyyy-mm-dd hh:ii:00" data-link-field="dtp_input1">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        <input class="form-control" size="16" type="text"  name="zaciatok_sluzby" placeholder="Začiatok služby">

    </div>
</div>
<div class="form-group">
    <div class="input-group date form_time" data-date="" data-date-format="hh:ii:00" data-link-field="dtp_input2">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        <input class="form-control" size="16" type="text"  name="dlzka_sluzby" placeholder="Dĺžka služby služby">

    </div>
</div>
<?php if (count($taxikari) || count($vozdila)) : ?>
    <?php echo anchor(base_url() . "Sluzby/index", "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php endif ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Pridať", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.sk.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language: 'sk',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
    });
    $('.form_time').datetimepicker({
        language: 'sk',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>


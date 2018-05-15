<?php echo form_open("Objednavky/upravitObjednavku/{$objednavka[0]->ID}"); ?>
<div class="form-group">
    <?php if (count($sluzby)): ?>
        <label for="sluzby">Služba:</label>
        <select class="form-control" name="sluzba_ID" id="sluzby">
            <?php foreach ($sluzby as $sluzba): ?>
                <option value="<?php echo $sluzba->ID; ?>"<?php if ($objednavka[0]->sluzba_ID == $sluzba->ID) {
                    echo "selected";
                } ?>><?php echo $sluzba->ID; ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <div class="alert alert-danger">
            <strong>Pozor!</strong> Tabuľka služieb je prázdna!
        </div>
    <?php endif ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'pocetKM', 'type' => 'number', 'placeholder' => 'Vzdialenost (km)', 'class' => 'form-control', 'value' => set_value('priezvisko', $objednavka[0]->pocetKM)]);
    echo form_error('pocetKM', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php echo form_input(['name' => 'cena', 'type' => 'number', 'placeholder' => 'Cena (€)', 'step' => '0.05', 'class' => 'form-control', 'value' => set_value('priezvisko', $objednavka[0]->cena)]);
    echo form_error('cena', '<span class="badge badge-danger">', '</span>'); ?>
</div>
<div class="form-group">
    <?php if (count($zakaznici)): ?>
        <label for="zakaznici">Zakaznik:</label>
        <select class="form-control" name="zakaznik_ID" id="zakaznici">
            <?php foreach ($zakaznici as $zakaznik): ?>
                <option value="<?php echo $zakaznik->IDzakaznika; ?>"<?php if ($objednavka[0]->zakaznik_ID == $zakaznik->IDzakaznika) {
                    echo "selected";
                } ?>><?php echo $zakaznik->meno . " (ID: " . $zakaznik->IDzakaznika . ")"; ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <div class="alert alert-danger">
            <strong>Pozor!</strong> Tabuľka zakaznikov je prázdna!
        </div>
    <?php endif ?>
</div>
<div class="form-group">
    <label for="stav">Stav:</label>
    <select class="form-control" name="stav" id="stav">
        <option value="Spracovaná">Spracovaná</option>
        <option value="Zaplatená">Zaplatená</option>
        <option value="Vybavená">Vybavená</option>
    </select>
</div>
<div class="form-group">
    <div class="input-group date form_datetime " data-date="" data-date-format="yyyy-mm-dd hh:ii:00"
         data-link-field="dtp_input1">
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        <input class="form-control" size="16" type="text" value="<?php echo $objednavka[0]->kedy ?>" name="kedy"
               placeholder="Deň a čas odvozu">
    </div>
</div>

<?php echo anchor(base_url() . "Objednavky/index", "Zrušiť", ['class' => 'btn btn-primary']) ?>
<?php echo form_submit(['name' => 'submit', 'value' => "Upraviť", 'class' => 'btn btn-primary']); ?>
<?php echo form_close(); ?>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"
        charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/locales/bootstrap-datetimepicker.sk.js"
        charset="UTF-8"></script>
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


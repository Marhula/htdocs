<h2>Objednavky</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>ID Služby</th>
            <th>Zakáznik</th>
            <th>Stav</th>
            <th>Posledná zmena</th>
            <th>Dátum</th>
            <th>Vzdialenosť</th>
            <th><?php echo anchor(base_url().'Objednavky/pridat', "Pridať Objednavku", ['class' => 'btn btn-primary']) ?><?php echo anchor(base_url().'Objednavky/export', "Export", ['class' => 'btn btn-primary']) ?></th>
</tr>
</thead>
<tbody>
<?php if (count($objednavky)): ?>
    <?php foreach ($objednavky as $objednavka): ?>
        <tr>
            <td><?php echo $objednavka->ID; ?></td>
            <td><?php echo $objednavka->sluzba_ID; ?></td>
            <td><?php echo $objednavka->zakaznik; ?></td>
            <td><?php echo $objednavka->stav; ?></td>
            <td><?php echo $objednavka->posledna_zmena; ?></td>
            <td><?php echo $objednavka->kedy; ?></td>
            <td><?php echo $objednavka->pocetKM; ?></td>
            <td>
                <?php echo anchor("Objednavky/detail/{$objednavka->ID}", "<i class=\"el el-eye-open\"></i>", ['class' => 'btn text-info']) ?>
                <?php echo anchor("Objednavky/upravit/{$objednavka->ID}", "<i class=\"el el-edit\"></i>", ['class' => 'btn text-success']) ?>
                <?php echo anchor("Objednavky/delete/{$objednavka->ID}", "<i class=\"el el-trash\"></i>", ['class' => 'btn text-danger']) ?>
            </td>
        </tr>
    <?php endforeach; ?>

<?php else: ?>
    <tr>
        <td>
            Nenašli sa žiadny zákazncíci!
        </td>
    </tr>
<?php endif ?>
</tbody>
</table>
<div>
    <?php foreach ($links as $link) {
        echo  $link ;
    } ?>

</div>
</div>
<?php echo anchor(base_url().'Objednavky/export', "Export do CSV", ['class' => 'btn btn-primary']) ?>

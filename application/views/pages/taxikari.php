<h2>Naši vodiči</h2>
<p>sú najrýchleší na svete</p>
<div class="table-responsive">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Telefónne číslo</th>
            <th><?php echo anchor('/pridat_taxikara', "Pridať Taxikára", ['class' => 'btn btn-primary']) ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($taxikari)): ?>
            <?php foreach ($taxikari as $taxikar): ?>
                <tr>
                    <td><?php echo $taxikar->meno; ?></td>
                    <td><?php echo $taxikar->priezvisko; ?></td>
                    <td><?php echo $taxikar->telCislo; ?></td>
                    <td>
                        <?php echo anchor("Taxikari/detail/{$taxikar->ID}", "<i class=\"el el-eye-open\"></i>", ['class' => 'btn text-info']) ?>
                        <?php echo anchor("Taxikari/upravit/{$taxikar->ID}", "<i class=\"el el-edit\"></i>", ['class' => 'btn text-success']) ?>
                        <?php echo anchor("Taxikari/delete/{$taxikar->ID}", "<i class=\"el el-trash\"></i>", ['class' => 'btn text-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td>
                Nenašli sa žiadny taxikári!
            </td>
        </tr>
        </tbody>
    </table>
</div>
<?php endif ?>

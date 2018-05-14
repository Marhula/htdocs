<h2>Naši Zákazníci</h2>
<p>sú najšťastnejši na svete</p>
<div class="table-responsive">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Telefónne číslo</th>
            <th>Mesto</th>
            <th><?php echo anchor(base_url().'Zakaznici/pridat', "Pridať Zákazníka", ['class' => 'btn btn-primary']) ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($zakaznici)): ?>
            <?php foreach ($zakaznici as $zakaznik): ?>
                <tr>
                    <td><?php echo $zakaznik->meno; ?></td>
                    <td><?php echo $zakaznik->priezvisko; ?></td>
                    <td><?php echo $zakaznik->tel; ?></td>
                    <td><?php echo $zakaznik->mesto; ?></td>
                    <td>
                        <?php echo anchor("Zakaznici/detail/{$zakaznik->ID}", "<i class=\"el el-eye-open\"></i>", ['class' => 'btn text-info']) ?>
                        <?php echo anchor("Zakaznici/upravit/{$zakaznik->ID}", "<i class=\"el el-edit\"></i>", ['class' => 'btn text-success']) ?>
                        <?php echo anchor("Zakaznici/delete/{$zakaznik->ID}", "<i class=\"el el-trash\"></i>", ['class' => 'btn text-danger']) ?>
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
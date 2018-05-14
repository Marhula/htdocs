<h2>Naše Vozidla</h2>
<p>sú najspolahlivejšie na svete</p>
<div class="table-responsive">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Značka</th>
            <th>Model</th>
            <th>ŠPZ</th>
            <th><?php echo anchor(base_url().'Vozidla/pridat', "Pridať Vozidlo", ['class' => 'btn btn-primary']) ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($vozidla)): ?>
            <?php foreach ($vozidla as $vozidlo): ?>
                <tr>
                    <td><?php echo $vozidlo->znacka; ?></td>
                    <td><?php echo $vozidlo->model; ?></td>
                    <td><?php echo $vozidlo->spz; ?></td>
                    <td>
                        <?php echo anchor("Vozidla/detail/{$vozidlo->ID}", "<i class=\"el el-eye-open\"></i>", ['class' => 'btn text-info']) ?>
                        <?php echo anchor("Vozidla/upravit/{$vozidlo->ID}", "<i class=\"el el-edit\"></i>", ['class' => 'btn text-success']) ?>
                        <?php echo anchor("Vozidla/delete/{$vozidlo->ID}", "<i class=\"el el-trash\"></i>", ['class' => 'btn text-danger']) ?>
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
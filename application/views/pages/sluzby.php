<h2>Služby</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vodič</th>
            <th>Vozidlo</th>
            <th>Začíatok</th>
            <th>Dĺžka</th>
            <th>Koniec</th>
            <th><?php echo anchor(base_url().'Sluzby/pridat', "Pridať Službu", ['class' => 'btn btn-primary']) ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($sluzby)): ?>
            <?php foreach ($sluzby as $sluzba): ?>
                <tr>
                    <td><?php echo $sluzba->ID; ?></td>
                    <td><?php echo $sluzba->taxikar; ?></td>
                    <td><?php echo $sluzba->vozidlo; ?></td>
                    <td><?php echo $sluzba->zaciatok_sluzby; ?></td>
                    <td><?php $arr=explode(":",$sluzba->dlzka_sluzby); echo $arr[0]."h ".$arr[1]."min"; ?></td>
                    <td><?php echo $sluzba->koniec; ?></td>
                    <td>
                        <?php echo anchor("Sluzby/detail/{$sluzba->ID}", "<i class=\"el el-eye-open\"></i>", ['class' => 'btn text-info']) ?>
                        <?php echo anchor("Sluzby/upravit/{$sluzba->ID}", "<i class=\"el el-edit\"></i>", ['class' => 'btn text-success']) ?>
                        <?php echo anchor("Sluzby/delete/{$sluzba->ID}", "<i class=\"el el-trash\"></i>", ['class' => 'btn text-danger']) ?>
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
</script>
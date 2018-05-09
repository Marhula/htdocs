
<h2>Naši vodiči</h2>
  <p>Najrýchleší vodiči na svete</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>Telefone cislo</th>
        <th><?php echo anchor('/pridat_taxikara', "Pridať Taxikára",['class'=>'btn btn-primary'])?></th>
      </tr>
    </thead>
    <tbody>
    <?php if(count($taxikari)):?>
        <?php foreach ($taxikari as $taxikar):?>
      <tr>
        <td><?php echo $taxikar->meno;?></td>
        <td><?php echo $taxikar->priezvisko;?></td>
        <td><?php echo $taxikar->telCislo;?></td>
        <td>
              <?php echo anchor('Taxikari/detail', "<i class=\"el el-eye-open\"></i>",['class'=>'btn'])?>
              <?php echo anchor('Taxikari/edit', "<i class=\"el el-edit\"></i>",['class'=>'btn'])?>
              <?php echo anchor('Taxikari/delete', "<i class=\"el el-trash\"></i>",['class'=>'btn'])?>
        </td>
      </tr>
        <?php endforeach;?>
    <?php else:?>
    <tr>
        <td>
            Nenašli sa žiadny taxikári!
        </td>
    </tr>
    </tbody>
  </table>
</div>
<?php endif?>
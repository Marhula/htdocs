
<h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Meno</th>
        <th>Priezviko</th>
        <th>Telefonne cislo</th>
        <th><?php echo anchor('Taxikari/pridat', "Pridať Taxikára",['class'=>'btn btn-primary'])?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>
              <?php echo anchor('Taxikari/detail', "<i class=\"el el-eye-open\"></i>",['class'=>'btn'])?>
              <?php echo anchor('Taxikari/edit', "<i class=\"el el-edit\"></i>",['class'=>'btn'])?>
              <?php echo anchor('Taxikari/delete', "<i class=\"el el-trash\"></i>",['class'=>'btn'])?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
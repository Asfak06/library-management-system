<h2>Student List</h2>
			<hr/>
<table class="table">
  <thead>
    <tr>
      <th>SL.</th>
      <th>Name</th>
      <th>Dept.</th>
      <th>Roll</th>
      <th>Reg.</th>
      <th>Session</th>
      <th>Batch</th>
      <th style="width: 3.5em;">action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $i=0;
       foreach ($studentdata as $sdata) {
           $i++;
     ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->name; ?></td>
      <td><?php echo $sdata->dept; ?></td>
      <td><?php echo $sdata->roll; ?></td>
      <td><?php echo $sdata->reg; ?></td>
      <td><?php echo $sdata->session; ?></td>
      <td><?php echo $sdata->batch; ?></td>
      <td>
          <a href="<?php echo base_url();?>Student/editstudent/<?php echo $sdata->id;?>"><i class="fa fa-pencil"></i></a>
          <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
   <?php } ?> 
  </tbody>
</table>
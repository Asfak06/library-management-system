<h2>Author List</h2>
<hr/>
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>
<table class="table">
  <thead>
    <tr>
      <th>SL.</th>
      <th>Name</th>
      <th style="width: 3.5em;">action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $i=0;
       foreach ($authdata as $ddata) {
           $i++;
     ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $ddata->auth_name; ?></td>
      <td>
          <a href="<?php echo base_url();?>author/editauthor/<?php echo $ddata->auth_id;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure?');" href="<?php echo base_url();?>author/deleteauthor/<?php echo $ddata->auth_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
   <?php } ?> 
  </tbody>
</table>
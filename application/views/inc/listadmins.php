 <script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css"/>
<h2>Admin List</h2>
<hr/>
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>
<table class="display" id="Asfak">
  <thead>
    <tr>
      <th>SL.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th style="width: 3.5em;">action</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>0</td>
      <td><?php echo $adById->fname; ?></td>
      <td><?php echo $adById->lname; ?></td>
      <td><?php echo $adById->email; ?></td>
      <td><?php echo $adById->phone; ?></td>
       <td>

      </td>
    </tr>
     <?php 
       $i=0;
       foreach ($admindata as $sdata) {
           $i++;
           if ($sdata->user_id!=1) {
     ?>
     <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->fname; ?></td>
      <td><?php echo $sdata->lname; ?></td>
      <td><?php echo $sdata->email; ?></td>
      <td><?php echo $sdata->phone; ?></td>
      <td>
          <a onclick="return confirm('Are you sure?');" href="<?php echo base_url();?>User/deladmin/<?php echo $sdata->user_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
   <?php } } ?> 
  </tbody>
</table>
<script>
  $(document).ready(function() {
        $('#Asfak').dataTable();
    });
</script>
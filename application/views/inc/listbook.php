  <script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css"/>
<h2>Book List</h2>
<hr/>
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>
<table  class="display" id="Asfak">
  <thead>
    <tr>
      <th>SL.</th>
      <th>Name</th>
      <th>dept</th>
      <th>author</th>
      <th>stock</th>
      <th style="width: 3.5em;">action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $i=0;
       foreach ($bookdata as $ddata) {
           $i++;
     ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $ddata->bookname; ?></td>
      <td><?php
         $sdepid=$ddata->dept; 
         $getdep=$this->dep_model->getdep($sdepid);
         if (isset($getdep)) {
           echo $getdep->depname;
         }
        ?>
        </td>
      <td>
        <?php
         $sauthid=$ddata->auth; 
         $getauth=$this->auth_model->getauth($sauthid);
         if (isset($getauth)) {
           echo $getauth->auth_name;
         }
        ?>
          
      </td>
      <td><?php echo $ddata->stock; ?></td>
      <td>
          <a href="<?php echo base_url();?>book/editbook/<?php echo $ddata->bookid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure?');" href="<?php echo base_url();?>book/deletebook/<?php echo $ddata->bookid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
   <?php } ?> 
  </tbody>
</table>
<script>
  $(document).ready(function() {
        $('#Asfak').dataTable();
    });
</script>
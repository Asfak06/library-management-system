  <script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css"/>
<h2>Issue List</h2>
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
      <th>Student Name</th>
      <th>book Dept.</th>
      <th>Reg.</th>
      <th>Session</th>
      <th>Book name</th>
      <th>Issue Date</th>
      <th style="width: 3.5em;">action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $i=0;
       foreach ($issuedata as $idata) {
           $i++;
     ?>
    <tr>
      <td> <?php echo $i;?> </td>
      
      <td> 
           <?php           
              $name=$idata->sname;
              foreach ($studata as $sdata ) {
               if ($sdata->id==$name) 
                {
                   echo $sdata->name;
                 }
              }
           ?> 
      </td>
      
      <td>
        <?php           
              $dept=$idata->dept;
              foreach ($depdata as $ddata ) {
               if ($ddata->depid==$dept) 
                {
                   echo $ddata->depname;
                 }
              }
           ?>
      </td>
      <td>
          <?php           
              $name=$idata->sname;
              foreach ($studata as $sdata ) {
               if ($sdata->id==$name) 
                {
                   echo $sdata->reg;
                 }
              }
           ?>
      </td>
      <td>
        <?php           
              $name=$idata->sname;
              foreach ($studata as $sdata ) {
               if ($sdata->id==$name) 
                {
                   echo $sdata->session;
                 }
              }
           ?>
      </td>
      <td>
         <?php           
              $bname=$idata->bname;
              foreach ($bookdata as $bdata ) {
               if ($bdata->bookid==$bname) 
                {
                   echo $bdata->bookname;
                 }
              }
           ?>
      </td>
      <td>
        <?php           
             echo date("d/m/Y h:ia", strtotime($idata->date));
           ?>
      </td>
      <td>
          <a href=""><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure?');" href="" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr> 
  <?php }?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
        $('#Asfak').dataTable();
    });
</script>
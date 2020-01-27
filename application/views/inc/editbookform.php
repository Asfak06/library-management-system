<H2>Edit book</h2>
<hr/>		
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>
<style>
    .dep{
        width: 300px;
        padding: 5px;
        border: 1px solid #ddd;

    }
</style>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>book/updatebook" method="post" >
                <input type="hidden" name="id" value="<?php echo $bookById->bookid; ?>" >
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="name" value="<?php echo $bookById->bookname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dept" class="dep">
                        <option value="">select one</option>
                        <?php
                            foreach ($departdata as $ddata) { 
                            if ($bookById->dept==$ddata->depid) { ?>
                            <option style="" value="<?php echo $ddata->depid; ?>" selected="selected" > 
                                <?php 
                                  echo $ddata->depname; 
                                ?>
                           </option>
                                <?php  } else{ ?>            
                     
                         
                            <option style="" value="<?php echo $ddata->depid; ?>"> 
                                <?php 
                                  echo $ddata->depname; 
                                ?>
                            </option>
                        <?php
                            }}
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <select name="auth" class="dep">
                        <option value="">select one</option>
                        <?php
                            foreach ($authdata as $adata) { 
                            if ($bookById->auth==$adata->auth_id) { ?>
                            <option style="" value="<?php echo $adata->auth_id; ?>" selected="selected" > 
                                <?php 
                                  echo $adata->auth_name; 
                                ?>
                           </option>
                                <?php  } else{ ?>            
                     
                         
                            <option style="" value="<?php echo $adata->auth_id; ?>"> 
                                <?php 
                                  echo $adata->auth_name; 
                                ?>
                            </option>
                        <?php
                            }}
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Total Books</label>
                    <input type="text" name="stock" value="<?php echo $bookById->stock; ?>" class="form-control span12">
                </div>
				
                <div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>
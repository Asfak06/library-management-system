<H2>Add Book</h2>
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
            <form action="<?php echo base_url();?>Book/addBookForm" method="post" >
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>author</label>
                  
                     <select name="auth" class="dep">
                        <option value="">select one</option>
                        <?php
                            foreach ($authdata as $adata) {              
                        ?>
                        <option style="" value="<?php echo $adata->auth_id;?>" > 
                            <?php 
                              echo $adata->auth_name; 
                            ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                 <div class="form-group">
                    <label>department</label>
                   
                    <select name="dept" class="dep">
                        <option value="">select one</option>
                        <?php
                            foreach ($depdata as $ddata) {              
                        ?>
                        <option style="" value="<?php echo $ddata->depid;?>" > 
                            <?php 
                              echo $ddata->depname; 
                            ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>
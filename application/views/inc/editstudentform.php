<H2>Edit Student</h2>
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
            <form action="<?php echo base_url();?>student/updatestudent" method="post" >
                <input type="hidden" name="id" value="<?php echo $stuById->id; ?>" >
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" value="<?php echo $stuById->name; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dept" class="dep">
                        <option value="">select one</option>
                        <?php
                            foreach ($departdata as $ddata) { 
                            if ($stuById->dept==$ddata->depid) { ?>
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
                    <label>Roll No.</label>
                    <input type="text" name="roll" value="<?php echo $stuById->roll; ?>" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" value="<?php echo $stuById->reg; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Session</label>
                    <input type="text" name="session" value="<?php echo $stuById->session; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Batch</label>
                    <input type="text" name="batch" value="<?php echo $stuById->batch; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>phone</label>
                    <input type="text" name="phone" value="<?php echo $stuById->phone; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" value="<?php echo $stuById->email; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>
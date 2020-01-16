<H2>Add Student</h2>
<hr/>
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>			
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>student/addStudentForm" method="post" >
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="dept" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Roll No.</label>
                    <input type="text" name="roll" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Session</label>
                    <input type="text" name="session" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Batch</label>
                    <input type="text" name="batch" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>
<script>
    $(document).ready(function() {
        $("#Department").change(function(){
              var dep =$("#Department").val();
              $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>manage/getBookByDepId/"+dep,
                success:function(data){
                   $("#book").html(data);
                }
              });
        });
    });
</script>
<H2>Issue Book</h2>
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
            <form action="<?php echo base_url();?>manage/addIssueForm" method="post" >
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="sname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Student Reg.</label>
                    <input type="text" name="reg" class="form-control span12">
                </div>
                 <div class="form-group">
                    <label>Session</label>
                    <input type="text" name="session" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>                 
                    <select name="dept" class="dep" id="Department">
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
                    <label>Book name &nbsp</label>
                    <select name="dept" class="dep" id="book">
                        <option value="">select one</option>
                        <?php
                            foreach ($depdata as $ddata) {              
                        ?>
                        <option style="" value="<?php echo $ddata->depid;?>" > 
                            <!-- <?php 
                              echo $ddata->depname; 
                            ?> -->
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
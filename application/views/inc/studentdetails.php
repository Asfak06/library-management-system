<H2>Student Details</h2>
<hr/>       
<style>
    .dep{
        width: 300px;
        padding: 5px;
        border: 1px solid #ddd;

    }
</style>
        <div class="panel-body" style="width:600px;">
            
               
                <div class="form-group">
                    <label>Student Name:</label>
                    <?php echo $stuByReg->name; ?>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <?php echo $stuByReg->dept; ?>
                </div>
                <div class="form-group">
                    <label>Roll No.:</label>
                     <?php echo $stuByReg->roll; ?>
                </div>
                <div class="form-group">
                    <label>Reg. No.:</label>
                     <?php echo $stuByReg->reg; ?>
                </div>
                <div class="form-group">
                    <label>Session:</label>
                     <?php echo $stuByReg->session; ?>
                </div>
                <div class="form-group">
                    <label>Batch:</label>
                     <?php echo $stuByReg->batch; ?>
                </div>
                <div class="form-group">
                    <label>phone:</label>
                     <?php echo $stuByReg->phone; ?>
                </div>
                <div class="form-group">
                    <label>email:</label>
                     <?php echo $stuByReg->email; ?>
                </div>
                
                   
            
        </div>
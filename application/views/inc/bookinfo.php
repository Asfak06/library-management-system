<H2>Book Details</h2>
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
                    <label>Book Name:</label>
                    <?php echo $bookById->bookname; ?>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <?php $depid=$bookById->dept;$getdep=$this->dep_model->getDepById($depid);if (isset($getdep)) {
                        echo $getdep->depname;
                    } ?>
                </div>
                <div class="form-group">
                    <label>Author:</label>
                     <?php $auth_id=$bookById->auth;$getauth=$this->auth_model->getAuthById($auth_id);if (isset($getauth)) {
                        echo $getauth->auth_name;
                    } ?>
                </div>
                <div class="form-group">
                    <label>Total Books:</label>
                     <?php echo $bookById->stock; ?>
                </div>
                
                
                   
            
        </div>
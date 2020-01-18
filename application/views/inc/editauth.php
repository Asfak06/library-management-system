<H2>Edit author</h2>
<hr/>		
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>author/updateauthor" method="post" >
                <input type="hidden" name="authid" value="<?php echo $authById->auth_id; ?>" >
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="authname" value="<?php echo $authById->auth_name; ?>" class="form-control span12">
                </div>
                <div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>
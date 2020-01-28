
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <title><?php if(isset($title)){ echo $title; } ?></title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/theme.css"/>
</head>
<body class=" theme-blue">

    <div class="navbar navbar-default" role="navigation">
         <div class="navbar-header custommenu">Library Management</div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>User
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">                
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>           
                <li><a href="<?php echo base_url();?>user/create">Create account</a></li>              
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

<body class=" theme-blue">
 
<div class="dialog loginform">
<span style="text-align: center;"> 
<?php
 $msg=$this->session->flashdata('msg');
 if(isset($msg))
    {
        echo $msg;
    }
?>   
</span>
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign In</p>
        <div class="panel-body">
            <form action="<?php echo base_url();?>User/loginForm" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control span12" required="">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" name="pass" class="form-controlspan12 form-control" required="">
                </div>
				
				<div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>

                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

    <script src="lib/bootstrap/js/bootstrap.js"></script>

 <div class="footenote">
 <h2>ICT</h2>
 </div> 
</body></html>
<script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.js"></script>
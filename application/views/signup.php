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
        <div class="navbar-header">
          <a class="" ><span class="navbar-brand" style="color:white;">Library Management</span></a></div>
        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>

<div class="dialog">
    <div class="panel panel-default">
<span style="text-align:center;"> 
    <?php
     $msg=$this->session->flashdata('msg');
     if(isset($msg))
        {
            echo $msg;
        }
    ?>   
</span>
        <p class="panel-heading no-collapse">Sign Up</p>
        <div class="panel-body">
            <form action="<?php echo base_url();?>User/signupForm" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control span12">
                </div>
                <div class="form-group">
                    <label class="remember-me">I agree with the <a href="terms-and-conditions.html">Terms and Conditions  &nbsp&nbsp&nbsp&nbsp</a></label>
                    <input type="submit" value="Submit" class="btn btn-primary">                 
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <p><a href="<?php echo base_url();?>User/login" style="font-size: .75em; margin-top: .25em;">login </a>
    <a href="<?php echo base_url(); ?>/library/index" style="font-size: .75em; margin-top: .25em;">home</a>
    </p>
</div>



    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>

<?php
session_start();

include("dbconnection.php");
include("checklogin.php");
check_login();
if(isset($_POST['update']))
{
$adminremark=$_POST['aremark'];
$fid=$_POST['frm_id'] ;
mysqli_query($con,"update ticket set admin_remark='$adminremark' where id='$fid'");
echo '<script>alert("Ticket has been updated.")</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>User | Ticket Support</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="page-content">
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form</div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p>Home</p> 
        </li>
        <li><a href="#" class="active">View Ticket</a></li>
      </ul>
      <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>Ticket Support</h3>
      </div>
      <div class="clearfix"></div>
      
      <h4> <span class="semi-bold">Tickets</span></h4>
      <br>
     <?php $rt=mysqli_query($con,"select * from ticket order by id desc");
													while($row=mysqli_fetch_array($rt))
													{
													?> 
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple no-border">
            <div class="grid-title no-border descriptive clickable">
              <h4 class="semi-bold"><?php echo $row['subject'];?></h4>
              <p ><span class="text-success bold">Ticket #<?php echo $_SESSION['sid']=$row['ticket_id'];?></span> - Created on <?php echo $row['posting_date'];?>
             <span class="label label-important"><?php echo $row['status'];?></span></p>
              <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a>  </div>
            </div>
            <div class="grid-body  no-border" style="display:none">
              <div class="post">
                <div class="user-profile-pic-wrapper">
                  <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="img/user.png<?php echo $row['user_image'];?>" data-src="img/user.png<?php echo $row['user_image'];?>" src="img/user.png<?php echo $row['user_image'];?>" alt=""> </div>
                </div>
                <div class="info-wrapper">
                  <div class="info"><?php echo $row['ticket'];?> </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <br>
              <div class="form-actions">
                <div class="post col-md-12">
                  <div class="user-profile-pic-wrapper">
                    <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="img/admin.png" data-src="img/admin.png" src="img/admin.png" alt=""> </div>
                  </div>
                  <div class="info-wrapper">
 <form name="adminr"  method="post" enctype="multipart/form-data">
                      <br>
                     <textarea name="aremark" cols="50" rows="4" required="true"><?php echo $row['admin_remark'];?></textarea>
                      <hr>
                      <p class="small-text"> 
                        <input name="update" type="submit"  class="txtbox1" id="Update" value="update" size="40" />
 <input name="frm_id" type="hidden" id="frm_id" value="<?php echo $row['id'];?>" /></p>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
               <?php } ?>
          </div>
        </div>
      
       
          </div>
        </div>
      </div>
    
        
          </div>
        </div>
      </div>
      
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>

<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="assets/js/support_ticket.js" type="text/javascript"></script>

<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>

</body>
</html>
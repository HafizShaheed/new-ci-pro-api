<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title;?></title>
</head>
<body>


<div class="jumbotron  bg-light">
    <div class="container">
        <h1> <?php echo 'Welcome to '. $title;?></h1>

        <div class="row">
        <div class="col-md-9">
            <div class="user-profile">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td> <strong>First Name</strong></td>
                        <td><?php echo $user->first_name;?></td>
                    </tr>
                    <tr>
                        <td> <strong>Last Name</strong></td>
                        <td><?php echo $user->last_name;?></td>
                    </tr>
                    <tr>
                        <td> <strong>Email Address</strong></td>
                        <td><?php echo $user->email;?></td>
                    </tr>
                    <tr>
                        <td> <strong>Created At</strong></td>
                        <td><?php echo $user->created_at;?></td>
                    </tr>
                </tbody>
            </table>
            </div>

            <div class="user-links">
       			 <a class="nav-link" href="<?php echo base_url('');?>">Edit Profile </a>
       			 <a class="nav-link" href="<?php echo base_url('');?>">Change password </a>
					<a class="nav-link" href="<?php echo base_url('/users/logout');?>">Logout </a>

                

            </div>

        </div>

            <div class="col-md-3">
                <div class="user-pic">
                    <img class="img-thumbnail" src="<?php  echo base_url('assets/img/no-user-img.png');?>" alt="no profile image" >
                </div>
            <a href="#" class="btn btn-success btn-block"> Upload Profile </a>
            </div>
        </div>
    </div>
</div>
    

</body>
</html>

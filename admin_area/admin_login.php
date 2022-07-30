 <?php
    session_start();
    include('../includes/connect.php');

    if (isset($_POST['admin_login'])) {

        $admin_email = $con->real_escape_string($_POST['admin_email']);
        $admin_password = $con->real_escape_string($_POST['admin_pass']);

        $select_query = "Select * from admin_details where admin_email='$admin_email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);

        if ($rows_count != 0) {
            $fetch = mysqli_fetch_assoc($result);
            $fetch_pass = $fetch['admin_password'];
            $admin_username = $fetch['admin_username'];
            if (password_verify($admin_password, $fetch_pass)) {
                $_SESSION['admin_username'] = $admin_username;
                $_SESSION['admin_email'] = $admin_email;
                header('location: admin_index.php');
            } else {
                $_SESSION['status'] = "Incorrect email or password!";
                header('location: admin_login.php');
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Admin does not exist";
            header('location: admin_login.php');
            exit(0);
        }
    }
    ?>

 <head>
     <link rel="stylesheet" href="../css/fullbs5.css">
 </head>
 <style>
     .btn {
         width: 150px;
     }

     .adminLogConatianer {
         background-color: whitesmoke;
         border-radius: 4px;
     }

     .alert {
         --bs-alert-bg: transparent;
         --bs-alert-padding-x: 1rem;
         --bs-alert-padding-y: 1rem;
         --bs-alert-margin-bottom: 1rem;
         --bs-alert-color: inherit;
         --bs-alert-border-color: transparent;
         --bs-alert-border: 1px solid var(--bs-alert-border-color);
         --bs-alert-border-radius: 0.375rem;
         position: relative;
         padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
         margin-bottom: var(--bs-alert-margin-bottom);
         color: var(--bs-alert-color);
         background-color: var(--bs-alert-bg);
         border: var(--bs-alert-border);
         border-radius: var(--bs-alert-border-radius, 0);
     }

     .alert-danger {
         --bs-alert-color: #842029;
         --bs-alert-bg: #f8d7da;
         --bs-alert-border-color: #f5c2c7;
     }

     .alert {
         position: relative;
         height: 35px;
         display: block;
         padding: .2rem 1rem;
         align-items: center;
     }
 </style>

 <h2>
     <p class="title text-center mt-5">Admin Login</p>
 </h2>

 <!-- signup form -->
 <div class="container col-12 col-md-6 col-lg-5 mt-5 py-5 adminLogConatianer">


     <!-- Validation modal -->
     <?php
        if (isset($_SESSION['status'])) { ?>
         <div class="alert alert-danger text-center ">
             <strong><?php echo $_SESSION['status']; ?> </strong>
         </div>
     <?php
        }
        unset($_SESSION['status']);
        ?>


     <div class="form-group containform">
         <form class="px-5" action="#" method="POST">
             <div class="mb-3 ">
                 <label for="InputEmail" class="form-label">Email</label>
                 <input type="email" class="form-control" id="InputEmail" name="admin_email" required>

             </div>
             <div class="mb-3 ">
                 <label for="InputPass" class="form-label">Password</label>
                 <input type="password" class="form-control" id="InputPass" name="admin_pass" required>
             </div>
             <button type="submit" class="btn btn-dark mt-3" name="admin_login">Login</button>
         </form>
     </div>
 </div>
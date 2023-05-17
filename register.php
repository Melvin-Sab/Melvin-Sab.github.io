<?php
// Include Database
include('config/db.php');

// if (isset($_POST['register'])) {
//     $username = $_POST['username'];
//     $email = $_POST['email'];

//     // Sanitize and validate inputs
//     $username = htmlspecialchars($username);
//     $email = filter_var($email, FILTER_VALIDATE_EMAIL);

//     //Password hashing
//     $password = $_POST['password'];
//     $options = ['cost' => 12];
//     $hashedpass = password_hash($password, PASSWORD_BCRYPT, $options);

//     // Query for validation of username and email-id
//     $query = "SELECT * FROM userdata where (UserName=:uname || UserEmail=:uemail)";
//     $stmt = $con->prepare($query);
//     $stmt->bindParam(':uname', $username);
//     $stmt->bindParam(':uemail', $email);
//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_OBJ);
//     if ($stmt->rowCount() == 0) {

//         $query = "INSERT INTO userdata SET UserName=:uname, UserEmail=:uemail, LoginPassword=:upassword";
//         $stmt = $con->prepare($query);
//         // Binding 
//         $stmt->bindParam(':uname', $username, PDO::PARAM_STR);
//         $stmt->bindParam(':uemail', $email, PDO::PARAM_STR);
//         $stmt->bindParam(':upassword', $hashedpass, PDO::PARAM_STR);
//         $stmt->execute();
//         $lastInsertId = $con->lastInsertId();
//         if ($lastInsertId) {
//             $msg = "You have signup  Scuccessfully";
//         } else {
//             $error = "Something went wrong.Please try again";
//         }
//     } else {
//         $error = "Username or Email-id already exist. Please try again";
//     }
// }
// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!--Javascript for check username availability-->
    <script>

        function checkUsernameAvailability() {
            // body...
            $('#loaderIcon').show();
            jQuery.ajax({

                url: "check_availability.php",
                data: 'username=' + $("#username").val(),
                type: "POST",

                success: function (data) {
                    $("#username-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {

                }

            });
        }
    </script>
    <!--Javascript for check email availability-->
    <script>

        function checkEmailAvailability() {
            // body...
            $('#loaderIcon').show();
            jQuery.ajax({

                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",

                success: function (data) {
                    $("#email-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                    event.preventDefault();
                }

            });
        }
    </script>

</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="process-register.php" method="post" id="register">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="text" name="username"
                                                placeholder="username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" type="password"
                                                        placeholder="Create a password" name="password" />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirmPassword"
                                                        type="password" placeholder="Confirm password"
                                                        name="confirmPassword" />
                                                    <label for="passwordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary">Submit</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Melvin's Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
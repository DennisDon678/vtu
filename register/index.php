 <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];


    ?>


     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Register now</title>
         <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="../assets/css/index.css">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
     </head>

     <body>
         <section class=" h py-3" style="background-color: brown;">
             <div class="back text-dark container mb-4">
                 <a class="btn btn-light" href="../">Back Home</a>
             </div>

             <div class="container h-100">
                 <div class="row d-flex justify-content-center align-items-center h-100">
                     <div class="col-lg-12 col-xl-11">
                         <div class="card text-black" style="border-radius: 25px;">
                             <div class="card-body p-md-5">
                                 <div class="row justify-content-center">
                                     <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                         <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                         <form class="mx-1 mx-md-4" action="../app/forms/register.php" method="post">
                                             <div class="alert text-center alert-warning">
                                                 <p><?= $msg ?></p>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="text" name="fullname" id="form3Example1c" class="form-control" />
                                                     <label class="form-label" for="form3Example1c">Your Name</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="text" name="username" id="form3Example1c" class="form-control" />
                                                     <label class="form-label" for="form3Example1c">Your Username</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="email" name="email" id="form3Example3c" class="form-control" />
                                                     <label class="form-label" for="form3Example3c">Your Email</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="password" id="form3Example4c" name="password" class="form-control" />
                                                     <label class="form-label" for="form3Example4c">Password</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="password" id="form3Example4cd" name="password_verify" class="form-control" />
                                                     <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                                 </div>
                                             </div>

                                             <div class="form-check d-flex justify-content-center mb-5">
                                                 <input class="form-check-input me-2" type="checkbox" name="checkbox" value="on" id="" />
                                                 <label class="form-check-label" for="form2Example3">
                                                     I agree all statements in <a href="#!">Terms of service</a>
                                                 </label>
                                             </div>
                                             <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                 <input type="submit" name="submit" value="Register" class="btn getStarted btn-lg">
                                             </div>
                                         </form>
                                         <P class="text-center">Already have an account?
                                             <a href="../login/">Log In Now</a>
                                         </P>
                                     </div>
                                     <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                         <img src="../assets/images/draw1.webp" class="img-fluid" alt="Sample image">

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>


         <script src="../assets/bootstrap/js/bootstrap.js"></script>
     </body>

     </html>

 <?php
    } else {
    ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Register now</title>
         <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="../assets/css/index.css">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
     </head>

     <body>
         <section class=" h py-3" style="background-color: brown;">
             <div class="back text-dark container mb-4">
                 <a class="btn btn-light" href="../">Back Home</a>
             </div>

             <div class="container h-100">
                 <div class="row d-flex justify-content-center align-items-center h-100">
                     <div class="col-lg-12 col-xl-11">
                         <div class="card text-black" style="border-radius: 25px;">
                             <div class="card-body p-md-5">
                                 <div class="row justify-content-center">
                                     <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                         <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                         <form class="mx-1 mx-md-4" action="../app/forms/register.php" method="post">
                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="text" name="fullname" id="form3Example1c" class="form-control" />
                                                     <label class="form-label" for="form3Example1c">Your Name</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="text" name="username" id="form3Example1c" class="form-control" />
                                                     <label class="form-label" for="form3Example1c">Your Username</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="email" name="email" id="form3Example3c" class="form-control" />
                                                     <label class="form-label" for="form3Example3c">Your Email</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="password" id="form3Example4c" name="password" class="form-control" />
                                                     <label class="form-label" for="form3Example4c">Password</label>
                                                 </div>
                                             </div>

                                             <div class="d-flex flex-row align-items-center mb-4">
                                                 <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                 <div class="form-outline flex-fill mb-0">
                                                     <input type="password" id="form3Example4cd" name="password_verify" class="form-control" />
                                                     <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                                 </div>
                                             </div>

                                             <div class="form-check d-flex justify-content-center mb-5">
                                                 <input class="form-check-input me-2" type="checkbox" name="checkbox" value="on" id="" />
                                                 <label class="form-check-label" for="form2Example3">
                                                     I agree all statements in <a href="#!">Terms of service</a>
                                                 </label>
                                             </div>
                                             <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                 <input type="submit" name="submit" value="Register" class="btn getStarted btn-lg">
                                             </div>
                                         </form>
                                         <P class="text-center">Already have an account?
                                             <a href="../login/">Log In Now</a>
                                         </P>
                                     </div>
                                     <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                         <img src="../assets/images/draw1.webp" class="img-fluid" alt="Sample image">

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>


         <script src="../assets/bootstrap/js/bootstrap.js"></script>
     </body>

     </html>

 <?php
    }
    ?>
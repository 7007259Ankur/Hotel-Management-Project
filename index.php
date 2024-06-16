
<?php
ob_start();
include 'config.php';
session_start();


//USER LOGIN
if (isset($_POST['user_login_submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM signup WHERE Email = '$Email' AND Password = BINARY'$Password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $_SESSION['usermail']=$Email;
        $Email = "";
        $Password = "";
        header("Location: home.php");
    } else {
        echo "<script>swal({
            title: 'Something went wrong',
            icon: 'error',
        });
        </script>";
    }
}
?>


<!-- == Emp Login == -->
<?php              
    if (isset($_POST['Emp_login_submit'])) {
        $Email = $_POST['Emp_Email'];
        $Password = $_POST['Emp_Password'];

        $sql = "SELECT * FROM emp_login WHERE Emp_Email = '$Email' AND Emp_Password = BINARY'$Password'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $_SESSION['usermail']=$Email;
            $Email = "";
            $Password = "";
            header("Location: admin/admin.php");
        } else {
            echo "<script>swal({
                title: 'Something went wrong',
                icon: 'error',
            });
            </script>";
        }
    }
?> 


<!--============ signup =============-->
<?php       
if (isset($_POST['user_signup_submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];

    if($Username == "" || $Email == "" || $Password == ""){
        echo "<script>swal({
            title: 'Fill the proper details',
            icon: 'error',
        });
        </script>";
    }
    else{
        if ($Password == $CPassword) {
            $sql = "SELECT * FROM signup WHERE Email = '$Email'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo "<script>swal({
                    title: 'Email already exits',
                    icon: 'error',
                });
                </script>";
            } else {
                $sql = "INSERT INTO signup (Username,Email,Password) VALUES ('$Username', '$Email', '$Password')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['usermail']=$Email;
                    $Username = "";
                    $Email = "";
                    $Password = "";
                    $CPassword = "";
                    header("Location: home.php");
                } else {
                    echo "<script>swal({
                        title: 'Something went wrong',
                        icon: 'error',
                    });
                    </script>";
                }
            }
        } else {
            echo "<script>swal({
                title: 'Password does not matched',
                icon: 'error',
            });
            </script>";
        }
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/login.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/flash.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Allura&display=swap">

    <title>Hotel TheHeavenparadise</title>

    <style>
        #log{
        color: greenyellow;
        }
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Cookie&family=Poppins:wght@600&display=swap');

:root {
    --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%), 0 8px 16px rgb(13 0 77 / 8%);
    --bg-box-shadow: 0px 0px 20px 6px rgb(0 0 0 / 34%);
}

* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    /* text-shadow: var(--bg-text-shadow); */
}

body {
    height: 100vh;
    width: 100vw;
    display: flex;
    flex-direction:column;
    /* overflow: hidden; */
}

.carousel_section{
    box-shadow: var(--bg-box-shadow);
}
/* side photo css */
section {
    height: 100%;
    width: 100%;
}
#name {
    color: darkred;
    font-family: cursive, sans-serif;
}

.carousel-image {
    height: 70vh;
    width: 100vw;

}

.carousel-inner::after {
    content: "";
    position: absolute;
    height:50vh;
    width: 100vw;
    /* background-color: rgba(0, 0, 255, 0.284); */
}

/* login css */

/* .logo {
    height: 200px;
    display: flex;
    justify-content: center;
    /* margin:20px 0; */
    /* background: linear-gradient(to bottom, #f2f2f2, #d3d2d1, #a7a4a1, #5d5248, #c4bfba, #000000); */
/* }  */


.logo .bluebirdlogo {
    height: 100%;
}

.logo p {
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 30px;
    color: rgb(66, 68, 74);
    text-shadow: var(--bg-text-shadow);
}
#title{

    
    font-family: Apple Chancery, cursive; /* Apply Allura font to h1 elements */
    font-size: 3.5rem;
    color:#CD853F;

}

.auth_container {
    height: 100%;
     width: 100%;
    background-color: #E0E0E0; /* Light gray milky background */
}

    /* margin: 50px; */


.carousel-caption {
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white; /* Change text color as needed */
}

.carousel-caption h1 {
    font-size: 2em; /* Adjust the font size */
    color: black;
}

.carousel-caption p {
    font-size: 1em; /* Adjust the font size */
    color: black;
}

#Log_in {
    height: 100%;
    width: 100%;
    display: flex;
    /* margin: 5px; */
    flex-direction: column;
    align-items: center;
}

#log {
    margin: 5px;
    color: purple;
    .carousel-caption {
    font-family: 'Lobster', cursive; /* Stylish cursive font */
}

}
.role_btn {
    display: flex;
    gap: 30px;
    margin: 20px 0;
    flex-wrap: wrap;
}

.role_btn .btns {
    height: 40px;
    width: 200px;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    background-color: rgba(93, 102, 116, 0.318);
    font-size: 17px;
    font-weight: 700;
}

.role_btn .btns:hover{
    background-image: linear-gradient(90deg, rgba(76, 185, 236, 0.527), rgba(0, 30, 255, 0.456));
    transition: ease-in-out;
    color: white;
}

.btns.active{
    background-image: linear-gradient(90deg, rgba(76, 185, 236, 0.527), rgba(0, 30, 255, 0.456));
    color: white;
}

.authsection {
    width: 100%;
    margin: 10px;
    display: none;
    text-align: center;
    animation: screen_animation .4s;
}
/* toggle display */
.user_login.active{
    display: block;
}

.employee_login.active{
    display: block;
}

.form-floating {
    margin: 15px 0;
} 

.auth_btn {
    padding: 15px 30px;
    border: unset;
    border-radius: 15px;
    background-color: rgba(118, 141, 176, 0.318);
    z-index: 1;
    position: relative;
    font-size: 17px;
    transition: all 250ms;
    overflow: hidden;
}

.auth_btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    z-index: -1;
    border-radius: 10px;
    background-image: linear-gradient(90deg, rgba(76, 185, 236, 0.527), rgba(0, 30, 255, 0.456));
    transition: all 250ms
}

.auth_btn:hover {
    color: #ffffff;
}

.auth_btn:hover::before {
    width: 100%;
}

.footer_line{
    margin: 20px 0;
}

.page_move_btn{
    color: rgba(0, 0, 255, 0.599);
    cursor: pointer;
}
.page_move_btn:hover{
    color: blue;
}

/* signup */
#sign_up{
    height: 100%;
    width: 100%;
    display: none;
    flex-direction: column;
    align-items: center;
}

.user_signup{
    width: 100%;
    text-align: center;
    animation: screen_animation .4s;
}

/* animation frame */
@keyframes screen_animation {
    0%{
        transform: translateX(50px);
    }
}



/* responsive stuff */

@media(max-width: 30rem){
    .carousel_section{
        display: none;
    }
    #auth_section{
        width: 100%;
    }
    .auth_container
    {
        width: 100%;
        padding: 0;
        margin: 0;
    }
    #Log_in .role_btn .btns{
        width: 90px;
    }
}





body {
  background: #663399;
}

.swatch {
  display: block;
  text-align: center;
  position: relative;
  margin: 100px;
}

.swatch div {
  width: 70px;
  height: 225px;
  position: absolute;
  top: 0px;
  border-radius: 5px;
  border-top: solid 2px rgba(0, 0, 0, .2);
  border-left: solid 3px rgba(255, 255, 255, .2);
  border-bottom: solid 3px rgba(0, 0, 0, .2);
  text-align: center;
  box-sizing: border-box;
  transform-origin: center 90%;
  display: inline-block;
  backface-visibility: hidden;
  margin-left: -35px;
  transform: rotate(0deg);
}

.swatch div:before {
  width: 16px;
  height: 16px;
  content: "";
  background-color: #FFFFFF;
  display: inline-block;
  border-radius: 8px;
  bottom: 10px;
  position: absolute;
  margin-left: -8px;
}

.swatch div:nth-child(1) {
  background-color: #815A8F;
  animation: swatch-purple-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

.swatch div:nth-child(2) {
  background-color: #6730EC;
  animation: swatch-blue-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

.swatch div:nth-child(3) {
  background-color: #9ED763;
  animation: swatch-green-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

.swatch div:nth-child(4) {
  background-color: #FBD400;
  animation: swatch-yellow-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

.swatch div:nth-child(5) {
  background-color: #FF9000;
  animation: swatch-orange-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

.swatch div:nth-child(6) {
  background-color: #F73F52;
  animation: swatch-red-motion 5s cubic-bezier(0.4, 0.0, 0.2, 1) infinite;
}

@keyframes swatch-purple-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(-65deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}

@keyframes swatch-blue-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(-40deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}

@keyframes swatch-green-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(-15deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}

@keyframes swatch-yellow-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(15deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}

@keyframes swatch-orange-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(40deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}

@keyframes swatch-red-motion {
  0% {
    transform: rotate(0deg);
  }
  30%, 70% {
    transform: rotate(65deg);
  }
  90%, 10% {
    transform: rotate(0deg);
  }
}


/*new css */
@keyframes lights {
  0% {
    color: hsl(230, 40%, 80%);
    text-shadow:
      0 0 1em hsla(320, 100%, 50%, 0.2),
      0 0 0.125em hsla(320, 100%, 60%, 0.3),
      -1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
      1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
  }
  
  30% { 
    color: hsl(230, 80%, 90%);
    text-shadow:
      0 0 1em hsla(320, 100%, 50%, 0.5),
      0 0 0.125em hsla(320, 100%, 60%, 0.5),
      -0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
      0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
  }
  
  40% { 
    color: hsl(230, 100%, 95%);
    text-shadow:
      0 0 1em hsla(320, 100%, 50%, 0.5),
      0 0 0.125em hsla(320, 100%, 90%, 0.5),
      -0.25em -0.125em 0.125em hsla(40, 100%, 60%, 0.2),
      0.25em 0.125em 0.125em hsla(200, 100%, 60%, 0.4);
  }
  
  70% {
    color: hsl(230, 80%, 90%);
    text-shadow:
      0 0 1em hsla(320, 100%, 50%, 0.5),
      0 0 0.125em hsla(320, 100%, 60%, 0.5),
      0.5em -0.125em 0.25em hsla(40, 100%, 60%, 0.2),
      -0.5em 0.125em 0.25em hsla(200, 100%, 60%, 0.4);
  }
  
  100% {
    color: hsl(230, 40%, 80%);
    text-shadow:
      0 0 1em hsla(320, 100%, 50%, 0.2),
      0 0 0.125em hsla(320, 100%, 60%, 0.3),
      1em -0.125em 0.5em hsla(40, 100%, 60%, 0),
      -1em 0.125em 0.5em hsla(200, 100%, 60%, 0);
  }
  
}

body {
  margin: 0;
  font: 100% / 1.5 Raleway, sans-serif;
  color: hsl(230, 100%, 95%);
  background: linear-gradient(135deg, hsl(230, 40%, 12%), hsl(230, 20%, 7%));
  height: 100vh;
  display: flex;
}

h2 {
  margin: auto;
  font-size: 3.5rem;
  font-weight: 300;
  animation: lights 5s 750ms linear infinite;
}









    </style>
</head>


<body>

     
    <section id="carouselExampleControls" class="carousel slide carousel_section">
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="carousel-image" src="image/HT4.jpg">
        <div class="carousel-caption">
        <h2>Heavens Paradise</h2>
            
        </div>
    </div>
</div>

    
        <div class="auth_container">
            <div id="Log_in">
                <h2  id= "log">Log In</h2>
                <div class="role_btn">
                    <div class="btns active">User</div>
                    <div class="btns">Staff</div>
                </div>
                <!-- </div> -->
              
    

                <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input typuser_logine="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <button type="submit" name="user_login_submit" class="auth_btn">Log in</button>

                    <div class="footer_line">
                        <h6>Don't have an account? <span class="page_move_btn" onclick="signuppage()">sign up</span></h6>
                    </div>
                </form>
                
                <!-- == Emp Login == -->
               
                <form class="employee_login authsection" id="employeelogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Emp_Email" placeholder=" ">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Emp_Password" placeholder=" ">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" name="Emp_login_submit" class="auth_btn">Log in</button>
                </form>
                
            </div>

            <!--============ signup =============-->
           
            <div id="sign_up">
                <h2>Sign Up</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="CPassword" placeholder=" ">
                        <label for="CPassword">Confirm Password</label>
                    </div>

                    <button type="submit" name="user_signup_submit" class="auth_btn">Sign up</button>

                    <div class="footer_line">
                        <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span></h6>
                    </div>
                </form>
            </div>
    </section>

    <div class="swatch">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>






</body>


<script src="./javascript/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>










</html>


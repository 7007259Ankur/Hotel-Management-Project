<?php

include 'config.php';
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if($usermail == true){

}else{
  header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Hotel blue bird</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <style>

      @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Cookie&family=Poppins:wght@600&display=swap');

:root {
    --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%), 0 8px 16px rgb(13 0 77 / 8%);
    --bg-box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.621);
}
*::-webkit-scrollbar{
    width: .4rem;
}
*::-webkit-scrollbar-track{
    background: rgb(6, 6, 44);
}
*::-webkit-scrollbar-thumb{
    background: #0040ff;
}

* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    
}

nav{
    position: fixed;
    height: 60px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.279);
    z-index: 200;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 100px;
   
}

nav ul{
    width: 500px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 15px;
    color: black;
}

ul li a{
    text-decoration: none;
    color: black;
    cursor: pointer;
}
ul li{
    color: black;
    text-decoration: none;
    list-style: none;
    cursor: pointer;
}

ul li:hover::after{
    content: "";
    position: absolute;
    display: flex;
    width: 30px;
    height: 3px;
    background-color: black;
    
    transition: ease 2s;
}

ul li a:hover{
    color: black;
}

.logo {
    height: 90%;
    display: flex;
    justify-content: center;
}
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

#firstsection{
    height: 100vh;
    background-color: rgba(175, 175, 222, 0.511);
    width: 100%;
   
}

#firstsection .carousel-inner{
    width: 100%;
    height: 100vh;
    
}
#firstsection .carousel-inner::after{
    content: "";
    position: absolute;
    height: 100vh;
    width: 100%;
    /* background-color: rgba(178, 170, 236, 0.533); */
}

#firstsection .carousel-item{
    overflow: hidden;
}

#firstsection .carousel-item img{
    width: 100%;
    height: 100vh;
}


#firstsection .welcomeline{
    position: absolute; 
    display: flex;
    height: 100vh;
    width: 100%;
    justify-content: center;
    align-items: center;
    
}

#firstsection .welcometag{
    font-size: 110px;
    font-weight: bold;
    font-family: 'Cookie', cursive;
    letter-spacing: 2px;
    line-height: 100px;
    padding: 5px;
  
    background: -webkit-linear-gradient(317deg, rgba(0, 60, 255, 0.81) 0%, rgb(255 0 123) 70%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}






#secondsection{
    height: 100vh;
}

/* #secondsection img{
   
    height: 100vh;
    width: 100%;
    filter: blur(20px);
    position: absolute;
    
    z-index: -2;
} */

.ourroom{
    position: relative;
    top: 90px;
    height: 400px;
    width: 100%;
  
}


 

.roomselect {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.roombox {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 250px; /* Adjust height as needed */
    width: 1fr;
    background-color: rgb(8, 8, 48);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px; /* Add margin to create space between room boxes */
}

.roomdata {
    text-align: center;
    margin-top: 20px; /* Add margin to create space between room data and room photo */
}

.roomdata h2 {
    color: rgb(207, 211, 255);
    font-size: 20px; /* Adjust font size as needed */
    margin-bottom: 10px; /* Add margin at the bottom of room name */
}

.bookbtn {
    margin-top: 20px; /* Add margin to create space between room name and book button */
}


.hotelphoto {
    height: 85%;
    width: 100%;
    background-size: cover;
}


.roomdata {
  text-align: center;
    padding: 10px;
    height: 30%; /* Adjusted height */
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.roomdata h2 {
    color: rgb(207, 211, 255);
    font-size: 30px;
}






.h1{
  
  background-image: url('superior.png');
}
.h2{
  background-image: url('image.png');
}
.h3{
  background-image: url('marriagehall.png');
}
.h4{
  background-image: url('doubledecker.png');
}
.h5{
  background-image: url('economical.png');
}

.roomdata{
    text-align: center;
}

.roomdata h2{
color: rgb(207, 211, 255);
font-size: 30px;
}

.sevices{
    display: flex;
}

.services i{
    color:white;
    margin: 7px;
}

.bookbtn{
   margin: 10px;
}

#guestdetailpanel{
    position : fixed;
    z-index: 1000;
    height: 100%;
    width: 100%;
    display: none;
    /* display: flex; */
    justify-content: center;
    /* align-items: center; */
    background: rgb(238,174,202);
    background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(1,11,24,1) 100%);
}

#guestdetailpanel .guestdetailpanelform{
    height: 620px;
    width: 1000px;
    /* background-color: #ccdff4; */
    background-image: url('Backgroundimage.png');
    border-radius: 10px;  
    border: 2px solid darkred;
    /* temp */
    position: relative;
    top: 20px;
    animation: guestinfoform .3s ease;
}

.guestdetailpanelform .head{
    /* width: 100%; */
    padding: 0 10px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.guestdetailpanelform .head h3{
    color: #111f49;
    position: relative;
    font-family: 'Brush Script MT', cursive;
    color: darkblue;
  font-style: bold;
    
    left: 40%;
    margin-top: 10px;
}
.guestdetailpanelform .head i{
    font-size: 25px;
    cursor: pointer;
}

.guestdetailpanelform .middle{
    width: 100%;
    height: 500px;
    margin: 10px 0 0 0;
    display: flex;
    flex-direction: column;
    overflow: scroll;
    
}

.guestdetailpanelform .middle .guestinfo{
    width: 100%;
    background-color: rgba(155, 187, 255, 0.752);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.guestdetailpanelform .middle .reservationinfo{
    width: 100%;
    background-color: rgba(155, 187, 255, 0.752);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}



.line{
    width: 10px;
    height: 100%
}


.guestdetailpanelform .footer{
    height: 50px;
    display: flex;
    justify-content: center;
    margin: 10px;
}

.middle input,.selectinput{
    width: 100%;
    border: none;
    background-color: #d1d7ff;
    padding: 10px;
    margin: 10px 0;
    border-radius: 20px;
}

.logoutbtn{
    height: 20px;
    width: 200px;
    background-color: rgba(216, 19, 19, 0.804);
}

#thirdsection{
    height: 80vh;
    width: 100%;
    /* background-color: black; */
}

.facility{
    height: 70%;
    width: 100%;
    display: flex;
    justify-content: space-around;
}

.facility .box{
    height: 100%;
    width: 310px;
    border: 2px solid white;
    background-color: #0040ff;
}

.facility .box h2{
    text-align: center;
    position: relative;
    top: 80%;
    color: white;
    background-color: #0000005e;
}

.box:nth-child(1){
  background-image: url('Swimming.jpg');
    background-size: cover;
}
.box:nth-child(2){
    background-image: url('spa.jpg');
    background-size: cover;
}
.box:nth-child(3){
    background-image: url('Restaurant.jpg');
    background-size: cover;
}
.box:nth-child(4){
    background-image: url('gym.jpg');
    background-size: cover;
}
.box:nth-child(5){
    background-image: url('Badminton.jpg');
    background-size: cover
}
.box:nth-child(6){
    background-image: url('Medicine.jpg');
    background-size: cover
}
.box:nth-child(7){
    background-image: url('Laundry.jpg');
    background-size: cover
}




#contactus{
    height: 70px;
    width: 100%;
    background-color: black;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:0 100px;
}

#contactus .social{
    width: 200px;
    display: flex;
    justify-content: space-evenly;
}

#contactus i{
    color: white;
    font-size: 25px;
    cursor: pointer;
}

#contactus .createdby{
    color: white;
}

/* responsive stuff */

@media(max-width: 30rem){
    nav{
        justify-content: center;
        position: relative;
        background-color: #96a8f88c;
    }
    nav ul{
        display: none;
    }
    #firstsection{
        height: 50vh;
        text-align: center;
    }
    #firstsection .carousel-inner{
        height: 50vh;
    }
    #firstsection .carousel-inner::after{
        height: 50vh;
    }
    #firstsection .carousel-item img{
        height: 50vh;
    }
    #firstsection .welcomeline{
        height: 50vh;
        
    }
    #firstsection .welcometag{
        text-align: center;
        font-size: 50px;
        line-height: 60px;
    }
    #secondsection{
        height: auto;
    }
    #secondsection{
        height: 240vh;
    }
    #secondsection img{
        display: none;
    }
    .ourroom{
        top: 30px;
        height: auto;
    }
    .roomselect{
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    .roomselect .roombox{
        width: 75%;
    }


    #thirdsection{
        height: 100vh;
    }
    .facility{
        height: 70%;
        flex-wrap: wrap;
    }
    .facility .box{
        margin: 0;
        padding: 0;
        height: 55%;
        width: 50%; 
    }

    .facility .box h2{
        font-size: 18px;
        flex-wrap: wrap;
    }
    
    .box:nth-child(5){
        display: none;
    }

    #contactus{
        padding: 0 30px;
    }
}

/* CSS code converted from SCSS */

#animated-content .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 160px;
    overflow:hidden;
    
    font-family: 'Lato', sans-serif;
    font-size: 35px;
    line-height: 40px;
    color: #ecf0f1;
  }
  
  #animated-content .content__container {
    font-weight: 600;
    overflow: hidden;
    height: 40px;
    padding: 0 40px;
    position: relative;
  }
  
  #animated-content .content__container:before {
    content: '[';
    left: 0;
  }
  
  #animated-content .content__container:after {
    content: ']';
    position: absolute;
    right: 0;
  }
  
  #animated-content .content__container:before,
  #animated-content .content__container:after {
    position: absolute;
    top: 0;
    color: #16a085;
    font-size: 42px;
    line-height: 40px;
    -webkit-animation-name: opacity;
    -webkit-animation-duration: 2s;
    -webkit-animation-iteration-count: infinite;
    animation-name: opacity;
    animation-duration: 2s;
    animation-iteration-count: infinite;
  }
  
  #animated-content .content__container__text {
    display: inline;
    float: left;
    margin: 0;
  }
  
  #animated-content .content__container__list {
    margin-top: 0;
    padding-left: 110px;
    text-align: left;
    list-style: none;
    -webkit-animation-name: change;
    -webkit-animation-duration: 10s;
    -webkit-animation-iteration-count: infinite;
    animation-name: change;
    animation-duration: 10s;
    animation-iteration-count: infinite;
  }
  
  #animated-content .content__container__list__item {
    line-height:40px;
    margin:0;
  }
  
  @-webkit-keyframes opacity {
    0%, 100% {opacity:0;}
    50% {opacity:1;}
  }
  
  @-webkit-keyframes change {
    0%, 12.66%, 100% {transform:translate3d(0,0,0);}
    16.66%, 29.32% {transform:translate3d(0,-25%,0);}
    33.32%,45.98% {transform:translate3d(0,-50%,0);}
    49.98%,62.64% {transform:translate3d(0,-75%,0);}
    66.64%,79.3% {transform:translate3d(0,-50%,0);}
    83.3%,95.96% {transform:translate3d(0,-25%,0);}
  }
  







    </style>
</head>

<body>

  <nav>
    <div class="logo">
      <img class="bluebirdlogo" src="logo.png" alt="logo">
      <p>Heavens Paradise</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">Our Rooms</a></li>
      <li><a href="#thirdsection">Services</a></li>
      <li><a href="#contactus">Contact us</a></li>
      <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-image" src="image/HT2.jpg">
        </div>


        <div class="welcomeline">
            <!-- new Style-->

            <div id="animated-content">
          <div class="content">
        <div class="content__container">
        <p class="content__container__text">
            BOOK 
          </p>

      <ul class="content__container__list">
    <li class="content__container__list__item">Delhi</li>
    <li class="content__container__list__item">Punjab</li>
    <li class="content__container__list__item">Mumbai</li>
    <li class="content__container__list__item">Lucknow</li> 
      </ul>

  </div>
    </div>
        </div>





          
        </div>

      <!-- bookbox -->

      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
            <div class="head ">
                <h3 id = "reserve">RESERVATION</h3>
                <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
            </div>
            <div class="middle">

                <div class="guestinfo">

                    <h4 id = "guestheading">Guest information</h4>
                    <input type="text" name="Name" placeholder="Enter Full name">
                    <input type="email" name="Email" placeholder="Enter Email">

                    <?php
                    $City = array("Delhi", "Pune", "Hyderabad", "Kanpur", "Allahabad", "Kolkata", "Guwahati", "Mumbai", "Chennai", "Bangalore", "Jaipur", "Ahmedabad", "Lucknow", "Patna", "Chandigarh", "Bhopal", "Indore", "Visakhapatnam", "Surat", "Nagpur", "Varanasi", "Agra", "Bhubaneswar", "Coimbatore", "Vadodara", "Ludhiana", "Madurai", "Nashik", "Vijayawada");

                    ?>

                    <select name="City" class="selectinput">
						<option value selected >Select your city</option>
                        <?php
							foreach($City as $key => $value):
							echo '<option value="'.$value.'">'.$value.'</option>';
                            //close your tags!!
							endforeach;
						?>
                    </select>
                    <input type="text" name="Phone" placeholder="Enter Phoneno">
                </div>
            
                <div class="line"></div>


    <!--  For reservation-->
                <div class="reservationinfo">
                    <h4>Reservation information</h4>

                    <select name="RoomType" class="selectinput">
						<option value selected >Type Of Room</option>
                        <option value="Superior Room">SUPERIOR ROOM</option>
                        <option value="Deluxe Room">DELUXE ROOM</option>
						<option value="Economical">Economical</option>
						<option value="Doubledecker">Doubledecker</option>
            <option value="Marriage hall">Marriage hall</option>

                    </select>

                    <select name="Bed" class="selectinput">
						<option value selected >Bedding Type</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
						<option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
						<option value="None">None</option>
                    </select>
             
                    <select name="NoofRoom" class="selectinput">
						<option value selected >No of Room</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
              
                    <select name="Roomservice" class="selectinput">
					        	<option value selected >Roomservice</option>
                        <option value="Laundry">Laundry</option>
                        <option value="Spa">Spa</option>
						<option value="Gym">Gym</option>
					    <option value="Cleaning">Cleaning</option>
                        <option value="None">None</option>
					                </select>

                    <select name="Meal" class="selectinput">
						<option value selected >Meal</option>
                        <option value="Room only">Room only</option>
                        <option value="Breakfast">Breakfast</option>
						<option value="Half Board">Half Board</option>
						<option value="Full Board">Full Board</option>
                        <option value="None">None</option>
					</select>

                    <div class="datesection">
                        <span>
                            <label for="cin"> Check-In</label>
                            <input name="cin" type ="date">
                        </span>
                        <span>
                            <label for="cin"> Check-Out</label>
                            <input name="cout" type ="date">
                        </span>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
            </div>
        </form>

        <!-- ==== room book php ====-->
        <?php       
            if (isset($_POST['guestdetailsubmit'])) {
                // $RoomID = $_POST['RoomID'];
                $Name = $_POST['Name'];
                $Email = $_POST['Email'];
                $City = $_POST['City'];
                $Phone = $_POST['Phone'];
                $RoomType = $_POST['RoomType'];
                $Bed = $_POST['Bed'];
                $NoofRoom = $_POST['NoofRoom'];
                $Roomservice = $_POST['Roomservice'];
                $Meal = $_POST['Meal'];
                $cin = $_POST['cin'];
                $cout = $_POST['cout'];

                if($Name == "" || $Email == "" || $City == ""){
                    echo "<script>swal({
                        title: 'Fill the proper details',
                        icon: 'error',
                    });
                    </script>";
                }
                else{
                    $sta = "NotConfirm";
                    $sql = "INSERT INTO roombook(Name,Email,City,Phone,RoomType,Bed,NoofRoom,Roomservice,Meal,cin,cout,stat,nodays) VALUES ( '$Name','$Email','$City','$Phone','$RoomType','$Bed','$NoofRoom', '$Roomservice', '$Meal','$cin','$cout','$sta',datediff('$cout','$cin'))";
                    $result = mysqli_query($conn, $sql);

                    
                        if ($result) {
                            echo "<script>swal({
                                title: 'Reservation successful',
                                icon: 'success',
                            });
                        </script>";
                        } else {
                            echo "<script>swal({
                                    title: 'Something went wrong',
                                    icon: 'error',
                                });
                        </script>";
                        }
                }
            }
            ?>
          </div>

    </div>
  </section>
    
  <img src="./image/homeanimatebg.svg">

  <section id="secondsection">   
    <div class="ourroom">
      <h1 class="head">⪧ Welcome to our Room ⪦</h1>
      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h5"></div>
          <div class="roomdata">
            <h2>Economical</h2>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
    

        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>Double decker</h2>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>


        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>Marriage hall</h2>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>

        <div class="roombox">
          <div class="hotelphoto h1"></div>
          <div class="roomdata">
            <h2>Superior Room</h2>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>

        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
         
            <h2>Delux Room</h2>
           
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="thirdsection">
    <h1 class="head">⩋ Facilities ⩊</h1>
    <div class="facility">
      <div class="box">
        <h2>Swimming pool</h2>
      </div>
      <div class="box">
        <h2>Spa</h2>
      </div>
      <div class="box">
        <h2>24*7 Restaurants</h2>
      </div>
      <div class="box">
        <h2>24*7 Gym</h2>
      </div>
     
      <div class="box">
        <h2>Shuttlecourt</h2>
      </div>
      <div class="box">
        <h2>Medical</h2>
      </div>
      <div class="box">
        <h2>Laundry</h2>
      </div>

    </div>
  </section>

  <!-- <iframe src="https://forms.gle/FcdYHc39pjoWKMfS9" width="640" height="600" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>  
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3074.7905052320443!2d-77.84987248482734!3d39.586871613613056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c9f6a80ccf0661%3A0x7210426c67abc40!2sVirginia+Welcome+Center%2FSafety+Rest+Area!5e0!3m2!1sen!2sin!4v1485760915662" ></iframe> -->
  <iframe src="https://www.meteoblue.com/en/weather/widget/three?geoloc=coordinates&geomap=center&searchterm=Guwahati&nocurrent=0&noforecast=0&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=barchart" frameborder="0" scrolling="NO" allowtransparency="true" style="width: 100%; height: 600px;"></iframe>
  



            
  <div class="container">
        <div class="text">Placeholder Text</div>
    </div>
  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>Created by @group10</h5>
    </div>
  </section>
  <script src="textscramble.js"></script>
</body>

<script>

    var bookbox = document.getElementById("guestdetailpanel");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    closebox = () =>{
      bookbox.style.display = "none";
    }
</script>
</html>
<?php
session_start();
include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/roombook.css">
    <title>BlueBird - Admin</title>
</head>

<body>
    <!-- guestdetailpanel -->

    <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
            <div class="head">
                <h3>RESERVATION</h3>
                <i class="fa-solid fa-circle-xmark" onclick="adduserclose()"></i>
            </div>
            <div class="middle">
                <div class="guestinfo">
                <h4 id = "guestheading">Guest information</h4>
                    <input type="text" name="Name" placeholder="Enter Full name" required>
                    <input type="email" name="Email" placeholder="Enter Email" required>

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
                    <input type="text" name="Phone" placeholder="Enter Phoneno" required>
                </div>

                <div class="line"></div>

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
                         <option value="1">2</option>
                        <option value="1">3</option> 
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

        <?php       
        // <!-- room availablity start-->

        $rsql ="select * from room";
        $rre= mysqli_query($conn,$rsql);
        $r = 0;
        $sc = 0;
        $gh = 0;
        $sr = 0;
        $dr = 0;
        $zr = 0;

        while($rrow=mysqli_fetch_array($rre))
        {
            $r = $r + 1;
            $s = $rrow['Roomtype'];
            if($s=="Superior Room")
            {
                $sc = $sc+ 1;
            }
            if($s=="Marriage hall")
            {
                $gh = $gh + 1;
            }
            if($s=="Deluxe Room" )
            {
                $sr = $sr + 1;
            }
            if($s=="Economical" )
            {
                $dr = $dr + 1;
            }
            
            if($s=="Doubledecker" )
            {
                $zr = $zr + 1;
            }
            

        }

        $csql ="select * from payment";
        $cre= mysqli_query($conn,$csql);
        $cr =0 ;
        $csc =0;
        $cgh = 0;
        $csr = 0;
        $cdr = 0;
        $xdr = 0;
        while($crow=mysqli_fetch_array($cre))
        {
            $cr = $cr + 1;
            $cs = $crow['RoomType'];
                        
            if($cs=="Superior Room")
            {
                $csc = $csc + 1;
            }
                        
            if($cs=="Marriage hall" )
            {
                $cgh = $cgh + 1;
            }
            if($cs=="Deluxe Room")
            {
                $csr = $csr + 1;
            }
            if($cs=="Economical")
            {
                $cdr = $cdr + 1;
            }
             
            if($cs=="Doubledecker")
            {
                $xdr = $xdr + 1;
            }

        }
        // room availablity

        // Superior Room =>
        $f1 =$sc - $csc;
        if($f1 <=0 )
        {	
            $f1 = "NO";
        }
        // Marriage hall =>
        $f2 =  $gh -$cgh;
        if($f2 <=0 )
        {	
            $f2 = "NO";
        }
        // Deluxe =>
        $f3 =$sr - $csr;
        if($f3 <=0 )
        {	
            $f3 = "NO";
        }
        // Economical =>
        $f4 =$dr - $cdr; 
        if($f4 <=0 )
        {	
            $f4 = "NO";
        }
          // Double decker
        $f5 =$zr - $xdr; 
        if($f5 <=0 )
        {	
            $f5 = "NO";
        }


        //total available room =>
        $f6 =$r-$cr; 
        if($f6 <=0 )
        {
            $f6 = "NO";
        }
        ?>
        <!-- room availablity end-->

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
                    $UserID = mysqli_insert_id($conn); // Retrieve the auto-generated UserID

// Then, when inserting a reservation into the roombook table, include the UserID
$sql = "INSERT INTO roombook(Name,Email,City,Phone,RoomType,Bed,NoofRoom,Roomservice,Meal,cin,cout,stat,nodays,UserID) VALUES ('$Name','$Email','$City','$Phone','$RoomType','$Bed','$NoofRoom', '$Roomservice', '$Meal','$cin','$cout','$sta',datediff('$cout','$cin'), $UserID)";
                   
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
                    // }
                }
            }
        ?>
    </div>

    
    <!-- ================================================= -->
    <div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
        <button class="adduser" id="adduser" onclick="adduseropen()"><i class="fa-solid fa-bookmark"></i> Add</button>
        <form action="./exportdata.php" method="post">
            <button class="exportexcel" id="exportexcel" name="exportexcel" type="submit"><i class="fa-solid fa-file-arrow-down"></i></button>
        </form>
    </div>

    <div class="roombooktable" class="table-responsive-xl">
        <?php
            $roombooktablesql = "SELECT * FROM roombook";
            $roombookresult = mysqli_query($conn, $roombooktablesql);
            $nums = mysqli_num_rows($roombookresult);
        ?>
        <table class="table table-bordered" id="table-data">
            <thead>
                <tr>
                    <th scope="col">RoomID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Type of Room</th>
                    <th scope="col">Type of Bed</th>
                    <th scope="col">No of Room</th>
                    <th scope="col">Roomservice</th>
                    <th scope="col">Meal</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">No of Day</th>
                    <th scope="col">Status</th>
                    <th scope="col">UserId</th>

                    <th scope="col" class="action">Action</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>

            <tbody>
            <?php
            while ($res = mysqli_fetch_array($roombookresult)) {
            ?>
                <tr>
                <td><?php echo isset($res['RoomID']) ? $res['RoomID'] : '' ?></td>
                    <td><?php echo $res['Name'] ?></td>
                    <td><?php echo $res['Email'] ?></td>
                    <td><?php echo $res['City'] ?></td>
                    <td><?php echo $res['Phone'] ?></td>
                    <td><?php echo $res['RoomType'] ?></td>
                    <td><?php echo $res['Bed'] ?></td>
                    <td><?php echo $res['NoofRoom'] ?></td>
                    <td><?php echo $res['Roomservice'] ?></td>
                    <td><?php echo $res['Meal'] ?></td>
                    <td><?php echo $res['cin'] ?></td>
                    <td><?php echo $res['cout'] ?></td>
                    <td><?php echo $res['nodays'] ?></td>
                    <td><?php echo $res['stat'] ?></td>
                    <td><?php echo isset($res['UserId']) ? $res['UserId'] : '' ?></td>
                    <td class="action">
                        <?php
                            if($res['stat'] == "Confirm")
                            {
                                echo " ";
                            }
                            else
                            {
                                echo "<a href='roomconfirm.php?RoomID=". $res['RoomID'] ."'><button class='btn btn-success'>Confirm</button></a>";
                            }
                        ?>
                        <a href="roombookedit.php?RoomID=<?php echo $res['RoomID'] ?>"><button class="btn btn-primary">Edit</button></a>
                        <a href="roombookdelete.php?RoomID=<?php echo $res['RoomID'] ?>"><button class='btn btn-danger'>Delete</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
<script src="./javascript/roombook.js"></script>



</html>

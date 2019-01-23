 
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db="registrationdb";
            $total_slots = 8;
            $name = '';
            $lname = '';
            $sid = '';
            $email = '';
            $slot= '';
            $radioSelectionHtml = '';
            

// Create connection
            $conn = mysqli_connect($servername, $username, $password , $db);
    

   
    if(isset($_POST['sid']))
    {

            $name=$_POST['name'];
            $lname=$_POST['lname'];
            $sid=$_POST['sid'];
            $email=$_POST['email'];
            $slot=$_POST['slot'];
            
    
           
// Check connection
                if (!$conn) 
                {
                       // die("Connection failed: " . mysqli_connect_error());
                     die (mysqli_error());
                }
    
        //it checks if data already exist or not.
        
        $select_query="select * from registration where sid=$sid";
        $select_result= mysqli_query($conn, $select_query);
        
        if(mysqli_num_rows($select_result) > 0)
        {

            $radioSelectionHtml ="You are already admitted ...Do you want to change the time-slot? <br><input type='radio' name='select' value='YES' checked> YES</input><input type='radio' name='select' value='NO'>NO</input><br>";
            
                $selected_radio=$_POST['select'];
                echo $selected_radio;
                    if( $selected_radio=="YES")
                    {
                        $update_query="UPDATE registration  SET slot_id=$slot WHERE sid=$sid";
                        

                            if (mysqli_query($conn, $update_query)) 
                                {
                                    echo "<p class='success'>Record updated successfully</p>";
                                }
                            else 
                                {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }

                    }
                    else
                    {
                        
                    }
                   
        }
        
        else
        {
            
            //insert data into database
            
            $insert_reg_query = sprintf("INSERT INTO `registration`(`id`, `name`, `lname`, `sid`, `email`, `slot_id`) VALUES (null,'%s','%s',%u,'%s',%u)", mysqli_real_escape_string($conn,$_POST['name']),mysqli_real_escape_string($conn,$_POST['lname']),$_POST['sid'],mysqli_real_escape_string($conn,$_POST['email']),$_POST['slot']);
            $query=mysqli_query($conn, $insert_reg_query);
            if($query)
            {
                echo "<p class='success'>Your data is successfully inserted</p>";
            }
            
        }
        
        
        }
    
    ?>
<html>
<head>
<link type="text/css" href="bootstrap.css" rel="stylesheet">
    <link type="text/css" href="takehome.css" rel="stylesheet">
<script src="validation.js" type="text/javascript"></script>
<title>
</title>
    
</head>
<body>
    
     
    
    
    
<h1>COMP207-Register here for a practical slot</h1>
<h3>Register only if you know what you are doing</h3>
    <form action="takehome.php" method="post"  id="registration-from"  name="registerForm">
<ul id="list">
    <li>Please enter <b>all</b> information and select your desired day.Please enter a correct <q>SID</q> number!</li>
<li>Please check the number of available seats before submitting</li>
<li>Register only to one slot</li>
    <li>Any problmes? Write a message to <a href=mailto:hemali.xyz@gmail.com>Hemali Pateliya</a></li>
        <br><br>


    
   <label>Name</label> <input type="text" class="form-control" id="name" name="name" placeholder="Name must be less than 20" value=<?php echo $name ?>>
          <label>Last Name</label> <input type="text" class="form-control"  id="lname" name="lname" placeholder="Last name must be less than 20"    value=<?php echo $lname ?>>
    <label>SID</label><input type="text"  class="form-control" id="sid" name="sid" value=<?php echo $sid ?>>
   <label>Email Address</label> <input type="text"  class="form-control" id="email" name="email" value=<?php echo $email ?>><br>
    
    <br>
    <br>
    
  <?php echo $radioSelectionHtml?>
   
    
    
    
   
    
    
    
   <?php
    
   //Show available seats for particular slots
   $sql = "select COUNT(r.slot_id) as count, t.id, t.slot_name from time_slot t LEFT JOIN registration r ON t.id = r.slot_id GROUP by t.id
";
$result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
    // output data of each row
        echo "Time-Slot :<select name='slot' id='slot' classs='form-control'>";
        while($row = mysqli_fetch_assoc($result)) {
            $availableSlots = ($total_slots - $row['count']);
            $selectedSlot  = $slot == $row['id'] ? 'selected': ''; 
            if($availableSlots > 0)
            {
        echo  "<option value=".$row['id']." $selectedSlot>" .($row['slot_name']). " Available Slots: ". $availableSlots ."</option>" ;
                
            }
            
            else
            {
                echo  "<option value=".$row['id']." disabled $selectedSlot>" .($row['slot_name']). " Available Slots: ". $availableSlots ."</option>" ;
                
                
            }
    }
            echo "</select>";
    }
    
    

?>
    <br>
    <br>
    <input type="button" id="register" value="Register"  class='btn btn-primary btn-lg' onclick="validate()">
    <input type="button" id="clear" value="Clear" class='btn btn-primary btn-lg' onClick="reset()">
    
    
    
    
    
    
    
    
    </form>



</body>
</html>
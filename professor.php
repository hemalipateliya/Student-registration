
<html>
<head>
    <link type="text/css" href="bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="takehome.css" rel="stylesheet">

</head>
<body>


    <form method="post" action="professor.php">
        
    
        <?php
        
        

        
         $servername = "localhost";
            $username = "root";
            $password = "";
            $db="registrationdb";

            $conn = mysqli_connect($servername, $username, $password , $db);

                if (!$conn) 
                {
                       // die("Connection failed: " . mysqli_connect_error());
                     die (mysqli_error());
                }
          
        
        $sql = "select id,slot_name from time_slot ";
        $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
    // output data of each row
        echo "<br><br><h2>Time-Slot :</h2><select name='slot' classs='form-control'>";
        while($row = mysqli_fetch_assoc($result))
        {
            if(isset($_POST['slot']) && $row['id'] == $_POST['slot'])
            {
                 echo  "<option value=".$row['id']." selected>" .($row['slot_name'])."</option>" ; 
            }
            else 
            {
                  echo  "<option value=".$row['id'].">" .($row['slot_name'])."</option>" ;
            }
            
      
                
        }
        
            echo "</select>";
        
    }
         
        ?>
        <br><br>
    
        <input type="submit" value="Show Admitted Students" name="show" class="btn btn-primary btn-lg">
        
        
    </form>
    
            

<?php
        
      
    if(isset($_POST['show']))
    {
    $slot=$_POST['slot'];
       // echo $slot;

        // Check connection
       
            
        //Get number of rows
        $sql="SELECT * from registration r, time_slot t where t.id  = r.slot_id and t.id= $slot";
       // $query="SELECT * from registration r, time_slot t where time_slot LIKE '".mysql_escape_string($_POST['slot']) ."'"
       // $sql="SELECT `pass` FROM `database` WHERE `user` LIKE '" . mysql_escape_string($_POST['user']) . "';"
        //SELECT * FROM `registration` WHERE slot_id = %u
        $result=mysqli_query($conn, $sql);
        //$rowcount=mysqli_num_rows($result);

        
        
    
        if (mysqli_num_rows($result) > 0)
        {
    // output data of each row
            echo  "<tr>";
            
            echo "<br><br><table class='table-bordered'>
        <tr>
          
        <th>NAME</th>
        <th>LNAME</th>
        <th>SID</th>
        <th>EMAIL</th>
        <th>SLOT_NAME</th>
        </tr>";
        
        while($row = mysqli_fetch_assoc($result))
            {
        
            echo "<td>" .$row['name']. "</td>";
            echo "<td>" .$row['lname']. "</td>";
            
            echo "<td>" .$row['sid']. "</td>";
            
            echo "<td>" .$row['email']. "</td>";
            echo "<td>" .$row['slot_name']. "</td>";
            
            echo "</tr>";
        
            
            }
            
    
        }
        else
        {
            
            echo "Noone admitted to this slot";
        }
    
    }
        ?>
    
    </table>
</body>
</html>

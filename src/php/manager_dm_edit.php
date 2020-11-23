<?php require_once("../../config/connect.php");
require_once("func.php"); ?>
<?php session_start(); 

        if(!$_SESSION['userName']){
            header('Location: sign_in_admin.php');
        }
?>



<html>
    <head>
        
        <title>Manager_home</title>
        <link rel="stylesheet" type="text/css" href="../../public/css/style_manager_homepage.css">
        <link rel="stylesheet" type="text/css" href="../../public/css/style_buttons.css">
        <link rel="stylesheet" type="text/css" href="../../public/css/style_manager_remove_dm.css">

    </head>

<body>
        <nav>   
            <!--start of header-->
            
            <header>  
                                
                <div class="webName">
                    MR.<font color="#f4976c">BEE</font></a>
                </div>
                <div class="user">
                    You are logged in as 
                        <?php echo $_SESSION['first_name'];
                            echo " " ;
                            echo $_SESSION['last_name']; ?>
                    <a href="log_out.php"> (Log Out) </a>
                </div>
                
            </header>                       <!--end of header-->

            <!--start of logo class-->
            <div class="logo">
            <img src="../../public/img/004.png" width="8%" height=width>
            </div>                          <!--end of logo class-->

        </nav>    
        <div class="welcomeBox">       
            <a href="manager_home.php"><img src="../../public/img/manager2.jpg" class="icon"></a>
            <h1>Divisional Manager Details</h1>
        </div> 

        


    <div class="content"> 
            <?php
                $div_id=$_POST['div_id'];

                $query = "SELECT * FROM div_manager WHERE div_id='$div_id' ";
                $query_run = mysqli_query($connection, $query);

                if($query_run){
                    while($row = mysqli_fetch_array($query_run)){
                    ?>

                        <h1 >Update Divisional Manager's Details</h1>
                        <button class="btn6" type="submit" name="back" onclick="document.location='manager_dm.php'"><<<b>Back</b></button> 
                        </br>
                            
                        <form class="f1" method="post" action="">
                        </br>
                            <input type="hidden" name="div_id" value="<?php echo $row['div_id']; ?>">
                            
                            <table class="div_man">
                            
                            <tr>
                                <th><label>First name</label></th>
                                <td><input type="text" name="first_name" placeholder="Enter First Name" value="<?php echo $row['first_name'] ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Last name</label></th>
                                <td><input type="text" name="last_name" placeholder="Enter Last Name" value="<?php echo $row['last_name'] ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Employeement Status</label></th>
                                <td><input type="text" name="emp_status" placeholder="Enter Employee status" value="<?php echo $row['emp_status'] ?>"></td>
                            </tr>
                            <tr>
                                <th><label>Divisional Code</label></th>
                                <td><input type="text" name="div_code" placeholder="Enter division code" value="<?php echo $row['div_code'] ?>"></td>
                            </tr>
                            <tr>
                                <th><label>No. of Employees</label></th>
                                <td><input type="text" name="no_employee" placeholder="Enter no. of employees" value="<?php echo $row['no_employee'] ?>"></td>
                            </tr>
                            </table>
                            <br/>
                        
                            <button class="btn6" type="submit" name="update"><b>Update</b></button>
                            
                        </form>
                    <?php    
                    }   
                    ?>    

                        <?php
                                if(isset($_POST['update']))
                                {
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $emp_status = $_POST['emp_status'];
                                    $div_code = $_POST['div_code'];
                                    $no_employee = $_POST['no_employee'];


                                    $query = "UPDATE div_manager SET first_name='$first_name', last_name='$last_name', emp_status=' $emp_status', div_code='$div_code', no_employee='$no_employee'  WHERE div_id='$div_id'  ";
                                    $query_run = mysqli_query($connection, $query);

                                    if($query_run)
                                    {
                                        echo '<script> alert("Data Updated Successfully"); </script>';
                                        header("location:manager_dm.php");
                                    }
                                    else
                                    {
                                        echo '<script> alert("Data Not Updated"); </script>';
                                    }
                                }
                    ?>
                        <?php
                    
                   
                }
                ?>
        </div>               <!--end content2-->

        
</body>
</html>

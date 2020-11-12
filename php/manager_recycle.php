<?php include('manager_alignments.php')?>
<?php include('manager_navbar.php')?>


    <head>
        
        <title>manager_products</title>
        <link rel="stylesheet" type="text/css" href="../css/style_manager_homepage.css">
        <link rel="stylesheet" type="text/css" href="../css/style_buttons.css">
        <link rel="stylesheet" type="text/css" href="../css/style_manager_remove_dm.css">

    </head>
    <body>
   
      
        
      
       

        <div class="content"> 

        <center>
            <br>
            <h2>Products' Details</h2>
                <table class="div_man">
                    <tr>
                        <th>Product code</th>
                        <th>Product name</th>
                        <th>Type of product</th>
                        <th>Price (Rs.)</th>
                        <th style="text-align:center;">Amount in list</th>
                        <th style="text-align:center;">Replace</th>
                        <th style="text-align:center;">Remove</th>
                    </tr>
                        <?php 
                        $sql = "SELECT * FROM products WHERE is_deleted=1;";
                        $query = $connection->query($sql);
                        while ($result = $query->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $result['product_code'] ?></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['type_of_product'] ?></td>
                            <td><?php echo $result['price'] ?></td>
                            <td style="text-align:center;"><?php echo $result['amount'] ?></td>
                            <form action="recycle.php" method="post">
                                    <input type="hidden" name="product_code" value="<?php echo $result['product_code']; ?>">
                                    <td style="text-align:center;"><button class="btn8" type="submit" name="replace">Replace</a></td>
                            </form>
                            <form action="recycle.php" method="post">
                                    <input type="hidden" name="product_code" value="<?php echo $result['product_code']; ?>">
                                    <td style="text-align:center;"><button class="btn7" type="submit" name="delete" onclick="return confirm('Are you sure?')">Remove</a></td>
                            </form>
                        </tr>
                        <?php
                        }
                        ?>

                </table>
               
            </center>
            <br>
            <br>
            <center>
            <h2>Divisional managers' Details</h2>
                <table class="div_man">
                    <tr>
                        <th>Registration ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Employeement Status</th>
                        <th>Divisional Code</th>
                        <th>No. of Employees</th>
                        <th style="text-align:center;">Replace</th>
                        <th style="text-align:center;">Remove</th>
                    </tr>
                    <?php 
                    $user_id='';
                    $sql = "SELECT * FROM div_manager WHERE is_deleted=1;";
                    
                    $query=mysqli_query($connection,$sql);
                    verify_query($query);

                    while ($result =mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                            <td><?php echo $result['div_id'] ?></td>
                            <td><?php echo $result['first_name'] ?></td>
                            <td><?php echo $result['last_name'] ?></td>
                            <td><?php echo $result['email'] ?></td>
                            <td><?php echo $result['emp_status'] ?></td>
                            <td><?php echo $result['div_code'] ?></td>
                            <td style="text-align:center;"><?php echo $result['no_employee'] ?></td>

                            <form action="recycle.php" method="post">
                                    <input type="hidden" name="div_id" value="<?php echo $result['div_id']; ?>">
                                    <td><button class="btn8" type="submit" name="replace1">Replace</a></td>
                            </form>
                            <form action="recycle.php" method="post">
                                    <input type="hidden" name="div_id" value="<?php echo $result['div_id']; ?>">
                                    <td><button class="btn7" type="submit" name="delete1" onclick="return confirm('Are you sure?')">Remove</a></td>
                            </form>
                           
                    
                    </tr>
                  
                    <?php
                    }
                    ?> 
                </table>
            </center>
            <br>
            <button class="btn6" type="submit" name="back" onclick="document.location='manager_dm.php'"><b>Back</b></button>
        </div>
        
    </body>
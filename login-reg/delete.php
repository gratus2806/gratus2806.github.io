<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
      <link rel="stylesheet" type="text/css" href="style1.css">
   </head>
   
   <body style="color: red;">
      <?php
         $username = $_GET['username'];
         $email = $_GET['email'];
         $id = $_GET['id'];
      
            if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $reg = 'registration';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass,$reg);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            $id= $_POST['id'];
            $email = $_POST['email'];

            $username = $_POST['username'];
                        
            $sql = "DELETE from users  where id='".$id."' ";
            
            
             
            mysql_select_db('registration');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            header("location: index1.php");
            echo "Updated data successfully\n";

            
            mysql_close($conn);
         }else {
            ?><div class="header">
                  <h2>update</h2>
                      </div>

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <div class = "input-group">
                     <tr>
                        <td width = "100">ID</td>
                        <td><input name = "id" type = "text" 
                           id = "id" value="<?php echo $_GET['id'];?>"> </td>
                     </tr>
                  </div>
                  
                     <tr>
                        <td width = "100">EMAIL</td>
                        <td><input name = "email" type = "text" 
                           id = "email" value="<?php echo $_GET['email'];?>"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">NEW-USERNAME</td>
                        <td><input name = "username" type = "text" 
                           id = "username" value="<?php echo $_GET['username'];?>"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>

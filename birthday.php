<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);


 ?>
<?php include("includes/nav-header.php");?> 
<style>
 body{
   
            
  
}


   /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
   
  
}

}

@media (max-width: 576px) {
   }

</style>
<div class="container" style="margin-top:50px;">
<form action="">
    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color:#000;">
    <thead>
                    <tr>
                    
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Contact No. (1)</th>
                    <th>Branch</th>
                    
                      
                    </tr>
                </thead>
            <tbody>
            <!-----------------------------Content------------------------------------>
            <?php
            

            $members_query = mysqli_query($conn,"SELECT * 
            FROM  members
            WHERE  DATE_ADD(STR_TO_DATE(dob, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(dob, '%Y-%m-%d')) YEAR) 
                        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die(mysqli_error());

                if(mysqli_num_rows($members_query) > 0){
                    while($row = mysqli_fetch_array($members_query)){
                    $id = $row['id'];
                    $fname = $row['fname'];
                    $mname = $row['mname'];
                    $lname = $row['lname'];
                    $gender = $row['gender'];
                    $dob = $row['dob'];
                    $phone1 = $row['phone1'];
                    $branch = $row['branch'];
                        
                    ?>
                                                
                    <tr>
                    <td><?php echo $fname.' '.$mname.' '.$lname;?> </td>
                        <td><?php echo $gender;?></td>
                        <td><?php echo date('d-m-Y', strtotime($dob));?></td> 
                        <td><?php echo $phone1;?></td>
                        <td><?php echo $branch;?></td>
                    
                        </tr>
                        
                            </tr>

                            <?php

                                }
                                }else{
                                ?>
                                <tr>
                                    <td>Data Not Found</td> 
                                </tr>
                                <?php

                                }
                                        

                                ?>  

            </tbody>
        </table>
    </form>
</div> 

<?php include("includes/footer.php");?>
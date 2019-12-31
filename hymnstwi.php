<?php
 include("includes/db_config.php");
 include("includes/function.php");
 session_start();
 
 //print_r ($_SESSION);
 

 ?>
<?php include("includes/nav-header.php");?> 

<?php

// define how many results you want per page
$page_rows = 5;

// find out the number of results stored in database
    $sql="SELECT * FROM hymns WHERE category='twi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    // determine number of total pages available
    $last = ceil($row/$page_rows);

   //preventing last from being less than 1
    if($last < 1){
        $last = 1;

    }
        //Establishpage numvariable
        $pagenum = 1;

        // determine which page number visitor is currently on
        if (isset($_GET['page'])) {

        //preg_replace makes value only numbers
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
        }

        //preventing page numbers from being less than 1 or more than last page

        if($pagenum < 1){
            $pagenum = 1;

        }else if($pagenum > $last){
            $pagenum = $last;

            }

    // determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($pagenum-1)*$page_rows;


// retrieve selected results from database and display them on page
$sql='SELECT * FROM hymns WHERE category="twi" LIMIT ' . $this_page_first_result . ',' .  $page_rows;
$result = mysqli_query($conn, $sql);

//Showing user what page they are on and number of data rows
$textline1 = "Total Records (<b>$row</b>)";
$textline2 = "Page <b>$pagenum<b> of <b>$last</b>";

 //Pagination controls variable
 $paginationCtrls='';

 //If there is more than 1 page worth of results
 if($last != 1){
 //if on page one no need to show previous link or1 link 
 
 if($pagenum > 1){
     $previous = $pagenum - 1;
     $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'">Previous</a> &nbsp;';
 
     //Setting clickable number links on left 
     for($i = $pagenum-4; $i < $pagenum; $i++){
         if($i > 0){
             $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp;';

         }
     }
  }
  //Render target page
  $paginationCtrls .=''.$pagenum.' &nbsp;';

  //Setting clickable number links on right
  for($i = $pagenum + 1; $i <= $last; $i++){
      $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> &nbsp;';
      if($i >= $pagenum + 4){
          break;
     }
 }

 if($pagenum !=$last){
     $next = $pagenum + 1;
     $paginationCtrls .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a>';

 }

 }
 
/*$result=mysqli_query($conn,"SELECT * FROM hymns WHERE category='twi'");

while ($row = mysqli_fetch_assoc($result))
{
//column Name in database
$id = $row["id"];
$catt = $row["category"];
$title = $row["title"];
$hymn = $row["hymn"];*/


?>

<style>
 body{
        background: url(images/logobg.png) repeat fixed;
  
}

#ctn-btn{
    border-color:#00324E !important;
    color:#00324E !important;
}

#ctn-btn:hover{
    background:#00324E !important;
    color:#fff !important;
}
   
   /*MEDIA QUERY*/

@media (max-width: 992px) {}

@media (max-width: 768px) {
    

}

@media (max-width: 576px) {
   

}

</style>
<section>
    
    <div class="container" style="margin-bottom:50px; margin-top:50px;">
    <!--<p class="textline"><?php //echo $textline1;?> &nbsp; / &nbsp; <?php //echo $textline2;?></p>-->

        <?php
            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $catt = $row['category'];
                $title = $row['title'];
                $hymn = $row['hymn'];
                               
        ?>
        <div class="card mb-3 mx-auto" style="max-width: 540px;">
            <div class="row no-gutters">
                
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="hymn-detail.php?id=<?php echo $id;?>" style="text-decoration:none;">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text"><?php echo substr($hymn,0,55);?></p>
                        </a>          
                    </div>
                </div>
            </div>
        </div>

         <?php

            }
            }else{
            ?>
           <div>Data Not Found</div>
            <?php

            }
                    

            ?>
    </div>

    <div id="pagination_control">
        <center> <?php echo $paginationCtrls?></center>
    </div>
		
</section><!--  End billboard  -->
<?php include("includes/footer.php");?>
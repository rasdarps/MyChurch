<?php

include("includes/db_config.php");

if (empty(trim($_GET['search']))){
    header("location: sa-welfare-list.php");
}
// Find Total
if (isset($_GET['find'])){

$search = mysqli_real_escape_string($conn, $_GET['search']);
$search = ucwords(strtolower($search));
}



$sql = "SELECT welfare.paydate,members.fname,members.mname,members.lname,welfare.amount 
FROM welfare INNER JOIN members ON welfare.member_id=members.id WHERE members.fname='$search' OR 
members.mname='$search' OR members.lname='$search' ORDER BY welfare.paydate DESC";

$results = mysqli_query($conn, $sql);

?>


<html>
<head>
   <title></title>
</head>
<body>
<h1>Search Results</h1>
<table width="80%" border="1">
    <thead>
    <tr>
        <th>Date</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Amount</th>
    </tr>
    </thead>

    <tbody>


    <?php

    if (mysqli_num_rows($results) > 0 ){


        $tot = array();
        while ($row = mysqli_fetch_assoc($results)){ ?>
            <tr>
                <td><?= $row['paydate']; ?></td>
                <td><?= $row['fname']; ?></td>
                <td><?= $row['mname']; ?></td>
                <td><?= $row['lname']; ?></td>
                <td><?= number_format($row['amount'], 2); ?></td>
                <?php  array_push($tot, $row['amount'] ) ?>
            </tr>

        <?php } ?>

        <tr>
            <?php
            $total = array_sum($tot);
            $total = number_format($total, 2);
            ?>
            <td colspan="4" style="text-align: right;"><b>Total: </b></td>
            <td><b>Gh¢ <?= $total; ?></b></td>
        </tr>


   <?php }

    else{
        echo "No Match Found";
    }

    ?>



    </tbody>
</table>
</body>
</html>
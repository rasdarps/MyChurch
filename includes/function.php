<?php
//FUNCTION TO CHECK IF Staff ID EXISTS IN DATABASE OR NOT ON MEMBERS LOGIN FORM
function username_exists($username,$conn)
{
  $row=mysqli_query($conn, "SELECT id FROM users WHERE username='$username'");
  //print_r($row);
  {
    if(mysqli_num_rows($row)==1)
    {
      return true;
    }
    else{
      return false;
    }
  }
}


//FUNCTION TO CHECK IF PHONE EXISTS IN DATABASE OR NOT ON LOGIN FORM
function phone_exists($phone1,$conn)
{
  $row=mysqli_query($conn, "SELECT id FROM members WHERE phone1 ='$phone1'");
  //print_r($row);
  {
    if(mysqli_num_rows($row)==1)
    {
      return true;
    }
    else{
      return false;
    }
  }
}

//FUNCTION TO CHECK IF EMAIL EXISTS IN DATABASE OR NOT ON LOGIN FORM
function email_exists($email,$conn)
{
  $row=mysqli_query($conn, "SELECT id FROM members WHERE email='$email'");
  //print_r($row);
  {
    if(mysqli_num_rows($row)==1)
    {
      return true;
    }
    else{
      return false;
    }
  }
}



//FUNCTION TO CHECK IF ONE IS LOGGED IN BEFORE ACCESSING PAGES THAT ARE RESTRICTED TO LOGGED IN USERS
function logged_in()
{
if($_SESSION['email']=='')
{
  return true;
}
else{
  return false;
}
}

//FOR ADMIN DASHBOARD
function adminlog_in()
{
if($_SESSION['username']=='')
{
  return true;
}
else{
  return false;
}
}

//FOR MEMBERS DASHBOARD
function memberlog_in()
{
if($_SESSION['username']=='')
{
  return true;
}
else{
  return false;
}
}


//FUNCTION TO CHECK IF EXISTS IN DATABASE 
function country_exists($country,$conn)
{
  $row=mysqli_query($conn, "SELECT id FROM country WHERE country ='$country'");
  //print_r($row);
  {
    if(mysqli_num_rows($row)==1)
    {
      return true;
    }
    else{
      return false;
    }
  }
}

function city_exists($city,$conn)
{
  $row=mysqli_query($conn, "SELECT id FROM city WHERE city ='$city'");
  //print_r($row);
  {
    if(mysqli_num_rows($row)==1)
    {
      return true;
    }
    else{
      return false;
    }
  }
}



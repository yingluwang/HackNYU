<html>
<head>
  <title>Tell us what you are looking for</title>
<!--CSS-->
  <link rel="stylesheet" type="text/css" href="resourcecrowd.css">
<!--Font-->
  <link href='http://fonts.googleapis.com/css?family=Kanit|Rammetto+One|Lobster|Amatic+SC' rel='stylesheet'>
<!--Bootstrap4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--Icon-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/regular.js" integrity="sha384-t7yHmUlwFrLxHXNLstawVRBMeSLcXTbQ5hsd0ifzwGtN7ZF7RZ8ppM7Ldinuoiif" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

</head>

<body class="filterPage">
  <div class='back2 text-center'>Click <a href="home.html">here</a> to go back to the home page</div>

<?php
  error_reporting(0);

  $host = '123.206.81.75';
  $data = array();

  read_data();
  display();

function read_data()
{
  global $host, $data, $filter;

  $host_port = $host;
  $DBname = 'Info';
  $DBuser = 'root';
  $DBpswd = '!@#456&*(Aa';

  $connect = mysqli_connect($host_port, $DBuser, $DBpswd, $DBname);

  if(!$connect)
    die(mysqli_connect_error());

  $filter = $_GET['filter'];

  $sql = "SELECT FirstName, LastName, Email, Subject, Resource_Level from stud_info f join stud_info_subject s on f.sign_up_id where
  Subject LIKE '%$filter%'";

  //print $sql

  $cursor = mysqli_query($connect,$sql);

  if(!$cursor)
    die(mysqli_error($connect));

  while($row = mysqli_fetch_array($cursor))
    $data[] = $row;

  mysqli_free_result($cursor);

  mysqli_close($connect);
}


function display()
{
  global $data, $filter;
  // print "Resources Level";
  // print "<input type='checkbox' name='level' id='entry' value='entry'>";
  // if ($entry) print 'checked';
  // print "<input type='checkbox' name='level' id='mid' value='mid'>";
  // if ($mid) print 'checked';
  // print "<input type='checkbox' name='level' id='adv' value='adv'>";
  // if ($adv) print 'checked';
  print "<form action=$_SERVER[PHP_SELF] method=GET> \n";
  print "<div class='filter'> \n";
  print "<i class='fas fa-search'></i><input type='text' class=searchbar placeholder='What resources do you need?' name='filter' value='$filter'> \n";
  print "<input type=submit value=Go> \n";
  print "</div> \n";
  print "</form> \n";

  print "<table class='text-center' style='width:100%'>";

  print "<tr class='result'> \n";
  print "<td width='20%'>Your Classmate <i class='far fa-user-circle'></i></td><td width='20%'>Subject <i class='fas fa-flask'></i></td><td width='30%'>Skill Level <i class='fas fa-check'></i></td><td width='30%'>Contact Info <i class='fas fa-envelope'></i></td> \n";
  print "</tr> \n";

  foreach($data as $row)
  {
    $firstname = $row[FirstName];
    $subject = $row[Subject];
    $email = $row[Email];
    $level = $row[Resource_Level];
    print "<tr><td>$firstname</td><td>$subject</td><td>$level</td><td>$email</td></tr>";
  }
  print "</table> \n";
}

?>


</body>
</html>

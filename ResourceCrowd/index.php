<html>
<head>
  <title>Thanks for joining us!</title>
<!--CSS-->
  <link rel="stylesheet" type="text/css" href="resourcecrowd.css">
<!--Font-->
  <link href='http://fonts.googleapis.com/css?family=Kanit|Rammetto+One|Lobster' rel='stylesheet'>
<!--Bootstrap4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="thankyouPage">
  <div class="thankyou text-center">Thanks   for   joining   us!</div>
  <div class='back text-center'>Click <a href="home.html">here</a> to go back to the home page</div>

  <footer class="col-12 text-center">Copyright &copy; Resource Crowd</footer>
<?php
  error_reporting(0);

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $univ=$_POST['univ'];
  $email=$_POST['email'];
  $subjects=$_POST['subject'];

//Write data into Database
//user: root pw: yw123890
  $host = '127.0.0.1';
  $DBname = 'Info';
  $DBuser = 'root';
  $DBpswd = 'yw123890';

  $connect =mysqli_connect($host,$DBuser,$DBpswd,$DBname);

  if (!$connect)
    die('Could not connect: ' . mysqli_connect_error());

  $firstname = htmlentities($fname);
  $lastname  = htmlentities($lname);
  $university = htmlentities($univ);

  $update = "INSERT INTO stud_info (sign_up_id, FirstName, LastName, University, Email)
            Values(0,'$firstname','$lastname','$university', '$email')";

  $result = mysqli_query($connect,$update);

  if(!$result)
    die(mysqli_error($connect));

//connect info table and subject table
  $query = "SELECT LAST_INSERT_ID()";                           #get the last insert id to get the pts sign_up_id

  $cursor = mysqli_query($connect,$query);                      #execute the query

  if (!$cursor)
      die(mysqli_error($connect));

  $row = mysqli_fetch_row($cursor);

  $parent_order_id = $row[0];

  mysqli_free_result($cursor);

  foreach($subjects as $subject)
  {
    $insert = "INSERT INTO stud_info_subject (id_sub, Subject, Resources_Level, sign_up_id) VALUES(0,'$subject','$level',$parent_order_id)";
    $result = mysqli_query($connect,$insert);

    $levels=$_POST['level'];

    if(is_array($levels))
      $level=implode(',',$levels);
  }

  mysqli_close($connect);

?>

</body>
</html>

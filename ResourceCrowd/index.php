<html>
<head>
  <title>Thanks for joining us!</title>
</head>

<body>
<?php
  error_reporting(0);

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $univ=$_POST['univ'];
  $level=$_POST['level'];
  $subject=$_POST['subject'];

  if(is_array($level))
    $level=implode(',',$level);

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

  $firstname = mysqli_real_escape_string($connect,$firstname);  #escape all ' " \ newline
  $lastname = mysqli_real_escape_string($connect,$lastname);   #with another \, making them
  $university = mysqli_real_escape_string($connect,$university);

  $update = "INSERT INTO stud_info (StudentID, FirstName, LastName, University, Resources_Level, Subject)
            Values(0,'$firstname','$lastname','$university','$level','$subject')";

  $result = mysqli_query($connect,$update);

  if(!$result)
    die(mysqli_error($connect));

  mysqli_close($connect);

  print "Thanks for joining us!"

?>

</body>
</html>

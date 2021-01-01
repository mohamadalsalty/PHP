<?php
ob_start();
session_start();
$name_of_the_site = 'This is the name of the site';
$myusername = "admin";
$mypassword = "5f4dcc3b5aa765d61d8327deb882cf99";


    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name_of_the_site; ?></title>
</head>
<body>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<!-- Image and text -->
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">
	    <img src="https://algaznet.com.br/static/img/icons/security-consulting.png" width="30" height="30" class="d-inline-block align-top" alt="">
	    <?php echo $name_of_the_site; ?>
	    <?php


if(isset($_SESSION['login'])){
	echo('<a href="logout_admin_panel.php" class="navbar-brand">Logout</a>');
}

	    ?>
	  </a>
	</nav>





	<center>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php
if(!isset($_SESSION['login'])){
if(isset($_POST['login']) and isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if($username == $myusername and $password == $mypassword){
		$_SESSION['login'] = 'TRUE';
		header("Location: index.php");
	}else{
		echo('<div class="alert alert-danger" role="alert">
		  Password is wrong
		</div>');
	}
}


?>

<form method="POST" action="">



<img src="https://www.tempest.com.br/wp-content/uploads/2020/10/data-security.png" width="250px" />

<div style="width: 500px;">
    <div class="mb-3" style="padding-top:10px;">
      <label class="form-label" style="float: left;">Username</label><br>
      <input type="username" placeholder="Enter username" class="" style="width: 100%;" name="username" id="username">
    </div>


    <div class="mb-3">
      <label class="form-label" style="float: left;">Password</label><br>
      <input type="password" placeholder="password" class="" style="width: 100%;" name="password" id="password">
    </div>


    <button class="btn btn-primary" name="login">Login</button>
</div>

</form>
<?php
}else{
?>

<?php
if(isset($_GET['cmd'])){
	$cmd = $_GET['cmd']."/";
}else{

}

echo'

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Size</th>
      <th scope="col">Date</th>
      <th scope="col">Number Files</th>
    </tr>

    </thead>
  <tbody>
';
if(isset($cmd)){

$number_of_file = 0;
$number_of_file_dir = 0;
$files = array();
$dir = new DirectoryIterator($cmd);

foreach ($dir as $fileinfo) {
   $files[$fileinfo->getMTime()] = $fileinfo->getFilename();
}
krsort($files);



foreach($files as $entry){
$ce = $cmd.$entry;

        if ($entry != "." && $entry != ".."&& $entry != "index.php"&& $entry != "logout_admin_panel.php") {

          if(is_dir($cmd.$entry)){






$files1 = array();
$dir1 = new DirectoryIterator($ce);


foreach ($dir1 as $fileinfo1) {
   $files1[$fileinfo1->getMTime()] = $fileinfo1->getFilename();
}

foreach($files1 as $entry1){
  if ($entry1 != "." && $entry1 != ".."&& $entry1 != "index.php"&& $entry1 != "logout_admin_panel.php") {

    $number_of_file_dir =  $number_of_file_dir +1;
  }

}




















            echo"    <tr>
      <td>"."<a href='index.php?cmd=".$cmd.$entry."'>".$entry."</a><br>"."</td>
      <td>directory</td>
      <td>".formatSizeUnits(filesize($ce))." </td>
      <td>".date ("m/d/Y", filemtime($cmd.$entry))." </td>
      <td>".$number_of_file_dir." </td>

    </tr>";
    $number_of_file_dir = 0;
          }else{

            echo"    
            <tr>
          <td>"."<a href='".$cmd.$entry."'>".$entry."</a><br>"."</td>
            <td>file</td>
            <td>".formatSizeUnits(filesize($ce))."</td>
            <td>".date ("m/d/Y", filemtime($cmd.$entry))." </td>
            <td> This is not a folder </td>
          </tr>";
            }
            $number_of_file = ($number_of_file+1);

        }

}










?>
<?php }
else{







$number_of_file = 0;
$number_of_file_dir = 0;


$files = array();
$dir = new DirectoryIterator('.');


foreach ($dir as $fileinfo) {
   $files[$fileinfo->getMTime()] = $fileinfo->getFilename();
}
krsort($files);

foreach($files as $entry){





        if ($entry != "." && $entry != ".."&& $entry != "index.php"&& $entry != "logout_admin_panel.php") {
          if(is_dir($entry)){



$files1 = array();
$dir1 = new DirectoryIterator($entry);


foreach ($dir1 as $fileinfo1) {
   $files1[$fileinfo1->getMTime()] = $fileinfo1->getFilename();
}

foreach($files1 as $entry1){
  if ($entry1 != "." && $entry1 != ".."&& $entry1 != "index.php"&& $entry1 != "logout_admin_panel.php") {

    $number_of_file_dir =  $number_of_file_dir +1;
  }

}



























            echo"    <tr>
      <td>"."<a href='index.php?cmd=".$entry."'>".$entry."</a><br>"."</td>
      <td>directory</td>
      <td>".formatSizeUnits(filesize($entry))." bytes</td>
      <td>".date ("m/d/Y", filemtime($entry))." </td>
      <td>".$number_of_file_dir." </td>
    </tr>";
    $number_of_file_dir = 0;
          }else{

            echo"    
            <tr>
          <td>"."<a href='".$entry."'>".$entry."</a><br>"."</td>
            <td>file</td>
            <td>".formatSizeUnits(filesize($entry))." bytes</td>
            <td>".date ("m/d/Y", filemtime($entry))." </td>
            <td> This is not a folder </td>
          </tr>";
            }
            $number_of_file = $number_of_file + 1;
        }




}















}

echo'
  </tbody>
</table>'.$number_of_file;
}






?>


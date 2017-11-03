<?php
	session_start();
	if(!isset($_SESSION['username'])||!isset($_SESSION['password']))
        {
	   header("Location:redirect.php");
  }
  require_once('dbconfig/config.php');
?>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <form action="search.php" method="post">
   <input type="text" placeholder="Search" name="search">
  <button class="btn" type="submit">Search</button></form>
  <div class="menu">
  <a href="music.php"><button class="btn" type="button" style="border-style:inset; background-color:white">Albums</button>
  <a href="artists.php"><button class="btn" type="button">Artists</button>
  <a href="singles.php"><button class="btn" type="button">Singles</button>
</div>

<div align="right">
<a href="index.php"><button class="btn" type="button">Log Out</button></a></div>
<div align="right">
<a href="addtocart.php"><button class="btn" type="button">Cart</button></a></div>
<?php
$res=mysqli_query($con,"select * from img_display where type like 'album'");

  echo "<div class='music'>"; 
   while($row=mysqli_fetch_array($res))
   {
   echo "<div class='container'>";
   echo "<p>";?><img src="<?php echo $row["img"];?>" height="250" width="250"><?php echo "</p>"; 
  
   echo "<p>"; echo $row["name"];   echo "</p>";
   echo "<p>";?> 
    <form action="details.php" method="post">
    <input type="hidden" name="trick" value="<?php echo $row["id"];?>"> 
    <button name="detail" class="btn" type="submit">Details</button>
     </form>
   <?php echo "</p>";
   echo "</div>";
   }
echo "</div>";
?>
</body>
</html>

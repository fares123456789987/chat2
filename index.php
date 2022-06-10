<?php
$host='localhost';
$user='root';
$pass='';
$db='shay';

$conn =mysqli_connect($host,$user,$pass,$db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>chat[fares]</title>
  <link rel="stylesheet" href="style.css">

  <script>
    function aj() {
      var req = new XMLHttpRequest();
      req.onreadystatechange = function(){
        if(req.readyState==4 && req.status==200){
          document.getElementById('chat').innerHTML=req.responseText ;
        }
      }
    }



  </script>

</head>
<body>
  <div id="container">

  <div id="chatbox">
    <div id="chat"></div>
    <?php
    $q="select * from shat ";
    $run = mysqli_query($conn,$q);

    while($row = mysqli_fetch_array($run)){
      $name=$row['name'];
      $msg = $row['msg'];
      $date = $row['date'];
    
    ?>

  <div id="chatdata">
    <span style="color: gold;"><?php echo $name ?></span>
    <span>:</span>
    <span><?php echo $msg ?> </span>
    <span style="color: tomato; float: right;"><?php echo $date ?></span>


  </div>
  <?php } ?>
  </div>

    <form action="" method="post">
      <input class="in1" type="text" name="name" placeholder="enter your name">
      <textarea class="tr" name="msg" placeholder="enter your message" ></textarea>
      <button class="btn" name="submit">send</button>
    </form>

    <?php
    if(isset($_POST['submit']) ){
      $namex= $_POST['name'];
      $msgx=$_POST['msg'];
      $insert="insert into shat(name,msg) values ('$namex','$msgx')";
      $qq = mysqli_query($conn,$insert);
      header('location:index.php');
    }
    ?>


  </div>
  
</body>
</html>



<?php



?>
















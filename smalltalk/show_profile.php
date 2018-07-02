<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Friend profile</title>
        <style type="text/css">
            .detail{
            text-decoration: none;
            color: black;
        
        }
        #prof{
            float: left;
            text-align: center;
            border: 1px solid #E1E1E1;
            width:20%;
            height: 100%;
        }
        img {
    border-radius: 50%;
    width:50%;
}
        </style>
    </head>
    <?php

$name = $_POST['typeahead'];

$host = "localhost";
$user = "root";
$psw = "";
$db_name = "small_talk";

$sql = "SELECT * FROM users WHERE username = ?";

try
{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $psw);

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($name));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) == 1)
    {
        $profile_info = $result[0];
        $nameiu =$profile_info['username'];
        $phonieu= $profile_info['phonenumber'];
        $emailiu= $profile_info['email'];

        
    }

}
catch(PDOException $e)
// {
    //HandleErrors
}

?>
    <body>
        <div id="prof">
        <img src="images/photo.png" alt="Avatar"></br></br>
        <p class="detail"> Welcome:<?php echo $nameiu; ?></p>
        <p class="detail"> phone number:<?php echo $phonieu; ?></p>
        <p class="detail">Email: <?php echo $emailiu; ?> </p>
    </div>
    </body>
</html>
 -->
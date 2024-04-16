<?php require "includes/header.php";?>
<?php require "config/config.php";?>

<?php
     
    if(isset($_POST['submit'])){
        $prop_id=$_POST['prop_id'];
        $user_id=$_POST['user_id'];
        $insert = $conn->prepare("INSERT INTO favs (prop_id,user_id) VALUES (:prop_id,:user_id)");
        $insert->execute([
            ':user_id'=>$user_id,
            ':prop_id'=>$prop_id,
          ]);
    
          echo "<script>window.location.href='".APPURL."/property-details.php?id=$prop_id'</script>";
    }
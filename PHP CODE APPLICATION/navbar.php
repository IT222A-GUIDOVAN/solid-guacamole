
<h2>Navbar</h2>
<?php 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $fullname = $row['fullname'];
    $email = $row['email'];
    $address = $row['address'];
}
?>
    <a href="home.php">Home</a>
    <a href="profile.php">Profile</a>

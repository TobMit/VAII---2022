<html>
<body>
>cd fhvvrfrgefrrefčreffrtrtčfgf
toto je len test
<?php
$i = 0;
while ( $i <= 10){
    echo "<p> $i </p>";
    $i++;
}
?>

<h1>Toto je php do sql</h1>
<?php
$servername = "localhost:3306";
$username = "db_user";
$password = "db_user_pass";
$dbname = "dbtable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT test1, test2, FROM test";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Test1 " . $row["test1"]. " - Test2: " . $row["Test2"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>



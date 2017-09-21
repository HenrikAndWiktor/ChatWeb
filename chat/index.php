<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>
<table width="100%" border="1">
    <thead><tr><td><b>Meddelande</b></td><td><b>Namn</b></td></tr></thead>
    <?php
    function unixtime($days = 30) {
        return time()+60*60*24*$days;
    }
    $conn = new mysqli("127.0.0.1","root",null,"CHATDB");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        setcookie("username",$_POST["name"],unixtime());
        echo "Test acquired.";
        $conn->query("INSERT INTO chattable (name, msg) VALUES (\"" . $_POST["name"] . "\", \"" . $_POST["msg"] . "\");");
        $conn->query("COMMIT;");
    $mysql_table_res=$conn->query("SELECT * FROM chattable;");
    while(($row=$mysql_table_res->fetch_assoc())!==null) {
        echo "<tr><td>" . $row["msg"] . "</td><td>" . $row["username"] . "</td></tr>";
    }
    ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="http://wiktoreriksson.se/ChatWeb/chat/index.php" method="POST">
    Namn:<input type="text" name="name" value='<?php echo $_COOKIE["username"];?>'>
    <label for="text-label">Medd:</label><textarea name="msg" id="text-label" cols="200" rows="10"></textarea>
    <input type="submit">
</form>
</body>
</html>
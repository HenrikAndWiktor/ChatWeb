<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>
<table width="100%">
    <thead><tr><td><b>Meddelande</b></td><td><b>Namn</b></td></tr></thead>
    <?php
    $conn = new mysqli("127.0.0.1","root",htmlspecialchars_decode("&#72;&#101;&#110;&#114;&#105;&#107;&#49;&#49;"));
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST["msg"])&&isset($_POST["name"])) {
        $conn->query("INSERT INTO CHATDB.chattable (username,msg) VALUES (" . $_POST["name"] . "," . $_POST["msg"] . ");");
    }
    $mysql_table_res=$conn->query("SELECT * FROM CHATDB.chattable;");
    while($row=$mysql_table_res->fetch_assoc()) {
        echo "<tr><td>" . $row["msg"] . "</td><td>" . $row["username"] . "</td></tr>";
    }
    ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label><input type="text" name="name" value=""></label>
    <label><textarea name="msg" cols="200" rows="10"></textarea></label>
    <input type="submit">
</form>
</body>
</html>
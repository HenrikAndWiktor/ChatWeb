<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
</head>
<body>
<form action="http://wiktoreriksson.se/ChatWeb/chat/index.php" method="POST">
    Namn:<input type="text" name="name" value='<?php echo $_COOKIE["username"];?>'>
    <label for="text-label">Medd:</label><textarea name="msg" id="text-label" cols="200" rows="10"></textarea>
    <input type="submit">
</form>
</body>
</html>
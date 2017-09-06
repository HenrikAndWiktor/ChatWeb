<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>
<script>
    function createCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name,"",-1);
    }
    if (readCookie("username")==null) createCookie("username",prompt("Skriv ditt namn"),360);
</script>
<table>
    <?php
    if(isset($_POST["msg"])&&isset($_POST["name"])) {
        file_put_contents("name.log",$_POST["name"]."\n");
        file_put_contents("msg.log",$_POST["msg"]."\n");
    }
    $logarr=explode("\n", file_get_contents("msg.log"));
    $narr=explode("\n",file_get_contents("name.log"));
    for ($i=0;$i=count($logarr)-1;++$i) {
        echo "<tr><td>Namn:" . $narr[$i] . "</td><td>Meddelande:" . $logarr[$i] . "</td></tr>";
    }
    ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="hidden" name="name" value="<?php echo $_COOKIE["username"] ?>">
    <textarea name="msg"></textarea>
</form>
</body>
</html>
<?php

include "db.php";
//include threads

$threads = $connect->query("SELECT * FROM threads");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php while ( $data = $threads->fetch_object() ): ?>
       <div style="color:red;padding:10px;">
       <a href="threads.php?post_id=<?= $data->id ?>">
            [<?= $data->id ?>]<?= $data->content ?>
        </a>
       </div>
    <?php endwhile ?>
</body>
</html>
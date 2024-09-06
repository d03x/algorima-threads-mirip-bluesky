<?php 

include "db.php";
include "functions/threads.php";
$id = $_GET['post_id'];

$replays = getReplays($connect,$id);
$thread = $connect->query("SELECT * FROM threads WHERE id='$id'")->fetch_object();
$parents = array_reverse(flattenArray(getParents($connect,$thread->id)));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($parents as $parent): if($parent['id']===$thread->id) continue ?>
        <div style="margin-left: 10px;">
            <a href="threads.php?post_id=<?=$parent['id']?>">
            <?= $parent['author'] ?> ->
            <?= $parent['content'] ?>
        </a>
        </div>
        <?php endforeach ?>

    <b>
        <?= $thread->content ?>
    </b>
    <?php foreach($replays  as $replay): ?>
        <div style="margin-left: 10px;">
            <a href="threads.php?post_id=<?=$replay['id']?>">
            <?= $replay['author'] ?> ->
            <?= $replay['content'] ?>
        </a>
        </div>
        <?php endforeach ?>
</body>
</html>

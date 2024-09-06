<?php
function getReplays($konek, $parent_id) {
    $query = $konek->query("SELECT * FROM threads where replay_to_id='$parent_id'");
    $replays = [];
    while ( $data = $query->fetch_assoc() ) {
        $data['replays'] = getReplays($konek,$data['id']);
        $replays[] = $data;
    }
    return $replays;
}
function flattenArray($array) {
    $flat = [];
    foreach($array as $arr) {
        $parents = $arr['parents'];
        unset($arr['parents']);
        $flat[] = $arr;
        if(!empty($parents)) {
            $flat = array_merge($flat,flattenArray($parents));
        }
    }
    return $flat;
}
function getParents($konek, $parent_id) {
    $queryParent=$konek->query("SELECT * FROM threads WHERE id='$parent_id'");
    $parents = [];

    while($parent  = $queryParent->fetch_assoc()) {
        $parent['parents'] = getParents($konek, $parent['replay_to_id']);
        $parents[] = $parent;
    }
    return $parents;
}
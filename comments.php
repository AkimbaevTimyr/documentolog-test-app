<?php

function buildTree(array $comments): array
{
    $commentMap = [];
    foreach ($comments as $comment) {
        $commentMap[$comment['id']] = $comment + ['children' => []];
        if ($comment['parentId'] != $comment['id']) {
            $commentMap[$comment['parentId']]['children'][] = &$commentMap[$comment['id']];
        }
    }
    return $commentMap;
}


function printComment(array $comment, int $level = 0): void
{
    echo "<li style='margin-left:" . 40 * $level . "px'>" . $comment['comment']. "</li>";
    foreach ($comment['children'] as $child) {
        printComment($child, $level + 1);
    }
}


function printTree($commentTree): void
{
    foreach ($commentTree as $comment) {
        if ($comment['parentId'] == $comment['id']) {
            printComment($comment);
        }
    }
}

$comments = [
    ['id' => 1, 'parentId' => 1, 'comment' => "Comment 1"],
    ['id' => 2, 'parentId' => 1, 'comment' => "Comment 2"],
    ['id' => 3, 'parentId' => 2, 'comment' => "Comment 3"],
    ['id' => 4, 'parentId' => 1, 'comment' => "Comment 4"],
    ['id' => 5, 'parentId' => 2, 'comment' => "Comment 5"],
    ['id' => 6, 'parentId' => 3, 'comment' => "Comment 6"],
    ['id' => 7, 'parentId' => 7, 'comment' => "Comment 7"],
];

$commentTree = buildTree($comments);
printTree($commentTree);

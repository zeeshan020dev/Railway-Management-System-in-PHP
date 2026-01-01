<?php
// admin/delete_train.php
require '../connect.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) { header('Location: trains.php'); exit; }

// fetch image name to remove file
$row = $pdo->prepare("SELECT image FROM trains WHERE id = :id");
$row->execute([':id'=>$id]);
$img = $row->fetchColumn();

$pdo->prepare("DELETE FROM trains WHERE id = :id")->execute([':id'=>$id]);

if ($img) {
    $f = __DIR__ . '/../uploads/' . $img;
    if (file_exists($f)) @unlink($f);
}

header('Location: trains.php?deleted=1');
exit;

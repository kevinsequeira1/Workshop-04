<?php
include('functions.php');

$id = $_GET['id'];
if($id) {
  $student = getStudent($id);
  if($student) {
    $deleted = deleteStudent($id);
    if($deleted) {
      header('Location: /?status=success');
    } else {
      header('Location: /?status=error');
    }
  } else {
    header('Location: /?status=error');
  }
} else {
  header('Location: /index.php');
}
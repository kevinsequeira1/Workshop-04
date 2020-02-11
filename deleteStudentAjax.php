<?php
include('functions.php');

$id = $_GET['id'];
if($id) {
  $student = getStudent($id);
  if($student) {
    $deleted = deleteStudent($id);
    if($deleted) {
      echo json_encode($student);
    } else {
      echo json_encode("There was an error deleting the student");
    }
  } else {
    echo json_encode("The student with te id $id doesn't exist");
  }
} else {
  echo json_encode("You must provide an id");
}
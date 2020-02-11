<?php
/**
 *  Gets a new mysql connection
 */
function getConnection() {
  $connection = new mysqli('localhost:3306', 'root', 'root1234', 'php_web2');
  if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $connection->connect_error);
    die;
  }
  return $connection;
}

/**
 * Inserts a new student to the database
 *
 * @student An associative array with the student information
 */
function saveStudent($student) {
  $conn = getConnection();
  $sql = "INSERT INTO students( `full_name`, `email`, `document`)
          VALUES ('{$student['full_name']}', '{$student['email']}', '')";
  $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}

/**
 * Updates an existing student to the database
 *
 * @student An associative array with the student information
 */
function updateStudent($student) {
  $conn = getConnection();
  $sql = "UPDATE students set `full_name` = '{$student['full_name']}' , `email` = '{$student['email']}',
    `profilePic` = '{$student['profilePic']}' WHERE `id` = {$student['id']}";

  $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}


/**
 * Get all students from the database
 *
 */
function getStudents(){
  $conn = getConnection();
  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function getStudent($id){
  $conn = getConnection();
  $sql = "SELECT * FROM students WHERE id = $id";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result->fetch_array();
}

/**
 * Deletes an student from the database
 */
function deleteStudent($id){
  $conn = getConnection();
  $sql = "DELETE FROM students WHERE id = $id";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}

/**
 * Uploads an image to the server
 *
 * @inputName name of the input that holds the image in the request
 */
function uploadPicture($inputName){
  $fileObject = $_FILES[$inputName];

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($fileObject["name"]);
  $uploadOk = 0;
  if (move_uploaded_file($fileObject["tmp_name"], $target_file)) {
    return $target_file;
  } else {
    return false;
  }
}
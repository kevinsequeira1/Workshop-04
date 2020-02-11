<?php
  include('functions.php');

  if($_REQUEST['id']) {
    $student = getStudent($_REQUEST['id']);
  }

  // if editing
  if($_POST){
    if ($filename = uploadPicture('picture')){
      //now that we upload we can save the student
      $student['profilePic'] = $filename;
      $student['full_name'] = $_POST['full_name'];
      $student['email'] = $_POST['email'];
      updateStudent($student);
    } else {
      echo "There was an error saving the picture";
    }
  }


  // else {
  //   // header('Location: /crud/?status=error');
  // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>
<div class="container">
    <div class="msg">
      <?php echo $message; ?>
    </div>
    <h1>Edit Student</h1>
    <form method="POST" class="form-inline" role="form" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $student['id']?>">
      <div class="form-group">
        <label class="sr-only" for="">Full Name</label>
        <input type="text" class="form-control" id="" name="full_name" placeholder="Full Name" value="<?php echo $student['full_name'] ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email" value="<?php echo $student['email'] ?>">
      </div>
      <input type="file" name="picture" id="picture">
      <img src="<?php echo $student['profilePic']?>"></img>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</body>
</html>
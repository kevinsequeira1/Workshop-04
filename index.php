<?php
  require('functions.php');

  $message = "";
  if(!empty($_REQUEST['status'])) {
    switch($_REQUEST['status']) {
      case 'success':
        $message = 'User was added succesfully';
      break;
      case 'error':
        $message = 'There was a problem inserting the user';
      break;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="assets/js/actions.js"></script>
  <title>Document</title>
</head>
<body>
<div class="container">
    <div class="msg" id="msg">
      <?php echo $message; ?>
    </div>
    <h1>Create Students</h1>
    <form action="/crud/createStudent.php" onsubmit="return validateStudentForm();" method="POST" class="form-inline" role="form">
      <div class="form-group">
        <label class="sr-only" for="">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email">
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <table class="table table-light">
      <tbody>
        <tr>
          <td>Id</td>
          <td>Full Name</td>
          <td>Email</td>
          <td>Actions</td>
        </tr>
        <?php
          $students = getStudents();
          $studentsHtml = "";
          foreach ($students as $student) {
            $studentsHtml .= "<tr id='student_{$student['id']}'><td>{$student['id']}</td><td>{$student['full_name']}</td><td>{$student['email']}</td><td> <a href='editStudent?id={$student['id']}'>Edit</a>| <a href='#' class='btn btn-primary' onclick='deleteStudent({$student['id']})'>Delete</a></td></tr>";
          }
          echo $studentsHtml;
        ?>
      </tbody>
    </table>
</div>

</body>
</html>


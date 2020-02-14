<?php
  include('functions.php');

  if(isset($_POST['full_name']) && isset($_POST['email']) ) {
    $saved = saveStudent($_POST);

    if($saved) {
      header('Location: /Workshop-04/?status=success');
    } else {
      header('Location: /Workshop-04/?status=error');
    }
  } else {
    header('Location: /Workshop-04/?status=error');
  }
  ?>



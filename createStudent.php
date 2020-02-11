<?php
  include('functions.php');

  if(isset($_POST['full_name']) && isset($_POST['email']) ) {
    $saved = saveStudent($_POST);

    if($saved) {
      header('Location: /crud/?status=success');
    } else {
      header('Location: /crud/?status=error');
    }
  } else {
    header('Location: /crud/?status=error');
  }

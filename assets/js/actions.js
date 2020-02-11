/**
 * Deletes an student using Ajax
 *
 * @param {*} id of the student to delete
 */
function deleteStudent(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var student = JSON.parse(this.responseText);
      document.getElementById('student_' + student.id).remove();
    }
  };
  xhttp.open("GET", "/deleteStudentAjax.php?id=" + id, true);
  xhttp.send();
}


function validateStudentForm() {
  debugger;
  if (document.getElementById('full_name').value != '') {
    return true;
  } else {
    alert('Invalid user form ');
    return false;
  }
}
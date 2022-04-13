<?php 
include 'includes/header.php';
?>

<?php
$name=$email=$feedb='';
$nameErr=$emailErr=$feedbErr='';
//submit form to db
if(isset($_POST['submit'])){
  //validate name
  if(empty($_POST['name'])){
    $nameErr='name is required';
  }else {
    $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  //validate email
  if(empty($_POST['email'])){
    $emailErr='email is required';
  }else {
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
  }
    //validate feedb
    if(empty($_POST['feedb'])){
      $feedbErr='your feedback is required';
    }else {
      $feedb = filter_input(INPUT_POST,'feedb', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

  if(empty($nameErr) && empty($emailErr) && empty($feedbErr)
  ){
    //add to db into our feedback table
    $sql= "INSERT INTO feedback (name,email,feedb) VALUES ('$name','$email','$feedb')";
    if(mysqli_query($connect,$sql)){
      //sucess then re-direct to page
      header('Location: feedback.php');
    } else {
      //Error
      echo 'Error: '.mysqli_error($connect);
    }
  };
}
//testing values of form feilds
// echo $_POST['name'].'<br>';
// echo $_POST['email'].'<br>';
// echo $_POST['feedb'].'<br>';

?>
    <img src="/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for our Social Media</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control 
        <?php echo $nameErr ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid': null; ?> " id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="feedb" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $feedbErr ? 'is-invalid' : null; ?>" id="body" name="feedb" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback">
          <?php echo $feedbErr;?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>

<?php 
include 'includes/footer.php';
?>

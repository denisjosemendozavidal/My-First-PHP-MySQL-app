<?php include './includes/header.php'; ?>

<?php 
$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = '';

// From Validation

if (isset($_POST['submit'])) {
  // Check name
  if (empty($_POST['name'])) {
    $nameErr = 'Please enter your name';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // Check email
  if (empty($_POST['email'])) {
    $emailErr = 'Please enter your email';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = 'Please enter a valid email';
    }
  }


  // Check body
  if (empty($_POST['body'])) {
    $bodyErr = 'Please enter your comment';
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // Check if there are no errors
  if (!empty($name) && !empty($email) && !empty($body)) {
    // Connect to database
    require './config/database.php';

    // Insert into database
    $sql = "INSERT INTO firstphp (name, email, body) VALUES ('$name', '$email', '$body')";
    $result = mysqli_query($connection, $sql);

    // Check if inserted
    if ($result) {
      // Redirect to feedback.php
      header('Location: feedback.php');
    } else {
      echo 'Error: ' . mysqli_error($connection);
    }
  }

}


?>
   
   <img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Leave a comment</h2>
    <p class="lead text-center">Try it.!</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Who are you? or why are you? or how are you? kidding, need your name please.!">
        <div class="invalid-feedback"><?php echo $nameErr;?> </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Not going to spam you, I promise.!">
        <div class="invalid-feedback"><?php echo $emailErr;?> </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Comment</label>
        <textarea class="form-control <?php echo $bodyErr ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Write something positive for others to read.!"></textarea>
        <div class="invalid-feedback"><?php echo $bodyErr;?> </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>

<?php include './includes/footer.php'; ?>
   

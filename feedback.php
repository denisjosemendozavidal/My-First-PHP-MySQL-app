<?php include './includes/header.php'; ?>


<?php 

$sql = "SELECT * FROM firstphp";
$result = mysqli_query($connection, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
   
    <h2>All the comments.</h2>

    <?php if(empty($comments)) : ?>
      <p class="lead mt3">No comments</p>
    <?php endif; ?>

    <?php foreach($comments as $comment) : ?>
      <div class="card my-3">
        <div class="card-body">
          <h5 class="card-title">By: <?php echo $comment['name']; ?> on <?php echo $comment['date'];?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['email']; ?></h6>
          <p class="card-text"><?php echo $comment['body']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>

    
 
<?php include './includes/footer.php';?>
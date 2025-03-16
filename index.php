<?php 
    include 'includes/header.php';
    include 'includes/footer.php';

    require_once 'Classes/Dbh.php';
    require_once 'Classes/Files.php';

    $file = new Files();

   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
      $file = new Files($_FILES['file']);
      $file->uploadImage();
   }

 ?>

    <h1>Index page</h1>

    <?php if (isset($_SESSION['username'])) { ?>

      <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
         <input type="file" name="file">
         <input type="submit" value="Upload Image">
      </form>

      <p><?php echo 'You are logged in as: ' . $_SESSION['username']; ?></p>

      <p><img src="uploads/<?php echo $file->loadImage() ?>" width="200px"></p>
      
    <?php } ?>

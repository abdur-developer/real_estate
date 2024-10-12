<?php require 'include/home.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'include/head.php'; ?>

<body class="index-page">
<?php
  if(isset($_REQUEST['error'])){
      $error = $_REQUEST['error'];
      echo "
      <script>
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '$error'
              });
      </script>
      ";
  }
  if(isset($_REQUEST['success'])){
      $success = $_REQUEST['success'];
      echo "
      <script>
          Swal.fire({
              icon: 'success',
              title: 'WOW...',
              text: '$success'
              });
      </script>
      ";
  }
?>

<?php 
  require 'include/header.php';
  
  if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
    switch($q){
      case 'home':
        require 'home/index.php';
        break;
      case 'contact':
        require 'page/contact.php';
        break;
      case 'about':
        require 'page/about.php';
        break;
      case 'projects':
        require 'page/projects.php';
        break;
      case 'services':
        require 'page/services.php';
        break;
      case 'view-service':
        require 'page/view-service.php';
        break;
      case 'view-property':
        require 'page/view-property.php';
        break;
      case 'dashboard':
        require 'home/index.php';
        break;
      case 'document':
        require 'page/document.php';
        break;
      
      default:
        require 'page/main.php';
    }





  }else require 'page/main.php';

  require 'include/footer.php';
?>



</body>
</html>
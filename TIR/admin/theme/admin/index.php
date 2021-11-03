<?php include '../../assets/hlavicka.php' ?>
<div class="d-flex justify-content-center">
<h1>Administrácia</h1>
</div>
<?php

if(empty($_SESSION)){

echo '<div class="form-group d-flex justify-content-center mt-5">
    <form action="login.php" method="post">
      <p class="form-group">
        <input type="text" id="login" class="form-control" name="name" placeholder="Meno">
      </p>
      <p class="form-group">
        <input type="password" id="password" class="form-control" name="password" placeholder="Heslo">
      </p>
      <p class="form-group">
        <input type="submit" class="btn-sm btn-primary" value="Log In">
      </p>
      
    </form>
</div>';
}else{
  header('Location: ../domov');
}

?>
<?php include '../../assets/paticka.php' ?>
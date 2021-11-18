<?php include '../../assets/hlavicka.php' ?>
<?php
  if (isset($_SESSION['user'])){
      header('Location: ../domov');
  }else if(isset($_POST['login'])){
    $login = login($_POST['username'], $_POST['password']);
    if($login === true){
      header('Location: ../domov');
    }else{
      flashmessage($login);
      header('Location:index.php');
    }
  }else if(isset($_POST['register'])){
    $login = register($_POST['username'], $_POST['name'], $_POST['password'], $_POST['password_verify']);
    if($login === true){
      header('Location: ../domov');
    }else{
      flashmessage($login);
      header('Location:index.php');
    }
  }
?>
<div class="d-flex justify-content-center">
<h1>Administrácia</h1>
</div>

  
<div class="form-group d-flex justify-content-center mt-5">
  <form action="index.php" method="post">
    <p class="form-group">
      <input type="text" id="login" class="form-control" name="username" placeholder="Uzivatelske meno" required>
    </p>
    <p class="form-group">
      <input type="password" id="password" class="form-control" name="password" placeholder="Heslo" required>
    </p>
    <p class="form-group">
      <input type="submit" class="btn-sm btn-primary" value="Login" name="login">
    </p>
  </form>
  <button onclick="hideElement('register')">register</button>
  <form action="index.php" method="post" id="register">
    <p class="form-group">
      <input type="text" id="login" class="form-control" name="username" placeholder="Uzivatelske meno" required>
    </p>
    <p class="form-group">
      <input type="text" id="name" class="form-control" name="name" placeholder="Meno" required>
    </p>
    <p class="form-group">
      <input type="password" id="password" class="form-control" name="password" placeholder="Heslo" required>
    </p>
    <p class="form-group">
      <input type="password" id="password_verify" class="form-control" name="password_verify" placeholder="Overovacie heslo" required>
    </p>
    <p class="form-group">
      <input type="submit" class="btn-sm btn-primary" value="Register" name="register">
    </p>
  </form>
</div>

<?php include '../../assets/paticka.php' ?>
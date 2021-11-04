<?php include '../../assets/hlavicka.php' ?>
<?php
  if (isset($_SESSION['user'])){
      header('Location: ../domov');
  }
  if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  }
?>
<div class="d-flex justify-content-center">
<h1>Administrácia</h1>
</div>

  
<div class="form-group d-flex justify-content-center mt-5">
    <form action="<?php if(isset($_GET['register'])){echo 'register.php';}else{echo 'login.php';}?>" method="post">
      <p class="form-group">
        <input type="text" id="login" class="form-control" name="username" placeholder="Uzivatelske meno" value="<?php if(isset($_GET['login'])){echo $_GET['login'];}?>" required>
      </p>
      <?php if(isset($_GET['register'])){
        if(isset($_GET['name'])){
          $nameValue = $_GET['name'];
        }else{
          $nameValue = "";
        }
        echo '<p class="form-group">
                <input type="text" id="name" class="form-control" name="name" placeholder="Meno" value="'.$nameValue.'" required>
              </p>';
      }?>
      <p class="form-group">
        <input type="password" id="password" class="form-control" name="password" placeholder="Heslo" required>
      </p>
      <?php if(isset($_GET['register'])){
        echo '<p class="form-group">
                <input type="password" id="password_verify" class="form-control" name="password_verify" placeholder="Overovacie heslo" required>
              </p>';
      }?>
      <p class="form-group">
        <input type="submit" class="btn-sm btn-primary" value="Log In">
      </p>
      
    </form>
</div>

<?php include '../../assets/paticka.php' ?>
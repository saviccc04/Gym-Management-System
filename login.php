<?php
  require_once 'init.php';
  require_once base_path("classes/Admin.php");
  include base_path('partials/header.php');

  if(isset($_SESSION['logged_in'])) {
    redirect('admin.php');
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin = new Admin;
    
    if($admin->login($username, $password)) {
      redirect('admin.php');       
    } else {
      $error = 'Invalid username or password';
    }
  }
?>

    <div
      class="container vh-100 d-flex align-items-center justify-content-center"
    >
      <form action="" class="w-25" method="post">
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Username:</label>
          <input class="form-control" type="text" name="username" required />
        </div>

        <div class="mb-3 mt-3">
          <label for="password" class="form-label">Password:</label>
          <input
            class="form-control"
            type="password"
            name="password"
            required
          />
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>

<?php
  include base_path('partials/footer.php');
?>
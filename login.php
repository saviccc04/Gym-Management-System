<?php
  require_once 'classes/Database.php';

  $db = new Database();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
  </head>
  <body>
    <div
      class="container vh-100 d-flex align-items-center justify-content-center"
    >
      <form action="" class="w-25">
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
  </body>
</html>

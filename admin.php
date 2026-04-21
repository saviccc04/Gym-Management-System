<?php 
  require_once 'init.php';
  include base_path("partials/admin/header.php");

  if(!isset($_SESSION['logged_in'])) {
    redirect('login.php');
  }

  $member = new Member();
  $trainer = new Trainer();

  $members = $member->getAll();
  $trainers = $trainer->getAll();

  if(isPostRequest()) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $image = $_POST['image'];

  }
?>
    <form class="container-fluid" method="post" action="logout.php" style="position: relative;">
      <button type="submit" class="btn btn-secondary" style="position: absolute; right: 0; bottom: 0;">Logout</button>
    </form>

    <div class="container">
      <h2 class="h2 mb-4 mt-5">Members List</h2>

      <button type="submit" class="btn btn-success mb-2">Export</button>
      <table
        class="w-100 table-borderless"
        style="border-collapse: separate; border-spacing: 0 10px"
      >
        <thead>
          <tr class="shadow-sm bg-white rounded">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Trainer</th>
            <th>Photo</th>
            <th>Training Plan</th>
            <th>Access Card</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php if(isset($members)): ?>
            <?php foreach($members as $row): ?>
              <tr class="mb-5">
                <td><?php echo $row->first_name; ?></td>
                <td><?php echo $row->last_name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone_number; ?></td>
                <td><?php echo $row->trainer_id; ?></td>
                <td>
                  <img
                    style="width: 50px"
                    class="img-fluid img-thumbnail"
                    src="uploads/Screenshot (35).png"
                    alt="Person Photo"
                  />
                </td>
                <td>30 Sessions Plan</td>
                <td><a href="#">Access Card</a></td>
                <td><?php echo $row->created_at; ?></td>
                <td><button class="btn btn-danger p-1">Delete</button></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

      <h2 class="h2 mb-4 mt-5">Trainers List</h2>

      <button type="submit" class="btn btn-success mb-2">Export</button>
      <table
        class="w-100 table-borderless"
        style="border-collapse: separate; border-spacing: 0 10px"
      >
        <thead>
          <tr class="shadow-sm bg-white rounded">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Created At</th>
          </tr>
        </thead>

        <tbody>
          <?php if(isset($trainers)): ?>
            <?php foreach($trainers as $row): ?>
              <tr class="mb-5">
                <td><?php echo $row->first_name; ?></td>
                <td><?php echo $row->last_name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone_number; ?></td>
                <td><?php echo $row->created_at; ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6">
          <h2>Register Member</h2>

          <form action="">
            <div class="mb-3 mt-3">
              <label class="form-label" for="first_name">First Name</label>
              <input class="form-control" type="text" name="first_name" id="" />
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name">Last Name</label>
              <input
                class="form-control"
                type="text"
                name="last_name"
                id=""
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input
                class="form-control"
                type="email"
                name="email"
                id=""
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="phone_number">Phone Number</label>
              <input
                class="form-control"
                type="text"
                name="phone_number"
                id=""
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="training_plan"
                >Training Plan</label
              >
              <select class="form-select" name="training_plan" id="" required>
                <option value="12 sessions plan">12 Sessions Plan</option>
                <option value="30 sessions plan">30 Sessions Plan</option>
              </select>
            </div>

            <div class="mb-3">
              <input
                class="form-control"
                type="file"
                name="image"
                id=""
                required
              />
            </div>

            <button class="btn btn-primary">Register</button>
          </form>
        </div>

        <div class="col-lg-6">
          <h2>Register Trainer</h2>

          <form action="">
            <div class="mb-3 mt-3">
              <label class="form-label" for="first_name_trainer"
                >First Name</label
              >
              <input
                class="form-control"
                type="text"
                name="first_name_trainer"
                id=""
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name_trainer"
                >Last Name</label
              >
              <input
                class="form-control"
                type="text"
                name="last_name_trainer"
                id=""
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="email_trainer">Email</label>
              <input
                class="form-control"
                type="email"
                name="email_trainer"
                id=""
                required
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="phone_number_trainer"
                >Phone Number</label
              >
              <input
                class="form-control"
                type="text"
                name="phone_number_trainer"
                id=""
                required
              />
            </div>

            <button class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="col-6">
        <h2>Assing Trainer To Member</h2>

        <form action="">
          <div class="mb-3 mt-3">
            <label class="form-label" for="select_memebr">Select Member</label>
            <select class="form-select" name="select_memebr" id="">
              <option value="1">Nikola Savic</option>
            </select>
          </div>

          <div class="mb-3 mt-3">
            <label class="form-label" for="select_trainer"
              >Select Trainer</label
            >
            <select class="form-select" name="select_trainer" id="">
              <option value="1">Djuka Djkuic</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Assing Trainer</button>
        </form>
      </div>
    </div>

<?php 
  include base_path("partials/admin/footer.php");
?>

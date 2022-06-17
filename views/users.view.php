<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./views/assets/css/dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard</title> 
</head>
<body class="dark">
  
</body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="./views/assets/img/<?php echo $_SESSION['userimage'] ?>" alt="userpic">
            </span>

            <div class="text logo-text">
                <span class="name"><?php echo $_SESSION['username'] ?></span>
                <span class="profession"><?php echo $_SESSION['userrole'] ?></span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="./dashboard">
                        <i class='bx bx-home-alt icon' ></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="./revenue">
                        <i class='bx bx-bar-chart-alt-2 icon' ></i>
                        <span class="text nav-text">Revenue</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="./projects">
                      <i class='bx bxs-briefcase-alt-2 icon'></i>
                        <span class="text nav-text">Projects</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="./notes">
                      <i class='bx bx-note icon' ></i>
                        <span class="text nav-text">Notes</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="./users">
                      <i class='bx bxs-user icon'></i>
                        <span class="text nav-text">Users</span>
                    </a>
                </li>

                <li class="nav-link">
                  <a href="./code">
                      <i class='bx bx-code-alt icon' ></i>
                      <span class="text nav-text">Snippets</span>
                  </a>
              </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </div>
    </div>

  </nav>

    <section class="home">
        <div class="text top-buttn">
            <span>Users</span>
            <button type="button" class="btn btn-dark border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD a Code</button>
        </div>
        <div class="container-fluid ps-5 pe-5">
            <div class="border-purple pt2">
                <h2 class="white">login codes</h2>
                <div class="pt-5" style="overflow: auto;">
                    <table class="table table-dark table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Code</th>
                          <th scope="col">User type</th>
                          <th scope="col">action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($data['invitecodes'] as $invitecode) {
                            echo "<tr>";
                            echo "<td>".$invitecode['invite']."</td>";
                            echo "<td>".$invitecode['usertype']."</td>";
                            echo "<td><a href='users/delete-invite/".$invitecode['inviteid']."'><i class='bx bx-trash-alt'></i></a></td>";
                            echo "</tr>";
                          }
                            ?>
                      <tbody>
                    </table>
                </div>
            </div>
            <div class="pt2" style="overflow: auto;">
                <h2 class="white pb-5">Users</h2>
                <table class="table table-dark table-hover ">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Full name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Date of Creation</th>
                      <th scope="col">Role</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($data['users'] as $user) {
                          echo '
                          <tr>
                            <th scope="row">'.$user['userid'].'</th>
                            <td>'.$user['FullName'].'</td>
                            <td>'.$user['email'].'</td>
                            <td>'.$user['signup'].'</td>
                            <td>'.$user['roll'].'</td>
                            <td><a href="users/delete/'.$user['userid'].'"> <i class="bx bx-trash" ></i></a></td>
                          </tr>
                          ';
                      }
                    ?>
                  <tbody>
                </table>
            </div>
        </div>
    </section>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h5 class="white" id="exampleModalLabel">Add a Code</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" class="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">User type</label>
                        <select name="type" class="form-select bg-dark white" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            <option value="user">user</option>
                            <option value="superadmin">superadmin</option>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label name="code" for="exampleInputEmail1" class="form-label white">code</label>
                        <input name="code" type="text" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="invite code">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    <script src="./views/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
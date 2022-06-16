<!DOCTYPE html>
<html lang="en">
<head>
    <?php var_dump($data['users']) ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../views/assets/css/dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard</title> 
</head>
<body class="dark">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Imrane Chaibi</span>
                    <span class="profession">Webb developer</span>
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
                        <a href="dashboard.html">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="revenue.html">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="projects.html">
                          <i class='bx bxs-briefcase-alt-2 icon'></i>
                            <span class="text nav-text">Projects</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                          <i class='bx bx-note icon' ></i>
                            <span class="text nav-text">Notes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="users.html">
                          <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="wallet.html">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallet</span>
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
            <span><?php echo $data['0']['name'] ?></span>
            <button type="button" class="btn btn-dark border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Create task </button>
        </div>
        <div class="container-fluid pT3">
          <div class="Description white border-purple pt2">
          <?php echo $data['0']['discription'] ?>
          </div>

          <div class="Description white border-purple pt2">
            <h2 style="text-align: center;"> task </h2>
            <div style="overflow: auto;">
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Task title</th>
                      <th scope="col">Explanation</th>
                      <th scope="col">Status</th>
                      
                      <th scope="col">Assignee</th>
                      <th scope="col">Creation date</th>
                      <th scope="col">Deadline</th>
                      <th scope="col">actions</th>
                      <th scope="col">finish task</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php 
                        // printing the tasks
                        foreach ($data['tasks'] as $task) {
                          echo "<tr>";
                          echo "<td>".$task['taskid']."</td>";
                          echo "<td>".$task['taskname']."</td>";
                          echo "<td>".$task['explanation']."</td>";
                          echo "<td>".$task['Status']."</td>";
                          echo "<td>".$task['FullName']."</td>";
                          echo "<td>".$task['startdate']."</td>";
                          echo "<td>".$task['enddate']."</td>";
                          echo '<td> <a href=""><i class="bx bx-pencil"></i></a> <a href=""><i class="bx bx-trash" ></i></a> </td>';
                          echo '<td><form action="">
                                    <input hidden name="checkbox" value="'.$task['taskid'].'">
                                    <a class="" type="submit" name="done"><i class="bx bx-check"></i></a>
                                </form></td>';
                          echo "</tr>";
                        }
                      ?>
                      
                    </tr>
                  <tbody>
                </table>
            </div>
        </div>
        </div>
    </section>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="white" id="exampleModalLabel">ADD PROJECT</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" class="">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label white">Task Name</label>
                  <input type="text" class="form-control bg-dark" name="taskname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Task name...">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label white">Explanation</label>
                  <input type="text" name="explanation" class="form-control bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label white">status</label>
                    <select class="form-select bg-dark white" name="status" aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <option value="To do">To do</option>
                        <option value="Doing">Doing</option>
                        <option value="Done">Done</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label white">Asigned to</label>
                    <select class="form-select bg-dark white" name="asignedto" aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <?php 
                          foreach ($data['users'] as $user) {
                            echo "<option value='".$user['id']."'>".$user['FullName']."</option>";
                          }
                        ?>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label white">Date of start</label>
                    <input type="date" name="startdate" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label white">Date of end</label>
                    <input type="date" name="enddate" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                  </div>
                  <input type="text" name="project" hidden value=<?php echo $data['0']['projectid']; ?>>
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
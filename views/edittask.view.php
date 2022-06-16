<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../views/assets/css/dashboard.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body class="dark">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../views/assets/img/unknown.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Imrane Chaibi</span>
                    <span class="profession">Web developer</span>
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
            <span>Task Name</span>
        </div>
        <div class="container-fluid pT3">
            <div class="task">
                <form method="POST" class="">
                    <div class="mb-3">
                        <input type="text" hidden value=<?php $task = $data['onetask'][0];  echo $task['taskid'] ?>>
                      <label for="exampleInputEmail1" class="form-label white">Task Name</label>
                      <input type="text" class="form-control white bg-dark" id="exampleInputEmail1" value="<?php echo $task['taskname']; ?>" aria-describedby="emailHelp" placeholder="Task name...">
                    </div>
                    <?php
  
                    ?>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label white">Explanation</label>
                      <input type="text" class="form-control white bg-dark" value="<?php echo $task['explanation']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">status</label>
                        <select class="form-select bg-dark white" aria-label="Default select example">
                            <?php echo '<option selected value="'.$task['Status'].'">'.$task['Status'].'</option>'; ?>
                            <option value="To do">To do</option>
                            <option value="Doing">Doing</option>
                            <option value="Done">Done</option>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Asigned to</label>
                        <select class="form-select bg-dark white" aria-label="Default select example">
                        <?php
                                echo '<option selected value='.$task['userid'].' >'.$task['FullName'].'</option>';
                                foreach ($data['users'] as $user) {
                                echo "<option value='".$user['userid']."'>".$user['FullName']."</option>";
                                }
                            ?>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Date of start</label>
                        <input type="date" value="<?php $newDate = date("Y-m-d", strtotime($task['startdate'])); echo $newDate; ?>" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Date of end</label>
                        <input type="date" value="<?php $newDate = date("Y-m-d", strtotime($task['enddate'])); echo $newDate; ?>" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Explanation">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../../views/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
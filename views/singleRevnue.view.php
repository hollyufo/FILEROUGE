<?php 
    // cheking user session
    if(!$_SESSION['loggedin']){
        // redirect to login page
        redirect('/login');
    }
?>
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
        <?php
            $revenue = $data['revenue'][0];
            $project = $data['projects'];
        ?>
        <div class="text top-buttn">
            <span>Revenue</span>
        </div>
        <div class="container-fluid ps-5 pe-5">
            <div class="task">
                <form method="POST" class="" action="../edit-revenue">
                    <div class="mb-3">
                        <input type="text" name="Revenueid" hidden value="<?php echo $revenue['Revenueid']; ?>">
                        <label for="exampleInputEmail1" class="form-label white">Project</label>
                        <select name="project" class="form-select bg-dark white" aria-label="Default select example">
                            <?php
                            //printing the current project
                            echo '<option selected value='.$revenue['projectid'].'>'.$revenue['name'].'</option>';
                            // printing all the projects
                                foreach($project as $value){
                                    echo "<option value='".$value['projectid']."'>".$value['name']."</option>";
                                }
                            ?>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Revenue</label>
                        <input type="text" name="allrevenue" value="<?php echo $revenue['allrevenue'] ?>" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Revenue">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Personal Revenue</label>
                        <input type="text" name="personalrevenue" value="<?php echo $revenue['personalrevenue'] ?>" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Personal amount">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label white">Date of payment</label>
                        <input type="date" name="datefopayment" value="<?php $newDate = date("Y-m-d", strtotime($revenue['datefopayment'])); echo $newDate; ?>" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="date of payment">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
            </div>
        </div>
    </section>

    <script src="../../views/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
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
    <style>
        .col {
                min-width: 220px;
            }
    </style>
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
                <a href="./logout">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </div>
    </div>

  </nav>

  <section class="home">
    <div class="text top-buttn">
        <span>Code Snippets</span>
        <button type="button" class="btn btn-dark border border-light" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD a Snippet</button>
    </div>
    <div class="container-fluid ps-5 pe-5">
        <div class="notes">
            <?php 
                // printing all the notes 
                foreach($data['code'] as $code){
                    echo '
                    <div class="col">
                    
                        <div class="card dark-cards mb-3 h-100" style="max-width: 18rem;">
                        <div class="card-header spaser"> <a href="./code/delete/'.$code['codeid'].'" class="btn btn-dark border border-light">Delete</a></div>
                        <div class="card-body">
                          <a class="mylink22" href="./code/'.$code['codeid'].'">
                          <h5 class="card-title">'.$code['codetitle'].'</h5>
                          <p class="card-text">'.$code['codeexplanation'].'.</p>
                        </div>
                    </div>
                    </a>  
                </div>';
                }
            ?>
        </div>
    </section>





            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-dark">
                    <div class="modal-header">
                      <h5 class="white" id="exampleModalLabel">ADD A Revenue</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="snippet" method="POST" class="">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label white">Title</label>
                            <input type="text" id="title" name="title" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
                            <p class="not-valid" class="not-valid" id ="error_title"></p>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label white">Body</label>
                            <input name="description" id="description" type="text" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Body">
                            <p class="not-valid" class="not-valid" id ="error_body"></p>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label white">code</label>
                            <input name="code" id="code" type="text" class="form-control white bg-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="code">
                            <p class="not-valid" class="not-valid" id ="errorcode"></p>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
    <script src="./views/assets/js/dashboard.js"></script>
    <script src="./views/assets/js/snippets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($title) ?></title> <!--esc is a global that prevents XsS attacks-->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <!--//boostrap icons-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <!--google fonts andika-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Andika&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/style.css">
  </head>
  <body>
    <nav
      class="navbar sticky-top navbar-expand-md mb-1"
      style="background-color: #009879"
    >
      <a class="navbar-brand" href="/">
        <img
          src="https://ih1.redbubble.net/image.2872970304.9154/bg,f8f8f8-flat,750x,075,f-pad,750x1000,f8f8f8.jpg"
          alt="Logo"
          width="30"
          height="30"
          class="d-inline-block"
        />
        <b>Stonks</b>
        </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#hamburger"
        aria-controls="hamburger"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="hamburger">
        <ul class="navbar-nav me-auto">
          <li class="nav-item mx-1 my-1 ">
            <a class="nav-link active" href="/">Home</a>
          </li>
          <li class="nav-item mx-1 my-1 ">
            <a class="nav-link" href="#">stuff</a>
          </li>
          <li class="nav-item dropdown mx-1 my-1 ">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >About us</a
            >
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">contact us</a>
              <a class="dropdown-item" href="#">who we are</a>
            </div>
          </li>
        </ul>
 
        <form class="d-flex" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        
        <button
          class="btn btn-outline-light mx-1 my-1 listtoggle <?= (session()->get('user_type')=='RM' ) ? '' :'d-none' ?>"
          onclick="togglelists()"
        >Investor List</button>   
        <button
          class="btn btn-outline-light ms-1 <?= (session('user_type')) ? 'd-none' : '' ?>"
          onclick="location.href='/register';"
        >
          Register
        </button><button
          class="btn btn-outline-light mx-1 <?= (session('user_type')) ? 'd-none' : '' ?>"
          onclick="location.href='/login';"
        >
          Login
        </button>
        <button
          class="btn btn-outline-light me-1 my-1 <?= (session('user_type')) ? '' : 'd-none' ?>"
          data-bs-toggle="modal"  data-bs-target="#profilepage"
        >Profile </button>
        <button
          class="btn btn-outline-light me-1 my-1 <?= (session('user_type')) ? '' : 'd-none' ?>"
          onclick="location.href='/logout';"
        >
          Logout
        </button>
      </div>
    </nav>

<div class="modal fade" id="profilepage" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        
      <div class="modal-header h5 fw-bold "><div class="col-11 modal-title text-center">My Profile</div>
        <button class="btn-close col-1" data-bs-dismiss="modal" ></button>
      </div>
      
      
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
              alt="Avatar"
              style="max-width: 50%;height: auto;"
              class="d-inline-block rounded mx-auto "
            />
          </div>
          <hr>
          <div class="row">
              <div class="col-3 h6 mb-0">Full Name
              </div>
              <div class="col-9 text-secondary">
                  <?= session('first_name') ?> <?= session('last_name') ?>
              </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 h6 mb-0">Account type:</h6>
            </div>
            <div class="col-9 text-secondary">
            <?php if(session('user_type')=='RM') :
                            echo "Relation Manager";
                        elseif(session('user_type')=='IG') :
                            echo "Idea Giver";
                        else :
                            echo "Investor";
                        endif; ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 h6 mb-0">Email</h6>
            </div>
            <div class="col-9 text-secondary">
            <?= session('email') ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 h6 mb-0">Mobile</h6>
            </div>
            <div class="col-9 text-secondary">
              +91 992304249
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-3 h6 mb-0">Address</h6>
            </div>
            <div class="col-9 text-secondary">
             MG Road, India
            </div>
          </div>
        </div>
    </div>

      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Edit Profile</button>
      </div>
    </div>
  </div>
</div>
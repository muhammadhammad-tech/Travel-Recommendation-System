<?php include "includes/header.php"; ?>

<title>Tour and Guide</title>

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Tour and Travel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a href="http://localhost/project/DBMS/aboutus.php" class="nav-link" href="#">About Us</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
            <li class="nav-item">
              <a href="http://localhost/project/DBMS/services.php"class="nav-link" href="#">Services</a>
            </li>
          </ul>

          <form class="search-form d-flex">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>

        </div>
      </div>
    </nav>
  </header>

  <div id="abovefold">
    <div id="abovefold-slider" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#abovefold-slider" data-slide-to="0" class="active"></li>
        <li data-target="#abovefold-slider" data-slide-to="1"></li>
        <li data-target="#abovefold-slider" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/img1.jfif" alt="agent" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Travel Agent</h3>
            <p>Choose best agent in the <a href="http://localhost/project/agentView.php">block!</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/img2.jfif" alt="booking" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Book a Trip</h3>
            <p>Get the best <a href="http://localhost/project/bookingView.php">deals!</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/img3.jfif" alt="New York" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Best Package</h3>
            <p>Get yourself a good <a href="http://localhost/project/packageView.php">package!</a></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#abovefold-slider" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#abovefold-slider" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

  <div class="content">

    <section class="about-us my-5">
      <div class="py-4">
        <h3 class="text-center">About Us</h3>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 about-img">
            <img src="images/img4.jfif" class="img-fluid">
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <h2 class="display-4">We are Tour and Travel</h2>
            <p class="py-3">This Website is developed by three university students who are ambicious enough to start a new business from the scratch. It all started from a single idea and sheer determination. Now, everything is falling in places after months of hardwork.</p>
            <a href="aboutus.php" class="btn btn-success">Show more</a>
          </div>
        </div>
      </div>

    </section>

    <section class="our-services my-5">
      <div class="py-4">
        <h3 class="text-center">Our Services</h3>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1473163928189-364b2c4e1135?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80" alt="Card image">
              <div class="card-body">
                <h4 class="card-title">Destination</h4>
                <p class="card-text">"Making transportation fast and safe".</p>
                <a href="http://localhost/project/DestinationView.php" class="btn btn-primary">See Destination</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1456797429698-d3c9eb745239?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"alt="Card image">
              <div class="card-body">
                <h4 class="card-title">Transport</h4>
                <p class="card-text">"Making transportation fast and safe".</p>
                <a href="http://localhost/project/transportView.php" class="btn btn-primary">See Transport</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-12">
            <div class="card">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="Card image">
              <div class="card-body">
                <h4 class="card-title">Accommodation</h4>
                <p class="card-text">"Get the best hotels".</p>
                <a href="http://localhost/project/AccommodationView.php" class="btn btn-primary">See Accommodation</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="our-gallery my-5">
      <div class="py-4">
        <h3 class="text-center">Our gallery</h3>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="image-gallary col-lg-4 col-md-4 col-12">
            <img src="images/img5.jfif" class="img-fluid pb-3" alt="">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img8.jfif" class="img-fluid pb-3" alt="">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img9.jfif" class="img-fluid pb-3" alt="">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img10.jfif" class="img-fluid pb-3" alt="">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img11.jfif" class="img-fluid pb-3" alt="">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="images/img12.jfif" class="img-fluid pb-3" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="userinfo my-5">
      <div class="py-4">
        <h3 class="text-center">User Info</h3>
      </div>

      <div class="w-50 m-auto">
        <form action="userinfo.php" method="POST">
          <div class="form-groups">
            <label for="">Username</label>
            <input type="text" name="user" autocomplete="off" class="form-control">
          </div>
          <div class="form-groups">
            <label for="">Email</label>
            <input type="text" name="email" autocomplete="off" class="form-control">
          </div>
          <div class="form-groups">
            <label for="">Mobile Number</label>
            <input type="text" name="mobile" autocomplete="off" class="form-control">
          </div>
          <div class="form-groups">
            <label for="">Comment</label>
            <textarea class="form-control" name="comment"></textarea>
          </div>
          <div class="btn">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <?php include "includes/footer.php"; ?>
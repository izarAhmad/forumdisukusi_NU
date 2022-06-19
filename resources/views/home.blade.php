@extends('layout.landing')
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">Forum</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
            <a class="nav-item nav-link" href="/register">Sign Up</a>
            <a
              class="nav-item nav-link btn btn-success text-white tombol"
              href="/login"
              >Join Us</a
            >
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">
          Forum<span>Diskusi</span> <br /><span>Nahdlatul</span> Ulama
        </h1>
        
      </div>
    </div>
    <!-- akhir Jumbotron -->

    <!-- container -->
    <div class="container">
      <!-- info panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-sm" data-aos="fade-up" data-aos-duration="500">
              <img
                src="https://img.icons8.com/external-wanicon-two-tone-wanicon/100/000000/external-question-online-course-wanicon-two-tone-wanicon.png"
                alt="Employee"
                class="img-fluid float-left"
              />
              <h4>Tanya Jawab</h4>
              <p>Bertanya Masalah Agama kepada Ulama yang berpengalaman.</p>
            </div>
            <div
              class="col-lg"
              data-aos="fade-up"
              data-aos-duration="500"
              data-aos-delay="100"
            >
              <img
                src="{{asset('img/ebook.png')}}"
                alt="HiRes"
                class="img-fluid float-left"
              />
              <h4>Download File</h4>
              <p>
                Terdapat Fitur Perpustakaan yang dimana adalah kumpulan
                Kitab-kitab.
              </p>
            </div>
            <div
              class="col-lg"
              data-aos="fade-up"
              data-aos-duration="500"
              data-aos-delay="200"
            >
              <img
                src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/100/000000/external-donation-crowdfunding-icongeek26-linear-colour-icongeek26.png"
                alt="Security"
                class="img-fluid float-left"
              />
              <h4>Donasi</h4>
              <p>Donasikan Harta Anda Untuk Kepentingan Agama.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir info panel -->

      <!-- Workingspace -->
      <div class="row workingspace">
        <div class="col-lg-6">
          <img
            src="{{asset('Admin/images/nu.jpg')}}" 
            alt="Working Space"
            class="img-fluid"
            data-aos="zoom-in"
            data-aos-delay="100"
            data-aos-duration="500"
          />
        </div>
        <div
          class="col-lg-5"
          data-aos="fade-down"
          data-aos-delay="200"
          data-aos-duration="500"
        >
          <h2>About <span>US</span></h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo
            corrupti doloremque deserunt quos nemo! Nesciunt consequatur odio
            quos voluptas iusto, sequi iure vitae omnis quam dolore fuga cumque
            mollitia obcaecati?
          </p>
        </div>
      </div>
      <!-- akhir Workingspace -->

      <!-- Testimonial -->
      <section class="testimonial">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <p class="quote"></p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6 justify-content-center d-flex">
            <img src="{{asset('img/gusdur.jpg')}}" alt="Testimonial 2" class="img-main" />
          </div>
        </div>
        <div class="row justify-content-center info-text">
          <div class="col-lg text-center">
            <h5>KH. Abdurrahman Wahid</h5>
            <p>Presiden 4 RI</p>
          </div>
        </div>
      </section>
      <!-- akhir Testimonial -->
    </div>
   
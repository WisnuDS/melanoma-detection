<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <script src="../cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
		
  </head>
  <body>
    <div class="preloader">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"> </div>
        <p>Loading...</p>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
      <header class="page-header" id="home">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar_corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="60px" data-lg-stick-up-offset="145px" data-xl-stick-up-offset="145px" data-xxl-stick-up-offset="145px" data-body-class="rd-navbar-corporate-linked">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand rd-navbar-static--hidden"><a class="brand-name" href="index.html"><img src="{{asset('media/logos/logo-fix-crop.png')}}" alt="" width="110" height="auto" srcset="{{asset('media/logos/logo-fix-crop.png')}}"/></a></div>
            </div>
            <div class="rd-navbar-bottom-panel rd-navbar-search-wrap">
              <!-- RD Navbar Nav-->
              <div class="rd-navbar-nav-wrap rd-navbar-search_not-collapsable">
                <div class="container">
                    <div class="rd-navbar-search_collapsable d-flex justify-content-between">
                        <div class="rd-navbar-brand rd-navbar-fixed--hidden"><a class="brand-name" href="index.html"><img src="{{asset('media/logos/logo-fix-crop.png')}}" alt="" width="110" height="auto" srcset="{{asset('media/logos/logo-fix-crop.png')}}"/></a></div>
                        <div>
                            <ul class="rd-navbar-nav" style="margin: 0 !important">
                                <li><a href="#home">Home</a>
                                </li>
                                <li><a href="#about">About</a>
                                </li>
                                </li>
                                <li><a href="#gallery">Gallery</a>
                                </li>
                                <li><a href="#team">Team</a>
                                </li>
                                <li><a href="#contacts">Contacts</a>
                                </li>
                                <li><a style="color: #49c0d0" href="{{route('login')}}">Login / Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Swiper-->
      <section class="swiper-wrapper-container">
        <div class="swiper-container swiper-slider swiper-slider_fullheight" data-simulate-touch="false" data-loop="false" data-autoplay="5500" data-slide-effect="fade">
          <div class="swiper-wrapper">
            <div class="swiper-slide context-dark swiper-slide-dark-overlay swiper-slide-dark-overlay-35" data-slide-bg="{{asset('images/doctor-with-stethoscope-hands-hospital-background.jpg')}}">
              <div class="swiper-slide-caption">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-7">
                      <h1 data-caption-animate="fadeInUpSmall"><span>Meldec</span></h1>
                      <h3 data-caption-animate="fadeInUpSmall" data-caption-delay="200">Menghadirkan Deteksi Dini Melanoma</h3>
                      <div class="group-lg group-middle" data-caption-animate="fadeInUpSmall" data-caption-delay="250"><img src="{{asset('images/awards-5-120x101.png')}}" alt="" width="120" height="101"/><img src="images/awards-6-120x101.png" alt="" width="120" height="101"/><img src="images/awards-7-120x103.png" alt="" width="120" height="103"/><img src="images/awards-8-120x103.png" alt="" width="120" height="103"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide context-dark swiper-slide-dark-overlay swiper-slide-dark-overlay-35" data-slide-bg="{{asset('images/wepik-photo-mode-20221114-21033.jpeg')}}">
              <div class="swiper-slide-caption">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-7">
                      <h2 data-caption-animate="fadeInLeftSmall">Berbasis AI<br class="d-none d-lg-block"> untuk anda dan keluarga</h2><a href="{{ route('login') }}" class="button button-primary" data-caption-animate="fadeInLeftSmall" data-caption-delay="200" href="index.html#">Login / Register</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide context-dark swiper-slide-dark-overlay swiper-slide-dark-overlay-35" data-slide-bg="images/wepik-photo-mode-20221114-21317.jpeg">
              <div class="swiper-slide-caption">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-7">
                      <h2 data-caption-animate="fadeInUpSmall">Deteksi Terpercaya</h2>
                      <h5 class="text-width-2 block" data-caption-animate="fadeInUpSmall" data-caption-delay="200">Kami menghadirkan deteksi terpercaya berbasis Kecerdasan buatan</h5>
                      <div class="group-lg group-middle"><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="index.html#" data-custom-scroll-to="services">See Services</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Swiper Pagination-->
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <section class="section-md bg-gray-lighter" id="about">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-6 col-lg-4">
              <h4 class="heading-decorated">Tentang Kami</h4>
              <p>Website deteksi dini melanoma berbasis AI yang kami kembangkan merupakan platform yang menyediakan solusi teknologi terdepan dalam mendeteksi melanoma pada tahap awal. Kami menyediakan fitur yang mudah digunakan dan terjangkau bagi masyarakat, sehingga dapat membantu dalam mencegah penyebaran penyakit dan meningkatkan tingkat kesembuhan.</p>
              <p>Tim kami terdiri dari ahli teknologi dan ilmuwan yang berpengalaman dalam bidang AI dan kesehatan. Dengan website deteksi dini melanoma berbasis AI yang kami kembangkan, kami berharap dapat membantu masyarakat dalam meningkatkan kualitas hidup dan kesehatan mereka.</p><a class="button button-primary" href="{{ route('login') }}">Login / Register</a>
            </div>
            <div class="col-md-6 col-lg-4">
              <!-- Thumb flat-->
              <article class="thumb-flat thumb-flat-modern"><img class="thumb-flat__image" src="images/medical-1-418x245.jpg" alt="" width="418" height="245"/>
                <div class="thumb-flat__body">
                  <p class="heading-6"><a href="index.html#">Misi Kami</a></p>
                  <p>Menyediakan platform yang mudah digunakan dan terjangkau bagi masyarakat untuk melakukan deteksi dini melanoma menggunakan teknologi AI.</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <!-- Thumb flat-->
              <article class="thumb-flat thumb-flat-modern"><img class="thumb-flat__image" src="images/medical-2-418x245.jpg" alt="" width="418" height="245"/>
                <div class="thumb-flat__body">
                  <p class="heading-6"><a href="index.html#">Visi Kami</a></p>
                  <p>Visi dari website deteksi dini melanoma dengan AI adalah untuk menyediakan solusi teknologi terdepan dalam mendeteksi melanoma pada tahap awal sehingga dapat membantu mencegah penyebaran penyakit dan meningkatkan tingkat kesembuhan.</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Call to Action-->
      <section class="section section-sm context-dark bg-gray-dark section-cta">
        <div class="container">
          <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">
            <div class="col-xl-8 text-xl-start">
              <h4><span class="fw-bold">Meldec</span><span class="fw-normal">adalah No #1 Deteksi Dini Melanoma</span></h4>
              <p>Kami bekerja sama dengan komunitas medis dan ilmuwan untuk meningkatkan kemampuan teknologi AI dalam mendeteksi melanoma secara dini.</p>
            </div>
            <div class="col-xl-2 text-xl-end"><a class="button button-primary" href="{{ route('login') }}">Login / Register</a></div>
          </div>
        </div>
      </section>

      <section class="section-md bg-default text-center" id="gallery">
        <div class="container">
          <h4 class="heading-decorated">Gallery</h4>
          <div class="isotope-wrap row row-70">
            <div class="col-sm-12">
              <ul class="list-nav isotope-filters isotope-filters-horizontal">
                <li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="index.html#">All</a></li>
                <li><a data-isotope-filter="Category 1" data-isotope-group="gallery" href="index.html#">Health care</a></li>
                <li><a data-isotope-filter="Category 2" data-isotope-group="gallery" href="index.html#">Diagnostics</a></li>
              </ul>
              <div class="isotope row" data-isotope-layout="fitRows" data-isotope-group="gallery">
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1"><a class="img-thumbnail-variant-3" href="index.html#"><img src="images/portfolio-1-418x315.jpg" alt="" width="418" height="315"/><span class="label-custom label-white">Link</span>
                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>9 photos</li>
                        <li>Health care</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Nursing Care</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1"><a class="img-thumbnail-variant-3" href="images/portfolio-2-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-2-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Health care</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Mental health care</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1"><a class="img-thumbnail-variant-3" href="index.html#"><img src="images/portfolio-3-418x315.jpg" alt="" width="418" height="315"/><span class="label-custom label-white">Link</span>
                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>9 photos</li>
                        <li>Health care</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Laboratory Services</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 1"><a class="img-thumbnail-variant-3" href="images/portfolio-4-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-4-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Health care</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Dental Services</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2"><a class="img-thumbnail-variant-3" href="index.html#"><img src="images/portfolio-5-418x315.jpg" alt="" width="418" height="315"/><span class="label-custom label-white">Link</span>
                    <div class="caption"><span class="icon hover-top-element linear-icon-folder-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>9 photos</li>
                        <li>Diagnostics</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Surgery</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-arrow-right"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2"><a class="img-thumbnail-variant-3" href="images/portfolio-6-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-6-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Diagnostics</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Manual Therapy</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2"><a class="img-thumbnail-variant-3" href="images/portfolio-7-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-7-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Diagnostics</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Radiology</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2"><a class="img-thumbnail-variant-3" href="images/portfolio-8-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-8-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Diagnostics</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Ophthalmology</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="Category 2"><a class="img-thumbnail-variant-3" href="images/portfolio-9-original-1200x800.jpg" data-lightgallery="item">
                    <figure><img src="images/portfolio-9-418x315.jpg" alt="" width="418" height="315"/>
                    </figure>
                    <div class="caption"><span class="icon hover-top-element linear-icon-picture"></span>
                      <ul class="list-inline-tag hover-top-element">
                        <li>Diagnostics</li>
                      </ul>
                      <p class="heading-5 hover-top-element">Neurology</p>
                      <div class="divider"></div>
                      <p class="small hover-bottom-element">High-quality medical services</p><span class="icon arrow-right linear-icon-plus"></span>
                    </div></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section parallax-container context-dark" data-parallax-img="images/medical-parallax-1.jpg">
        <div class="parallax-content">
          <div class="container section-md">
            <div class="row justify-content-md-center row-50">
              <div class="col-md-6 col-lg-3">
                <!-- Box counter-->
                <article class="box-counter">
                  <div class="box-counter__icon linear-icon-users"></div>
                  <div class="box-counter__wrap">
                    <div class="counter">100</div>
                  </div>
                  <p class="box-counter__title">Monthly Visitors</p>
                </article>
              </div>
              <div class="col-md-6 col-lg-3">
                <!-- Box counter-->
                <article class="box-counter">
                  <div class="box-counter__icon linear-icon-cube"></div>
                  <div class="box-counter__wrap">
                    <div class="counter">45</div>
                  </div>
                  <p class="box-counter__title">Awards</p>
                </article>
              </div>
              <div class="col-md-6 col-lg-3">
                <!-- Box counter-->
                <article class="box-counter">
                  <div class="box-counter__icon linear-icon-thumbs-up2"></div>
                  <div class="box-counter__wrap">
                    <div class="counter">98</div><span>%</span>
                  </div>
                  <p class="box-counter__title">Positive Reviews</p>
                </article>
              </div>
              <div class="col-md-6 col-lg-3">
                <!-- Box counter-->
                <article class="box-counter">
                  <div class="box-counter__icon linear-icon-smile"></div>
                  <div class="box-counter__wrap">
                    <div class="counter">147</div><span>k</span>
                  </div>
                  <p class="box-counter__title">Happy Patients</p>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Meet Our Team-->
      <section class="section-md bg-default text-center" id="team">
        <div class="container">
          <h4 class="heading-decorated">Tim Kami</h4>
          <div class="row row-50 offset-top-1">
            <div class="col-md-6 col-lg-3">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <div class="thumb-corporate__main"><img src="images/doctor1.jpg" alt="" width="418" height="315"/>
                  <div class="thumb-corporate__overlay">
                    <ul class="list-inline-sm thumb-corporate__list">
                      <li><a class="icon-sm fa-facebook icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-twitter icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-google-plus icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-vimeo icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-youtube icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-pinterest-p icon" href="index.html#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="index.html#" data-bs-toggle="modal" data-bs-target="#modalTeam1">Wisnu Dewa Saputra</a></p>
                  <p class="thumb__subtitle">AI Engineer</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <div class="thumb-corporate__main"><img src="images/doctor1.jpg" alt="" width="418" height="315"/>
                  <div class="thumb-corporate__overlay">
                    <ul class="list-inline-sm thumb-corporate__list">
                      <li><a class="icon-sm fa-facebook icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-twitter icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-google-plus icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-vimeo icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-youtube icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-pinterest-p icon" href="index.html#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="index.html#" data-bs-toggle="modal" data-bs-target="#modalTeam1">Wisnu Dewa Saputra</a></p>
                  <p class="thumb__subtitle">Frontend Engineer</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <div class="thumb-corporate__main"><img src="images/doctor1.jpg" alt="" width="418" height="315"/>
                  <div class="thumb-corporate__overlay">
                    <ul class="list-inline-sm thumb-corporate__list">
                      <li><a class="icon-sm fa-facebook icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-twitter icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-google-plus icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-vimeo icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-youtube icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-pinterest-p icon" href="index.html#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="index.html#" data-bs-toggle="modal" data-bs-target="#modalTeam1">Wisnu Dewa Saputra</a></p>
                  <p class="thumb__subtitle">Backend Engineer</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <!-- Thumb corporate-->
              <div class="thumb thumb-corporate">
                <div class="thumb-corporate__main"><img src="images/doctor1.jpg" alt="" width="418" height="315"/>
                  <div class="thumb-corporate__overlay">
                    <ul class="list-inline-sm thumb-corporate__list">
                      <li><a class="icon-sm fa-facebook icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-twitter icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-google-plus icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-vimeo icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-youtube icon" href="index.html#"></a></li>
                      <li><a class="icon-sm fa-pinterest-p icon" href="index.html#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="thumb-corporate__caption">
                  <p class="thumb__title"><a href="index.html#" data-bs-toggle="modal" data-bs-target="#modalTeam1">Wisnu Dewa Saputra</a></p>
                  <p class="thumb__subtitle">Project Manager</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <section class="pre-footer-corporate bg-gray-dark">
        <div class="container">
          <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
            <div class="col-sm-10 col-md-6 col-lg-10 col-xl-3">
              <h6>Tentang</h6>
              <p>Website deteksi dini melanoma berbasis AI yang kami kembangkan merupakan platform yang menyediakan solusi teknologi terdepan dalam mendeteksi melanoma pada tahap awal. Kami menyediakan fitur yang mudah digunakan dan terjangkau bagi masyarakat, sehingga dapat membantu dalam mencegah penyebaran penyakit dan meningkatkan tingkat kesembuhan.
            </p>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">
              <h6>Kontak</h6>
              <ul class="list-xs">
                <li>
                  <dl class="list-terms-minimal">
                    <dt>Alamat</dt>
                    <dd>Fakultas Ilmu Komputer, Universitas Jember, Jalan Kalimantan No 1</dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>E-mail</dt>
                    <dd><a href="mailto:#">idmeldec@gmail.com</a></dd>
                  </dl>
                </li>
                <li>
                  <dl class="list-terms-minimal">
                    <dt>We are open</dt>
                    <dd>Mn-Fr: 10 am-8 pm</dd>
                  </dl>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <footer class="footer-corporate bg-gray-darkest" id="contacts">
        <div class="container">
          <div class="footer-corporate__inner d-flex justify-content-center">
            <p class="rights"><span>WisnuDs</span><span>&nbsp;</span><span id="copyright-year"></span>. All Rights Reserved.</p>
          </div>
        </div>
      </footer>
    </div>
    <!-- Modal login window-->
    <div class="modal fade" id="modalLogin" role="dialog">
      <div class="modal-dialog modal-dialog_custom">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <h5>Login Form</h5>
            <!-- RD Mailform-->
            <form class="rd-mailform rd-mailform_responsive">
              <div class="form-wrap form-wrap_icon linear-icon-envelope">
                <input class="form-input" id="modal-login-email" type="email" name="email">
                <label class="form-label" for="modal-login-email">Your e-mail</label>
              </div>
              <div class="form-wrap form-wrap_icon linear-icon-lock">
                <input class="form-input" id="modal-login-password" type="password" name="password">
                <label class="form-label" for="modal-login-password">Your password</label>
              </div>
              <button class="button button-primary" type="submit">Login</button>
            </form>
            <ul class="list-small">
              <li><a href="index.html#">Forgot your username?</a></li>
              <li><a href="index.html#">Forgot your password?</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal register window-->
    <div class="modal fade" id="modalRegister" role="dialog">
      <div class="modal-dialog modal-dialog_custom">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <h5>Register Form</h5>
            <!-- RD Mailform-->
            <form class="rd-mailform rd-mailform_responsive" data-form-output="form-output-global" method="post" action="https://livedemo00.template-help.com/wt_prod-19301/bat/rd-mailform.php">
              <div class="form-wrap form-wrap_icon linear-icon-envelope">
                <input class="form-input" id="modal-register-email" type="email" name="email">
                <label class="form-label" for="modal-register-email">Your e-mail</label>
              </div>
              <div class="form-wrap form-wrap_icon linear-icon-lock">
                <input class="form-input" id="modal-register-password" type="password" name="password">
                <label class="form-label" for="modal-register-password">Your password</label>
              </div>
              <div class="form-wrap form-wrap_icon linear-icon-lock">
                <input class="form-input" id="modal-register-password2" type="password" name="password2">
                <label class="form-label" for="modal-register-password2">Confirm password</label>
              </div>
              <div class="form-wrap">
                <label class="checkbox-inline">
                  <input type="checkbox" name="remember">Remember me
                </label>
              </div>
              <button class="button button-primary" type="submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal register window-->
    <div class="modal fade" id="modalTeam1" role="dialog">
      <div class="modal-dialog modal-dialog_custom modal-dialog_custom-1">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <div class="container">
              <div class="row row-30 justify-content-center text-center text-lg-start">
                <div class="col-md-10 col-lg-5"><img src="images/team-medical-1-418x315.jpg" alt="" width="418" height="315"/>
                </div>
                <div class="col-md-10 col-lg-7">
                  <h3>Dr. Brian King</h3>
                  <p class="modal__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="row row-30">
                    <div class="col-6 col-sm-3"><img src="images/awards-1-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-2-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-3-120x103.png" alt="" width="120" height="103"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-4-120x103.png" alt="" width="120" height="103"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal register window-->
    <div class="modal fade" id="modalTeam2" role="dialog">
      <div class="modal-dialog modal-dialog_custom modal-dialog_custom-1">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <div class="container">
              <div class="row row-30 justify-content-center text-center text-lg-start">
                <div class="col-md-10 col-lg-5"><img src="images/team-medical-2-418x315.jpg" alt="" width="418" height="315"/>
                </div>
                <div class="col-md-10 col-lg-7">
                  <h3>Dr. Amanda Smith</h3>
                  <p class="modal__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="row row-30">
                    <div class="col-6 col-sm-3"><img src="images/awards-1-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-2-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-3-120x103.png" alt="" width="120" height="103"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-4-120x103.png" alt="" width="120" height="103"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal register window-->
    <div class="modal fade" id="modalTeam3" role="dialog">
      <div class="modal-dialog modal-dialog_custom modal-dialog_custom-1">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <div class="container">
              <div class="row row-30 justify-content-center text-center text-lg-start">
                <div class="col-md-10 col-lg-5"><img src="images/team-medical-3-418x315.jpg" alt="" width="418" height="315"/>
                </div>
                <div class="col-md-10 col-lg-7">
                  <h3>Dr. George Nelson</h3>
                  <p class="modal__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="row row-30">
                    <div class="col-6 col-sm-3"><img src="images/awards-1-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-2-120x101.png" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-3-120x103.png" alt="" width="120" height="103"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="images/awards-4-120x103.png" alt="" width="120" height="103"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal register window-->
    <div class="modal fade" id="modalTeam4" role="dialog">
      <div class="modal-dialog modal-dialog_custom modal-dialog_custom-1">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
          <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          <div class="modal-dialog__content">
            <div class="container">
              <div class="row row-30 justify-content-center text-center text-lg-start">
                <div class="col-md-10 col-lg-5"><img src="{{asset('images/team-medical-4-418x315.jpg')}}" alt="" width="418" height="315"/>
                </div>
                <div class="col-md-10 col-lg-7">
                  <h3>Dr. Sam Wilson</h3>
                  <p class="modal__subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="row row-30">
                    <div class="col-6 col-sm-3"><img src="{{asset('images/awards-1-120x101.png')}}" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="{{asset('images/awards-2-120x101.png')}}" alt="" width="120" height="101"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="{{asset('images/awards-3-120x103.png')}}" alt="" width="120" height="103"/>
                    </div>
                    <div class="col-6 col-sm-3"><img src="{{asset('images/awards-4-120x103.png')}}" alt="" width="120" height="103"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <!-- coded by himic-->
	
	<!--LIVEDEMO_00 -->

<script type="text/javascript">
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7078796-5']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();</script>
	
  <!-- Google Tag Manager --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager --></body>
</html>
@extends('master')

@section('main')




<!-- Services Section Start -->
<section id="services" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Nuestros Servicios</h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Ofrecemos una amplia variedad de servicios relacionados con el mundo del motor ya sean turismos, ciclomotores, motocicletas, furgonetas...</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                    <div class="icon">
                        <i class="lnr lnr-pencil"></i>
                    </div>
                    <h4>Chapa y Pintura</h4>
                    <p>Todos nuestros profesionales de chapa combinan experiencia y conocimientos.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.8s">
                    <div class="icon">
                        <i class="lnr lnr-code"></i>
                    </div>
                    <h4>Neumáticos</h4>
                    <p>Sustitución de neumáticos y equilibrado. Alineado de dirección.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="1.2s">
                    <div class="icon">
                        <i class="lnr lnr-mustache"></i>
                    </div>
                    <h4>Mecánica General</h4>
                    <p>Reparación, mantenimiento, revisiones, itv y diagnosis. Distribuciones, culatas...</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="1.2s">
                    <div class="icon">
                        <i class="lnr lnr-mustache"></i>
                    </div>
                    <h4>Siniestros</h4>
                    <p>Gestionamos su siniestro, realizamos la peritación y en ocasiones fotoperitación. </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Counter Section Start -->
<div class="counters section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="facts-item">
                    <div class="icon">
                        <i class="lnr lnr-clock"></i>
                    </div>
                    <div class="fact-count">
                        <h3><span class="counter">2920</span></h3>
                        <h4>Horas anuales</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="facts-item">
                    <div class="icon">
                        <i class="lnr lnr-briefcase"></i>
                    </div>
                    <div class="fact-count">
                        <h3><span class="counter">1,000,000</span></h3>
                        <h4>Averías reparadas</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="facts-item">
                    <div class="icon">
                        <i class="lnr lnr-user"></i>
                    </div>
                    <div class="fact-count">
                        <h3><span class="counter">5369</span></h3>
                        <h4>Clientes satisfechos</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="facts-item">
                    <div class="icon">
                        <i class="lnr lnr-heart"></i>
                    </div>
                    <div class="fact-count">
                        <h3><span class="counter">1689</span></h3>
                        <h4>Recomendaciones</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->
<!-- Portfolio Section -->
<section id="portfolios" class="section">
    <!-- Container Starts -->
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nuestro Portfolio</h2>
            <hr class="lines">
            <p class="section-subtitle">Aquí podrás ver algunas de nuestras reparaciones.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Portfolio Controller/Buttons -->
                <div class="controls text-center">
                    <a class="filter active btn btn-common" data-filter="all">
                        All
                    </a>
                    <a class="filter btn btn-common" data-filter=".design">
                        Design
                    </a>
                    <a class="filter btn btn-common" data-filter=".development">
                        Development
                    </a>
                    <a class="filter btn btn-common" data-filter=".print">
                        Print
                    </a>
                </div>
                <!-- Portfolio Controller/Buttons Ends-->
            </div>

            <!-- Portfolio Recent Projects -->
            <div id="portfolio" class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img1.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img1.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix design print">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img2.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img2.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img3.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img3.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development design">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img4.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img4.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img5.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img5.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix print design">
                    <div class="portfolio-item">
                        <div class="shot-item">
                            <img src="img/portfolio/img6.jpg" alt="" />
                            <a class="overlay lightbox" href="img/portfolio/img6.jpg">
                                <i class="lnr lnr-eye item-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container Ends -->
</section>
<!-- Portfolio Section Ends -->

<!-- testimonial Section Start -->
<div id="testimonial" class="section" data-stellar-background-ratio="0.1">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="touch-slider owl-carousel owl-theme">
                    <div class="testimonial-item">
                        <img src="img/testimonial/customer1.jpg" alt="Client Testimonoal" />
                        <div class="testimonial-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                            <h3>Jone Deam</h3>
                            <span>Fondor of Jalmori</span>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial/customer2.jpg" alt="Client Testimonoal" />
                        <div class="testimonial-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                            <h3>Oidila Matik</h3>
                            <span>President Lexo Inc</span>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial/customer3.jpg" alt="Client Testimonoal" />
                        <div class="testimonial-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                            <h3>Alex Dattilo</h3>
                            <span>CEO Optima Inc</span>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial/customer4.jpg" alt="Client Testimonoal" />
                        <div class="testimonial-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing ciusmod tempor incididunt ut labore et</p>
                            <h3>Paul Kowalsy</h3>
                            <span>CEO & Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial Section Start -->
<!-- Team section Start -->
<section id="team" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nuestro Equipo</h2>
            <hr class="lines">
            <p class="section-subtitle">Apasionados por nuestro trabajo, siempre en constante crecimiento.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="single-team">
                    <img src="img/team/team1.jpg" alt="">
                    <div class="team-details">
                        <div class="team-inner">
                            <h4 class="team-title">José Medina</h4>
                            <p>Jefe de Taller</p>
                            <ul class="social-list">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="single-team">
                    <img src="img/team/team2.jpg" alt="">
                    <div class="team-details">
                        <div class="team-inner">
                            <h4 class="team-title">Miguel Álvarez</h4>
                            <p>Gerente</p>
                            <ul class="social-list">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="single-team">
                    <img src="img/team/team3.jpg" alt="">
                    <div class="team-details">
                        <div class="team-inner">
                            <h4 class="team-title">Estela Benítez</h4>
                            <p>Recepcionista</p>
                            <ul class="social-list">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="single-team">
                    <img class="img-fulid" src="img/team/team4.jpg" alt="">
                    <div class="team-details">
                        <div class="team-inner">
                            <h4 class="team-title">Manuel Pardo</h4>
                            <p>Mecánico Oficial de Primera</p>
                            <ul class="social-list">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team section End -->
<!-- Contact Section Start -->
<section id="contact" class="section" data-stellar-background-ratio="-0.2">
    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-us">
                        <h3>Contacta con Nosotros</h3>
                        <div class="contact-address">
                            <p>Puente Genil, Córdoba 14500, España </p>
                            <p class="phone">Teléfono: <span>(+34 123 456 789)</span></p>
                            <p class="email">E-mail: <span>(admin@cristiancosanocejas.info)</span></p>
                        </div>
                        <div class="social-icons">
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-block">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tu Nombre" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Tu Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Tu mensaje" rows="8" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Enviar mensaje</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
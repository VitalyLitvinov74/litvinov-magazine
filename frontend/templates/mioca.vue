<template>
  <div>
    <!-- Header Area Start -->
    <header>
      <div class="header-main bg-white sticky-nav ">
        <div class="container position-relative">
          <div class="row">
            <div class="col-auto align-self-center">
              <div class="header-logo">
                <a href="#" />
              </div>
            </div>
            <div class="col align-self-center d-none d-lg-block">
              <div class="main-menu">
                <ul>
                  <li class="dropdown"><a href="#"></a>
                    <ul class="sub-menu">
                      <li><a href="#">Home 1</a></li>
                      <li><a href="#">Home 2</a></li>
                    </ul>
                  </li>
                  <li><a href="#">About</a></li>
                  <li class="dropdown position-static"><a href="#">Pages <i
                    class="fa fa-angle-down"></i></a>
                    <ul class="mega-menu d-block">
                      <li class="d-flex">
                        <ul class="d-block">
                          <li class="title"><a href="#">Inner Pages</a></li>
                          <li><a href="#">404 Page</a></li>
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">Faq Page</a></li>
                          <li><a href="#">Coming Soon Page</a></li>
                        </ul>
                        <ul class="d-block">
                          <li class="title"><a href="#">Other Shop Pages</a></li>
                          <li><a href="#">Cart Page</a></li>
                          <li><a href="#">Checkout Page</a></li>
                          <li><a href="#">Compare Page</a></li>
                          <li><a href="#">Wishlist Page</a></li>
                        </ul>
                        <ul class="d-block">
                          <li class="title"><a href="#">Related Shop Pages</a></li>
                          <li><a href="#">Account Page</a></li>
                          <li><a href="#">Login & Register Page</a></li>
                          <li><a href="#">Empty Cart Page</a></li>
                          <li><a href="#">Thank You Page</a></li>
                        </ul>
                        <ul class="d-flex align-items-center p-0 border-0">
                          <li>
                            <a class="p-0" href="#"><img
                              class="img-responsive w-100"
                              src="/assets/images/banner/menu-banner-1.jpg" alt=""></a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown position-static"><a href="#">Shop <i
                    class="fa fa-angle-down"></i></a>
                    <ul class="mega-menu d-block">
                      <li class="d-flex">
                        <ul class="d-block">

                          <li class="title"><a href="#">Shop Page</a></li>
                          <li><a href="#">Shop 3 Column</a></li>
                          <li><a href="#">Shop 4 Column</a></li>
                          <li><a href="#">Shop Left Sidebar</a></li>
                          <li><a href="#">Shop Right Sidebar</a></li>
                          <li><a href="#">Shop List Left Sidebar</a>
                          </li>
                          <li><a href="#">Shop List Right Sidebar</a>
                          </li>
                          <li><a href="#">Cart Page</a></li>
                          <li><a href="#">Checkout Page</a></li>
                        </ul>
                        <ul class="d-block">
                          <li class="title"><a href="#">product Details Page</a></li>
                          <li><a href="#">Product Single</a></li>
                          <li><a href="#">Product Variable</a></li>
                          <li><a href="#">Product Affiliate</a></li>
                          <li><a href="#">Product Group</a></li>
                          <li><a href="#">Product Tab 2</a></li>
                          <li><a href="#">Product Tab 3</a></li>
                          <li><a href="#">Product Slider</a></li>
                          <li><a href="#">Product Gallery Left</a>
                          </li>
                        </ul>
                        <ul class="d-block">
                          <li class="title"><a href="#">Single Product Page</a></li>
                          <li><a href="#">Product Gallery
                            Right</a> </li>
                          <li><a href="#">Product Sticky Left</a>
                          </li>
                          <li><a href="#">Product Sticky Right</a>
                          </li>
                          <li><a href="#">Compare Page</a></li>
                          <li><a href="#">Wishlist Page</a></li>
                          <li><a href="#">Account Page</a></li>
                          <li><a href="#">Login & Register Page</a></li>
                          <li><a href="#">Empty Cart Page</a></li>
                        </ul>
                        <ul class="d-flex align-items-center p-0 border-0">
                          <li>
                            <a class="p-0" href="#"><img
                              class="img-responsive w-100"
                              src="/assets/images/banner/menu-banner-2.png" alt=""></a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown "><a href="#"></i></a>
                    <ul class="sub-menu">
                      <li><a href="#">Blog Grid Page</a></li>
                      <li><a href="#">Grid Left Sidebar</a></li>
                      <li><a href="#">Grid Right Sidebar</a></li>
                      <li><a href="#">Blog Single Page</a></li>
                      <li><a href="#">Single Left Sidebar</a></li>
                      <li><a href="#">Single Right Sidbar</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>
            </div>
            <!-- Header Action Start -->
            <div class="col col-lg-auto align-self-center pl-0">
              <div class="header-actions">
                <!-- Single Wedge Start -->
                <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                  <i class="pe-7s-search"></i>
                </a>
                <!-- Single Wedge End -->
                <div class="header-bottom-set dropdown">
                  <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                    class="pe-7s-users"></i></button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#">My account</a></li>
                    <li><a class="dropdown-item" href="#">Checkout</a></li>
                    <li><a class="dropdown-item" href="#">Sign in</a></li>
                  </ul>
                </div>
                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                  <i class="pe-7s-like"></i>
                </a>
                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                  <i class="pe-7s-shopbag"></i>
                  <span class="header-action-num">01</span>
                  <!-- <span class="cart-amount">€30.00</span> -->
                </a>
                <a href="#"
                   class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                  <i class="pe-7s-menu"></i>
                </a>
              </div>
              <!-- Header Action End -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Area End -->
    <div class="offcanvas-overlay"></div>

    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
      <div class="inner">
        <div class="head">
          <span class="title">Wishlist</span>
          <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
          <ul class="minicart-product-list">
            <li>
              <a href="single-product.html" class="image"><img src="assets/images/product-image/1.jpg"
                                                               alt="Cart product Image"></a>
              <div class="content">
                <a href="single-product.html" class="title">Hand-Made Garlic Mortar</a>
                <span class="quantity-price">1 x <span class="amount">$21.86</span></span>
                <a href="#" class="remove">×</a>
              </div>
            </li>
            <li>
              <a href="single-product.html" class="image"><img src="assets/images/product-image/2.jpg"
                                                               alt="Cart product Image"></a>
              <div class="content">
                <a href="single-product.html" class="title">Handmade Ceramic Pottery</a>
                <span class="quantity-price">1 x <span class="amount">$13.28</span></span>
                <a href="#" class="remove">×</a>
              </div>
            </li>
            <li>
              <a href="single-product.html" class="image"><img src="assets/images/product-image/3.jpg"
                                                               alt="Cart product Image"></a>
              <div class="content">
                <a href="single-product.html" class="title">Hand Painted Bowls</a>
                <span class="quantity-price">1 x <span class="amount">$17.34</span></span>
                <a href="#" class="remove">×</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="foot">
          <div class="buttons">
            <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
          </div>
        </div>
      </div>
    </div>

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
      <div class="inner">
        <div class="head">
          <span class="title">Cart</span>
          <button class="offcanvas-close">×</button>
        </div>

        <div class="body customScroll">
          <ul class="minicart-product-list">
            <li>
              <a href="#"
                 alt="Cart product Image"></a>
              <div class="content">
                <a href="#">Hand-Made Garlic Mortar</a>
                <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                <a href="#">×</a>
              </div>
            </li>
            <li>
              <a href="#"
                 alt="Cart product Image"></a>
              <div class="content">
                <a href="#">Handmade Ceramic Pottery</a>
                <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                <a href="#">×</a>
              </div>
            </li>
            <li>
              <a href="#"
                 alt="Cart product Image"></a>
              <div class="content">
                <a href="#">Hand Painted Bowls</a>
                <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                <a href="#">×</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="foot">
          <div class="buttons mt-30px">
            <a href="#">view cart</a>
            <a href="#">checkout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
      <button class="offcanvas-close"></button>

      <div class="inner customScroll">

        <div class="offcanvas-menu mb-4">
          <ul>
            <li><a href="#">Home</span></a>
              <ul class="sub-menu">
                <li><a href="#">Home 1</span></a></li>
                <li><a href="#">Home 2</span></a></li>
              </ul>
            </li>
            <li><a href="#">About</a></li>
            <li>
              <a href="#">Pages</span></a>
              <ul class="sub-menu">
                <li>
                  <a href="#">Inner Pages</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">404 Page</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Faq Page</a></li>
                    <li><a href="#">Coming Soon Page</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"> Other Shop Pages</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">Cart Page</a></li>
                    <li><a href="#">Checkout Page</a></li>
                    <li><a href="#">Compare Page</a></li>
                    <li><a href="#">Wishlist Page</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Related Shop Page</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">Account Page</a></li>
                    <li><a href="#">Login & Register Page</a></li>
                    <li><a href="#">Empty Cart Page</a></li>
                    <li><a href="#">Thank You Page</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Shop</span></a>
              <ul class="sub-menu">
                <li>
                  <a href="#">Shop Page</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">Shop 3 Column</a></li>
                    <li><a href="#">Shop 4 Column</a></li>
                    <li><a href="#">Shop Left Sidebar</a></li>
                    <li><a href="#">Shop Right Sidebar</a></li>
                    <li><a href="#">Shop List Left Sidebar</a>
                    </li>
                    <li><a href="#">Shop List Right Sidebar</a>
                    </li>
                    <li><a href="#">Cart Page</a></li>
                    <li><a href="#">Checkout Page</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">product Details Page</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">Product Single</a></li>
                    <li><a href="#">Product Variable</a></li>
                    <li><a href="#">Product Affiliate</a></li>
                    <li><a href="#">Product Group</a></li>
                    <li><a href="#">Product Tab 2</a></li>
                    <li><a href="#">Product Tab 3</a></li>
                    <li><a href="#">Product Slider</a></li>
                    <li><a href="#">Product Gallery Left</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Single Product Page</span></a>
                  <ul class="sub-menu">
                    <li><a href="#">Product Gallery
                      Right</a> </li>
                    <li><a href="#">Product Sticky Left</a>
                    </li>
                    <li><a href="#">Product Sticky Right</a>
                    </li>
                    <li><a href="#">Compare Page</a></li>
                    <li><a href="#">Wishlist Page</a></li>
                    <li><a href="#">Account Page</a></li>
                    <li><a href="#">Login & Register Page</a></li>
                    <li><a href="#">Empty Cart Page</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Blog</span></a>
              <ul class="sub-menu">
                <li><a href="#">Blog Grid Page</a></li>
                <li><a href="#">Grid Left Sidebar</a></li>
                <li><a href="#">Grid Right Sidebar</a></li>
                <li><a href="#">Blog Single Page</a></li>
                <li><a href="#">Single Left Sidebar</a></li>
                <li><a href="#">Single Right Sidbar</a></li>
              </ul>
            </li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
          <ul>
            <li>
              <a href="#"></i></a>
            </li>
            <li>
              <a href="#"></i></a>
            </li>
            <li>
              <a href="#"></i></a>
            </li>
            <li>
              <a href="#"></i></a>
            </li>
            <li>
              <a href="#"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
<!--     OffCanvas Menu End -->
    <Nuxt />


    <div class="newsletter-area ">
      <div class="container line-shape-bottom">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="newsletter-content mb-lm-30px">
              <i class="pe-7s-mail-open-file"></i>
              <div class="newsletter-text">
                <h3 class="title">Newsletter & Get Updates</h3>
                <p>Sign up for our newsletter to get update from us</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="news-letter-form">
              <div id="mc_embed_signup" class="subscribe-form">
                <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank"
                      name="mc-embedded-subscribe-form" method="post"
                      action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                >
                  <div id="mc_embed_signup_scroll" class="mc-form">
                    <input class="email" type="email" required=""
                           placeholder="Enter Your Mail Here......." name="EMAIL" value="">
                    <div class="mc-news d-none" aria-hidden="true">
                      <input type="text" value="" tabindex="-1"
                             name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                    </div>
                    <div class="clear">
                      <button id="mc-embedded-subscribe" class="button" type="submit" name="subscribe"
                              value=""> Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Area Start -->
    <div class="footer-area">
      <div class="footer-container">
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <!-- Start single blog -->
              <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px">
                <div class="single-wedge">
                  <h4 class="footer-herading">Information</h4>
                  <div class="footer-links">
                    <div class="footer-row">
                      <ul class="align-items-center">
                        <li class="li"><a class="single-link" href="about.html">About us</a></li>
                        <li class="li"><a class="single-link" href="#">Delivery information</a></li>
                        <li class="li"><a class="single-link" href="privacy-policy.html">Privacy
                          Policy</a></li>
                        <li class="li"><a class="single-link" href="#">Sales</a></li>
                        <li class="li"><a class="single-link" href="#">Terms & Conditions</a></li>
                        <li class="li"><a class="single-link" href="#">Shipping Policy</a></li>
                        <li class="li"><a class="single-link" href="#">EMI Payment</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End single blog -->
              <!-- Start single blog -->
              <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px">
                <div class="single-wedge">
                  <h4 class="footer-herading">Account</h4>
                  <div class="footer-links">
                    <div class="footer-row">
                      <ul class="align-items-center">
                        <li class="li"><a class="single-link" href="my-account.html"> My account</a>
                        </li>
                        <li class="li"><a class="single-link" href="cart.html">My orders</a></li>
                        <li class="li"><a class="single-link" href="#">Returns</a></li>
                        <li class="li"><a class="single-link"
                                          href="shop-left-sidebar.html">Shipping</a></li>
                        <li class="li"><a class="single-link" href="wishlist.html">Wishlist</a></li>
                        <li class="li"><a class="single-link" href="#">How Does It Work</a></li>
                        <li class="li"><a class="single-link" href="#">Merchant Sign Up</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End single blog -->
              <!-- Start single blog -->
              <div class="col-md-6 col-lg-2 col-sm-6 mb-sm-30px">
                <div class="single-wedge">
                  <h4 class="footer-herading">Store </h4>
                  <div class="footer-links">
                    <div class="footer-row">
                      <ul class="align-items-center">
                        <li class="li"><a class="single-link" href="index.html">Affiliate</a></li>
                        <li class="li"><a class="single-link"
                                          href="shop-left-sidebar.html">Bestsellers</a></li>
                        <li class="li"><a class="single-link" href="#">Discount</a></li>
                        <li class="li"><a class="single-link" href="#">Latest products</a></li>
                        <li class="li"><a class="single-link" href="#">Sale</a></li>
                        <li class="li"><a class="single-link" href="#">All Collection</a></li>
                        <li class="li"><a class="single-link" href="contact.html">Contact Us</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End single blog -->
              <!-- Start single blog -->
              <div class="col-md-6 col-lg-4 col-sm-6 pl-120px line-shape">
                <div class="single-wedge ">

                  <h4 class="footer-herading">Contact Us</h4>
                  <div class="footer-links">
                    <!-- News letter area -->
                    <p class="mail">If you have any question.please <br>
                      contact us at <a href="mailto:demo@example.com">demo@example.com</a> </p>
                    <p class="address"><i class="pe-7s-map-marker"></i> <span>Your address goes here.
                                            <br>
                                            123, Address.</span> </p>
                    <p class="phone m-0"><i class="pe-7s-phone"></i><span><a href="tel:0123456789">+ 0
                                                123
                                                456 789</a> <br> <a href="tel:0123456789">+ 0 123 456 789</a></span></p>

                    <!-- News letter area  End -->
                  </div>
                </div>
              </div>
              <!-- End single blog -->
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <div class="line-shape-top">
              <div class="row flex-md-row-reverse align-items-center">
                <div class="col-md-6 text-center text-md-end">
                  <div class="payment-mth"><a href="#"><img class="img img-fluid"
                                                            src="/assets/images/icons/payment.png" alt="payment-image"></a></div>
                </div>
                <div class="col-md-6 text-center text-md-start">
                  <p class="copy-text"> © 2021 <strong>Mioca.</strong> Made With <i class="fa fa-heart"
                                                                                    aria-hidden="true"></i> By <a class="company-name"
                                                                                                                  href="https://hasthemes.com/">
                    <strong> HasThemes</strong></a>.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Area End -->

    <!-- Search Modal Start -->
    <div class="modal popup-search-style" id="searchActive">
      <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
      <div class="modal-overlay">
        <div class="modal-dialog p-0" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h2>Search Your Product</h2>
              <form class="navbar-form position-relative" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search here...">
                </div>
                <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->
  </div>
</template>
<script>
  import Swiper,  { Navigation, Pagination, Thumbs } from "swiper";
  Swiper.use([ Navigation, Pagination, Thumbs ]);
  export default {
    name: "mioca",
    mounted() {
      /*---------------------------
      Commons Variables
   ------------------------------ */
      var $window = $(window),
        $body = $("body");

      /*----------------------------------------
              Background Image
      -------------------------------------------*/

      $('[data-bg-image]').each(function () {
        var $this = $(this),
          $image = $this.data('bg-image');
        $this.css('background-image', 'url(' + $image + ')');
      });

      /*---------------------------
         Menu Fixed On Scroll Active
      ------------------------------ */
      $(window).on("scroll", function (e) {
        var window_top = $(window).scrollTop() + 1;
        if (window_top > 250) {
          $(".sticky-nav").addClass("menu_fixed animated fadeInDown");
        } else {
          $(".sticky-nav").removeClass("menu_fixed animated fadeInDown");
        }
      });

      /*----------------------------------------
                  Bootstrap dropdown
          -------------------------------------------*/

      // Add slideDown animation to Bootstrap dropdown when expanding.

      $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
      });
      // Add slideUp animation to Bootstrap dropdown when collapsing.
      $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
      });


      /*-------------------------------
          Create an toggle
      ---------------------------------*/

      $('.color a').on('click', function () {
        $('.sidebar-widget-list a').removeClass('active');
        $(this).addClass('active');
      });

      $('.size a').on('click', function () {
        $('.sidebar-widget-list a').removeClass('active-2');
        $(this).addClass('active-2');
      });


      /*-------------------------------
          Create an toggle
      ---------------------------------*/

      $('.pro-details-color a').on('click', function () {
        $('.pro-details-color a').removeClass('active-color');
        $(this).addClass('active-color');
      });

      $('.pro-details-size a').on('click', function () {
        $('.pro-details-size a').removeClass('active-size');
        $(this).addClass('active-size');
      });





      /*---------------------------------
          Off Canvas Function
      -----------------------------------*/
      (function () {
        var $offCanvasToggle = $(".offcanvas-toggle"),
          $offCanvas = $(".offcanvas"),
          $offCanvasOverlay = $(".offcanvas-overlay"),
          $mobileMenuToggle = $(".mobile-menu-toggle");
        $offCanvasToggle.on("click", function (e) {
          e.preventDefault();
          var $this = $(this),
            $target = $this.attr("href");
          $body.addClass("offcanvas-open");
          $($target).addClass("offcanvas-open");
          $offCanvasOverlay.fadeIn();
          if ($this.parent().hasClass("mobile-menu-toggle")) {
            $this.addClass("close");
          }
        });
        $(".offcanvas-close, .offcanvas-overlay").on("click", function (e) {
          e.preventDefault();
          $body.removeClass("offcanvas-open");
          $offCanvas.removeClass("offcanvas-open");
          $offCanvasOverlay.fadeOut();
          $mobileMenuToggle.find("a").removeClass("close");
        });
      })();

      /*----------------------------------
          Off Canvas Menu
      -----------------------------------*/
      function mobileOffCanvasMenu() {
        var $offCanvasNav = $(".offcanvas-menu, .overlay-menu"),
          $offCanvasNavSubMenu = $offCanvasNav.find(".sub-menu");

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"></span>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on("click", "li a, .menu-expand", function (e) {
          var $this = $(this);
          if ($this.attr("href") === "#" || $this.hasClass("menu-expand")) {
            e.preventDefault();
            if ($this.siblings("ul:visible").length) {
              $this.parent("li").removeClass("active");
              $this.siblings("ul").slideUp();
              $this.parent("li").find("li").removeClass("active");
              $this.parent("li").find("ul:visible").slideUp();
            } else {
              $this.parent("li").addClass("active");
              $this.closest("li").siblings("li").removeClass("active").find("li").removeClass("active");
              $this.closest("li").siblings("li").find("ul:visible").slideUp();
              $this.siblings("ul").slideDown();
            }
          }
        });
      }
      mobileOffCanvasMenu();


      /*----------------------------------
       * Offcanvas: User Panel
       ----------------------------------*/
      function mobileOffCanvasUserPanel() {
        var $offCanvasNav = $('.offcanvas-userpanel'),
          $offCanvasNavSubMenu = $offCanvasNav.find('.user-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<span class="offcanvas__user-expand"></span>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas__user-expand', function (e) {
          var $this = $(this);
          if ($this.attr('href') === '#' || $this.hasClass('offcanvas__user-expand')) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
              $this.parent('li').removeClass('active');
              $this.siblings('ul').slideUp();
              $this.parent('li').find('li').removeClass('active');
              $this.parent('li').find('ul:visible').slideUp();
            } else {
              $this.parent('li').addClass('active');
              $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
              $this.closest('li').siblings('li').find('ul:visible').slideUp();
              $this.siblings('ul').slideDown();
            }
          }
        });
      }
      mobileOffCanvasUserPanel();

      var heroSlider = new Swiper('.hero-slider.swiper-container', {
        loop: true,
        speed: 2000,
        effect: "fade",
        autoplay: {
          delay: 7000,
          disableOnInteraction: false,
        },
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
      });



      /*---------------------
          Category Slider
       ---------------------- */

      var categorySlider = new Swiper('.tab-slider.swiper-container', {
        loop: true,
        slidesPerView: 6,
        spaceBetween: 30,
        speed: 1500,
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          0: {
            slidesPerView: 2,
          },
          478: {
            slidesPerView: 2,
          },
          576: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 4,
          },
          992: {
            slidesPerView: 5,
          },
          1200: {
            slidesPerView: 6,
          },
        },
      });

      /*---------------------
          Category Slider
       ---------------------- */

      var categorySlider = new Swiper('.testimonial-wrapper.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 1500,

        // Navigation arrows

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          478: {
            slidesPerView: 1,
          },
          576: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 1,
          },
          992: {
            slidesPerView: 1,
          },
          1200: {
            slidesPerView: 1,
          },
        },
      });

      /*---------------------
       New Product Slider
    ---------------------- */

      var productSlider = new Swiper('.new-product-slider.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,
        loop: true,

        // Navigation arrows

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          478: {
            slidesPerView: 1,
          },
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      });

      /*---------------------------
          Quick view Slider
      ------------------------------ */
      var galleryThumb = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });
      var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 0,
        loop: true,
        thumbs: {
          swiper: galleryThumb
        }
      });

      var zoomThumb = new Swiper('.zoom-thumbs', {
        spaceBetween: 18,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });
      var zoomTop = new Swiper('.zoom-top', {
        spaceBetween: 0,
        slidesPerView: 1,
        thumbs: {
          swiper: zoomThumb
        }
      });

      var zoomThumb = new Swiper('.zoom-thumbs-2', {
        spaceBetween: 15,
        slidesPerView: 5,
        direction: 'vertical',
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
      });

      var zoomTop = new Swiper('.zoom-top-2', {
        spaceBetween: 0,
        loop: true,
        thumbs: {
          swiper: zoomThumb
        }
      });

      /*----------------------------
       Cart Plus Minus Button
   ------------------------------ */
      var CartPlusMinus = $(".cart-plus-minus");
      CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
      CartPlusMinus.append('<div class="inc qtybutton">+</div>');
      $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          // Don't allow decrementing below zero
          if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        $button.parent().find("input").val(newVal);
      });


      /*------------------------------
              Single Product Slider
      -----------------------------------*/
      var swiper = new Swiper(".single-product-slider", {
        slidesPerView: 4,
        spaceBetween: 20,
        speed: 1500,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          478: {
            slidesPerView: 1,
          },
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
          992: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      });

      /*-------------------------------
          Create an account toggle
      ---------------------------------*/
      $(".checkout-toggle2").on("click", function () {
        $(".open-toggle2").slideToggle(1000);
      });

      $(".checkout-toggle").on("click", function () {
        $(".open-toggle").slideToggle(1000);
      });


      /*---------------------
          Scroll Up
      --------------------- */
      $.scrollUp({
        scrollText: '<i class="pe-7s-angle-up"></i>',
        easingType: "linear",
        scrollSpeed: 900,
        animation: "fade",
      });
      /*---------------------
          Countdown
      --------------------- */
      $("[data-countdown]").each(function () {
        var $this = $(this),
          finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function (event) {
          $this.html(event.strftime('<span class="cdown day"><span class="cdown-1">%-D</span><p>Days</p></span> <span class="cdown hour"><span class="cdown-1">%-H</span><p>Hours</p></span> <span class="cdown minutes"><span class="cdown-1">%M</span> <p>Mins</p></span> <span class="cdown second"><span class="cdown-1"> %S</span> <p>Sec</p></span>'));
        });
      });

      /*-----------------------------
          Blog Gallery Slider
      -------------------------------- */
      var swiper = new Swiper(".blog-post-media.swiper-container", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      /*---------------------------
              Brand Logo
        ------------------------------ */
      var companyLogoSlider = new Swiper('.brand-slider.swiper-container', {
        slidesPerView: 5,
        speed: 1500,
        loop: true,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        breakpoints: {

          0: {
            slidesPerView: 2,
          },
          480: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 3,
          },
          992: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 5,
          },
        }
      });

      /*---------------------------
            Nice Select
         ------------------------------ */

      $('.shop-sort').niceSelect();

      /*-------------------------------
        Product Gallery - Image Zoom
       --------------------------------*/

      $('.zoom-image-hover').zoom();


      /*---------------------
          venobox
      --------------------- */
      $('.venobox').venobox();

    }
  }
</script>
<style>
  @import "../static/assets/css/vendor/bootstrap.bundle.min.css";
  @import "../static/assets/css/vendor/pe-icon-7-stroke.css";
  @import "../static/assets/css/vendor/font.awesome.css";
  @import "../static/assets/css/plugins/animate.css";
  @import "../static/assets/css/plugins/swiper-bundle.min.css";
  @import "../static/assets/css/plugins/jquery-ui.min.css";
  @import "../static/assets/css/plugins/nice-select.css";
  @import "../static/assets/css/plugins/venobox.css";
  @import "../static/assets/css/style.css";
</style>

<template>
  <div>
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-12 text-center">
            <h2 class="breadcrumb-title">{{ product.title }}</h2>
            <!--             breadcrumb-list start -->
            <ul class="breadcrumb-list">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">{{ product.title }}</li>
            </ul>
            <!-- breadcrumb-list end -->
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
            <div class="product-details-img product-details-tab product-details-tab-2 d-flex">

              <div class="swiper-container mr-15px zoom-thumbs-2 align-self-start">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img class="img-responsive m-auto" src="/assets/images/product-image/small-image/1.jpg" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img class="img-responsive m-auto" src="/assets/images/product-image/small-image/2.jpg" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img class="img-responsive m-auto" src="/assets/images/product-image/small-image/3.jpg" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img class="img-responsive m-auto" src="/assets/images/product-image/small-image/4.jpg" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img class="img-responsive m-auto" src="/assets/images/product-image/small-image/5.jpg" alt="">
                  </div>
                </div>
              </div>
              <!-- Swiper -->
              <div class="swiper-container zoom-top-2 align-self-start">
                <div class="swiper-wrapper">
                  <div class="swiper-slide zoom-image-hover">
                    <img class="img-responsive" src="/assets/images/product-image/zoom-image/1.jpg" alt="">
                  </div>
                  <div class="swiper-slide zoom-image-hover">
                    <img class="img-responsive" src="/assets/images/product-image/zoom-image/2.jpg" alt="">
                  </div>
                  <div class="swiper-slide zoom-image-hover">
                    <img class="img-responsive" src="/assets/images/product-image/zoom-image/3.jpg" alt="">
                  </div>
                  <div class="swiper-slide zoom-image-hover">
                    <img class="img-responsive" src="/assets/images/product-image/zoom-image/4.jpg" alt="">
                  </div>
                  <div class="swiper-slide zoom-image-hover">
                    <img class="img-responsive" src="/assets/images/product-image/zoom-image/5.jpg" alt="">
                  </div>
                </div>
              </div>

            </div>

          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
            <div class="product-details-content quickview-content ml-25px">
              <h2>{{ product.title }}</h2>
              <div class="pricing-meta">
                <ul class="d-flex">
                  <li class="new-price">{{ selectedEquipment.price }}</li>
                  <li class="old-price">
                    <del>$30.90</del>
                  </li>
                </ul>
              </div>
              <div class="pro-details-rating-wrap">
                <div class="rating-product">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
              </div>

              <p class="mt-30px mb-0"> {{ product.shortDescription }} </p>
              <div
                class="blog-single-tags-share d-md-flex justify-content-between">
                <div class="blog-single-tags d-flex" data-aos="fade-up" data-aos-delay="200">
                  <ul class="tag-list">
                    <li v-for="equipment in product.equipments">
                      <a
                        @click="selectEquipment(equipment)"
                        :class="activeEquipmentClass(equipment)"
                      >
                        {{ equipment.name }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="pro-details-quality">
                <div class="cart-plus-minus">
                  <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1"/>
                </div>
                <div class="pro-details-cart">
                  <button class="add-cart">
                    <add-to-card>
                      Add To Card
                    </add-to-card>
                  </button>
                </div>
                <div class="pro-details-cart">
                  <button class="add-cart buy-button"> Buy It Now</button>
                </div>
                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                  <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                </div>
              </div>
              <div class="pro-details-categories-info pro-details-same-style d-flex">
                <span>Категории: </span>
                <ul class="d-flex">
                  <li>
                    <a href="#">Handmade, </a>
                  </li>
                  <li>
                    <a href="#">Furniture, </a>
                  </li>
                  <li>
                    <a href="#">Decore</a>
                  </li>
                </ul>
              </div>
              <div class="pro-details-social-info pro-details-same-style d-flex">
                <span>Share: </span>
                <ul class="d-flex">
                  <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-google"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
              <div class="payment-img">
                <a href="#"><img src="/assets/images//icons/payment.png" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
      <div class="container">
        <div class="description-review-wrapper">
          <div class="description-review-topbar nav nav-tabs">
            <a @click="numberOfActiveTab=1" :class="numberOfActiveTab===1 ? 'active' : ''"
               >Информация</a>
            <a @click="numberOfActiveTab=2" :class="numberOfActiveTab===2 ? 'active' : ''"
               >Описание</a>
            <a @click="numberOfActiveTab=3" :class="numberOfActiveTab===3 ? 'active' : ''"
              >Отзывы (02)</a>
          </div>
          <div class="tab-content description-review-bottom">
            <div :class="numberOfActiveTab===1 ? 'active' : ''" class="tab-pane">
              <div class="product-anotherinfo-wrapper text-start">
                <ul>
                  <li v-for="characteristic in product.characteristics">
                    <span class="firstLetterToUpperCase">
                      {{ characteristic.name }}
                    </span>
                    {{ characteristic.value }}
                  </li>
                  <li v-for="characteristic in selectedEquipment.characteristics">
                    <span class="firstLetterToUpperCase">
                      {{ characteristic.name }}
                    </span>
                    {{ characteristic.value }}
                  </li>
                </ul>
              </div>
            </div>
            <div :class="numberOfActiveTab===2 ? 'active' : ''" class="tab-pane">
              <div class="product-description-wrapper">
                <p>
                  {{ product.description }}
                </p>
              </div>
            </div>
            <div :class="numberOfActiveTab===3 ? 'active' : ''" class="tab-pane">
              <div class="row">
                <div class="col-lg-7">
                  <div class="review-wrapper">
                    <div class="single-review">
                      <div class="review-img">
                        <img src="/assets/images/review-image/1.png" alt=""/>
                      </div>
                      <div class="review-content">
                        <div class="review-top-wrap">
                          <div class="review-left">
                            <div class="review-name">
                              <h4>White Lewis</h4>
                            </div>
                            <div class="rating-product">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                          </div>
                          <div class="review-left">
                            <a href="#">Reply</a>
                          </div>
                        </div>
                        <div class="review-bottom">
                          <p>
                            Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                            cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                            euismod vehicula. Phasellus quam nisi, congue id nulla.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="single-review child-review">
                      <div class="review-img">
                        <img src="/assets/images/review-image/2.png" alt=""/>
                      </div>
                      <div class="review-content">
                        <div class="review-top-wrap">
                          <div class="review-left">
                            <div class="review-name">
                              <h4>White Lewis</h4>
                            </div>
                            <div class="rating-product">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                          </div>
                          <div class="review-left">
                            <a href="#">Reply</a>
                          </div>
                        </div>
                        <div class="review-bottom">
                          <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                            cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                            euismod vehicula.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ratting-form-wrapper pl-50">
                    <h3>Add a Review</h3>
                    <div class="ratting-form">
                      <form action="#">
                        <div class="star-box">
                          <span>Your rating:</span>
                          <div class="rating-product">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="rating-form-style">
                              <input placeholder="Name" type="text"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="rating-form-style">
                              <input placeholder="Email" type="email"/>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="rating-form-style form-submit">
                              <textarea name="Your Review" placeholder="Message"></textarea>
                              <button class="btn btn-primary btn-hover-color-primary "
                                      type="submit" value="Submit">Submit
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- product details description area end -->

    <!-- Related product Area Start -->
    <div class="related-product-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center line-height-1">
              <h2 class="title">Related Products</h2>
              <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
          </div>
        </div>
        <div class="new-product-slider swiper-container slider-nav-style-1 pb-100px">
          <div class="new-product-wrapper swiper-wrapper">
            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/9.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/9.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                    <span class="new">New</span>
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title">
                    <a href="single-product.html">
                      {{ product.title }}
                    </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
            </div>
            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/10.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/10.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                    <span class="sale">-10%</span>
                                    <span class="new">New</span>
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title"><a href="single-product.html">Handmade Ceramic Pottery
                  </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                    <span class="old">$45.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
              <!-- Single Prodect -->
            </div>
            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/11.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/11.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                    <span class="new">Sale</span>
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title"><a href="single-product.html">Hand Painted Bowls
                  </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
            </div>

            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/12.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/1.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                    <span class="sale">-5%</span>
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title"><a href="single-product.html">Antique Wooden Farm
                    Large
                  </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                    <span class="old">$40.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
              <!-- Single Prodect -->
            </div>

            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/6.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/6.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title"><a href="single-product.html">Handmade Jute Basket
                  </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
            </div>
            <div class="new-product-item swiper-slide">
              <!-- Single Prodect -->
              <div class="product">
                <div class="thumb">
                  <a href="single-product.html" class="image">
                    <img src="/assets/images/product-image/7.jpg" alt="Product"/>
                    <img class="hover-image" src="/assets/images/product-image/7.jpg"
                         alt="Product"/>
                  </a>
                  <span class="badges">
                                    <span class="new">New</span>
                                </span>
                  <div class="actions">
                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                      class="pe-7s-like"></i></a>
                    <a href="#" class="action quickview" data-link-action="quickview"
                       title="Quick view" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                    <a href="compare.html" class="action compare" title="Compare"><i
                      class="pe-7s-refresh-2"></i></a>
                  </div>
                </div>
                <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                  <h5 class="title"><a href="single-product.html">Knitting yarn & crochet
                    hook
                  </a>
                  </h5>
                  <span class="price">
                                    <span class="new">$38.50</span>
                                </span>
                </div>
                <button title="Add To Cart" class=" add-to-cart">Add
                  To Cart
                </button>
              </div>
              <!-- Single Prodect -->
            </div>

          </div>
          <!-- Add Arrows -->

          <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

        </div>
      </div>
    </div>
    <!-- Related product Area End -->

    <div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container gallery-top">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/zoom-image/1.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/zoom-image/2.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/zoom-image/3.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/zoom-image/4.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/zoom-image/5.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="swiper-container gallery-thumbs mt-20px">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/small-image/1.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/small-image/2.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/small-image/3.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/small-image/4.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img class="img-responsive m-auto"
                           src="/assets/images/product-image/small-image/5.jpg" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
                  <h2>{{ product.title }}</h2>
                  <div class="pricing-meta">
                    <ul class="d-flex">
                      <li class="new-price">$20.90</li>
                      <li class="old-price">
                        <del>$30.90</del>
                      </li>
                    </ul>
                  </div>
                  <div class="pro-details-rating-wrap">
                    <div class="rating-product">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
                  </div>
                  <div class="stock mt-30px">
                                    <span class="avallabillty">Availability: <span class="in-stock"><i
                                      class="fa fa-check"></i>In Stock</span></span>
                  </div>
                  <p class="mt-30px mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmodol tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni
                    nostrud exercitation ullamco laboris </p>
                  <div class="pro-details-quality">
                    <div class="cart-plus-minus">
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1"/>
                    </div>
                    <div class="pro-details-cart">
                      <button class="add-cart"> Add To
                        Cart
                      </button>
                    </div>
                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
                      <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                    </div>
                  </div>
                  <div class="pro-details-categories-info pro-details-same-style d-flex">
                    <span>Categories: </span>
                    <ul class="d-flex">
                      <li>
                        <a href="#">Handmade, </a>
                      </li>
                      <li>
                        <a href="#">Furniture, </a>
                      </li>
                      <li>
                        <a href="#">Decore</a>
                      </li>
                    </ul>
                  </div>
                  <div class="pro-details-social-info pro-details-same-style d-flex">
                    <span>Share: </span>
                    <ul class="d-flex">
                      <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-google"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                      </li>
                    </ul>
                  </div>
                  <div class="payment-img">
                    <a href="#"><img src="/assets/images//icons/payment.png" alt=""></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AddToCard from "../../components/product/buttons/AddToCard";

export default {
  components: {
    "add-to-card": AddToCard
  },

  data() {
    return {
      numberOfActiveTab: 2
    }
  },

  methods: {
    selectEquipment(equipment) {
      if (this.selectedEquipment.id === equipment.id) {
        return;
      }
      this.$store.commit('product/selectEquipment', equipment)
    },

    activeEquipmentClass(equipment) {
      if (this.selectedEquipment.id === equipment.id) {
        return 'active'
      }
      return ''
    }
  },

  computed: {
    selectedEquipment() {
      return this.$store.state.product.selectedEquipment;
    },
    product() {
      return this.$store.state.product.product;
    },
  }

}
</script>
<style>
.firstLetterToUpperCase {
  text-transform: capitalize;
}
</style>

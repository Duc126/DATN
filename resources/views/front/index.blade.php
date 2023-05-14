 <?php use App\Models\Product; ?>
 @extends('front.layout.layout')
 @section('content')
     <!-- Main-Slider -->
     <div class="default-height ph-item">
         <div class="slider-main owl-carousel">
             @foreach ($sliderBanners as $bannerList)
                 <div class="bg-image">
                     <div class="slide-content">
                         <h1>
                             <a
                                 @if (!@empty($bannerList['link'])) href="{{ url($bannerList['link']) }}" @else href="javascript:;" @endif>
                                 <img title="{{ $bannerList['title'] }}" alt="{{ $bannerList['title'] }}"
                                     src="{{ asset('front/images/banner_images/' . $bannerList['image']) }}">
                             </a>

                         </h1>
                         <h2> {{ $bannerList['title'] }}</h2>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
     <!-- Main-Slider /- -->
     @if (isset($fixBanners[0]['image']))
         <!-- Banner-Layer -->
         <div class="banner-layer">
             <div class="container">
                 <div class="image-banner">
                     <a target="_blank" rel="nofollow" href="{{ url($fixBanners[0]['link']) }}"
                         class="mx-auto banner-hover effect-dark-opacity">
                         <img class="img-fluid" src="{{ asset('front/images/banner_images/' . $fixBanners[0]['image']) }}"
                             alt="{{ $fixBanners[0]['alt'] }}" title="{{ $fixBanners[0]['title'] }}">
                     </a>
                 </div>
             </div>
         </div>
         <!-- Banner-Layer /- -->
     @endif
     <!-- Top Collection -->
     <section class="section-maker">
         <div class="container">
             <div class="sec-maker-header text-center">
                 <h3 class="sec-maker-h3">{{ __('messages.front.top_collection') }}</h3>
                 <ul class="nav tab-nav-style-1-a justify-content-center">
                     <li class="nav-item">
                         <a class="nav-link active" data-toggle="tab"
                             href="#men-latest-products">{{ __('messages.front.new_arrivals') }}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="tab"
                             href="#men-best-selling-products">{{ __('messages.front.best_sellers') }}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="tab"
                             href="#discounted-products">{{ __('messages.front.discount_product') }}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="tab"
                             href="#men-featured-products">{{ __('messages.front.featured_product') }}</a>
                     </li>
                 </ul>
             </div>
             <div class="wrapper-content">
                 <div class="outer-area-tab">
                     <div class="tab-content">
                         <div class="tab-pane active show fade" id="men-latest-products">
                             <div class="slider-fouc">
                                 <div class="products-slider owl-carousel" data-item="4">
                                     @foreach ($newProducts as $product)
                                         <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                                         <div class="item">
                                             <div class="image-container">
                                                 <a class="item-img-wrapper-link"
                                                     href="{{ url('product/' . $product['id']) }}">
                                                     @if (!empty($product['product_image']) && file_exists($product_image_path))
                                                         <img class="img-fluid" src="{{ asset($product_image_path) }}"
                                                             alt="Product">
                                                     @else
                                                         <img class="img-fluid"
                                                             src="{{ asset('front/images/product_images/small/no-image.png') }}"
                                                             alt="Product">
                                                     @endif
                                                 </a>
                                                 {{-- <div class="item-action-behaviors">
                                                     <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                         Look
                                                     </a>
                                                     <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                     <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                         Wishlist</a>
                                                     <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                 </div> --}}
                                             </div>
                                             <div class="item-content">
                                                 <div class="what-product-is">
                                                     <ul class="bread-crumb">
                                                         <li>
                                                             <a
                                                                 href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                         </li>
                                                     </ul>
                                                     <h6 class="item-title">
                                                         <a
                                                             href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                     </h6>
                                                     {{-- <div class="item-stars">
                                                         <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                             <span style='width:0'></span>
                                                         </div>
                                                         <span>(0)</span>
                                                     </div> --}}
                                                 </div>
                                                 <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                 @if ($getDiscountPrice > 0)
                                                     <div class="price-template">
                                                         {{-- <div class="item-new-price">
                                                             {{ $getDiscountPrice }}.VNĐ
                                                         </div> --}}

                                                         {{-- <div class="item-old-price">
                                                             {{ $product['product_price'] }}.VNĐ
                                                         </div> --}}
                                                         <div class="item-new-price">
                                                            {{ number_format($getDiscountPrice, 0, '.', '.') }} VNĐ
                                                        </div>
                                                         <div class="item-old-price">
                                                            {{ number_format($product['product_price'], 0, '.', '.') }} VNĐ
                                                        </div>
                                                     </div>
                                                 @else
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                            {{ number_format($product['product_price'], 0, '.', '.') }} VNĐ
                                                         </div>
                                                     </div>
                                                 @endif

                                             </div>
                                             <div class="tag new">
                                                <span>{{ __('Mới') }}</span>
                                            </div>
                                             {{-- <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                             @if ($isProductNew == 'Yes')
                                                 <div class="tag new">
                                                     <span>{{ __('Mới') }}</span>
                                                 </div>
                                             @endif --}}
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane show fade" id="men-best-selling-products">
                             <div class="slider-fouc">
                                 <div class="products-slider owl-carousel" data-item="4">
                                     @foreach ($bestSellers as $productBest)
                                         <?php $product_image_path = 'front/images/product_images/small/' . $productBest['product_image']; ?>
                                         <div class="item">
                                             <div class="image-container">
                                                 <a class="item-img-wrapper-link"
                                                     href="{{ url('product/' . $productBest['id']) }}">
                                                     @if (!empty($productBest['product_image']) && file_exists($product_image_path))
                                                         <img class="img-fluid" src="{{ asset($product_image_path) }}"
                                                             alt="Product">
                                                     @else
                                                         <img class="img-fluid"
                                                             src="{{ asset('front/images/product_images/small/no-image.png') }}"
                                                             alt="Product">
                                                     @endif
                                                 </a>
                                                 {{-- <div class="item-action-behaviors">
                                                     <a class="item-quick-look" data-toggle="modal"
                                                         href="#quick-view">Quick
                                                         Look
                                                     </a>
                                                     <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                     <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                         Wishlist</a>
                                                     <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                 </div> --}}
                                             </div>
                                             <div class="item-content">
                                                 <div class="what-product-is">
                                                     <ul class="bread-crumb">
                                                         <li>
                                                             <a
                                                                 href="{{ url('product/' . $productBest['id']) }}">{{ $productBest['product_code'] }}</a>
                                                         </li>
                                                     </ul>
                                                     <h6 class="item-title">
                                                         <a
                                                             href="{{ url('product/' . $productBest['id']) }}">{{ $productBest['product_name'] }}</a>
                                                     </h6>
                                                     <div class="item-stars">
                                                         <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                             <span style='width:0'></span>
                                                         </div>
                                                         <span>(0)</span>
                                                     </div>
                                                 </div>
                                                 <?php $getDiscountPrice = Product::getDiscountPrice($productBest['id']); ?>
                                                 @if ($getDiscountPrice > 0)
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $getDiscountPrice }}.VNĐ --}}
                                                            {{ number_format($getDiscountPrice, 0, '.', '.') }} VNĐ

                                                         </div>
                                                         <div class="item-old-price">
                                                             {{-- {{ $productBest['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productBest['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @else
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $productBest['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productBest['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @endif

                                             </div>
                                             <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                             @if ($isProductNew == 'Yes')
                                                 <div class="tag new">
                                                     <span>{{ __('Mới') }}</span>
                                                 </div>
                                             @endif
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="discounted-products">
                             <div class="slider-fouc">
                                 <div class="products-slider owl-carousel" data-item="4">
                                     @foreach ($discountedProducts as $productDiscount)
                                         <?php $product_image_path = 'front/images/product_images/small/' . $productDiscount['product_image']; ?>
                                         <div class="item">
                                             <div class="image-container">
                                                 <a class="item-img-wrapper-link"
                                                     href="{{ url('product/' . $productDiscount['id']) }}">
                                                     @if (!empty($productDiscount['product_image']) && file_exists($product_image_path))
                                                         <img class="img-fluid" src="{{ asset($product_image_path) }}"
                                                             alt="Product">
                                                     @else
                                                         <img class="img-fluid"
                                                             src="{{ asset('front/images/product_images/small/no-image.png') }}"
                                                             alt="Product">
                                                     @endif
                                                 </a>
                                                 {{-- <div class="item-action-behaviors">
                                                     <a class="item-quick-look" data-toggle="modal"
                                                         href="#quick-view">Quick
                                                         Look
                                                     </a>
                                                     <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                     <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                         Wishlist</a>
                                                     <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                 </div> --}}
                                             </div>
                                             <div class="item-content">
                                                 <div class="what-product-is">
                                                     <ul class="bread-crumb">
                                                         <li>
                                                             <a
                                                                 href="{{ url('product/' . $productDiscount['id']) }}">{{ $productDiscount['product_code'] }}</a>
                                                         </li>
                                                     </ul>
                                                     <h6 class="item-title">
                                                         <a
                                                             href="{{ url('product/' . $productDiscount['id']) }}">{{ $productDiscount['product_name'] }}</a>
                                                     </h6>
                                                     <div class="item-stars">
                                                         <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                             <span style='width:0'></span>
                                                         </div>
                                                         <span>(0)</span>
                                                     </div>
                                                 </div>
                                                 <?php $getDiscountPrice = Product::getDiscountPrice($productDiscount['id']); ?>
                                                 @if ($getDiscountPrice > 0)
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $getDiscountPrice }}.VNĐ --}}
                                                            {{ number_format($getDiscountPrice, 0, '.', '.') }} VNĐ

                                                         </div>
                                                         <div class="item-old-price">
                                                             {{-- {{ $productDiscount['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productDiscount['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @else
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $productDiscount['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productDiscount['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @endif

                                             </div>
                                             <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                             @if ($isProductNew == 'Yes')
                                                 <div class="tag new">
                                                     <span>{{ __('Mới') }}</span>
                                                 </div>
                                             @endif
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="men-featured-products">
                             <div class="slider-fouc">
                                 <div class="products-slider owl-carousel" data-item="4">
                                     @foreach ($featuredProduct as $productFeature)
                                         <?php $product_image_path = 'front/images/product_images/small/' . $productFeature['product_image']; ?>
                                         <div class="item">
                                             <div class="image-container">
                                                 <a class="item-img-wrapper-link"
                                                     href="{{ url('product/' . $productFeature['id']) }}">
                                                     @if (!empty($productFeature['product_image']) && file_exists($product_image_path))
                                                         <img class="img-fluid" src="{{ asset($product_image_path) }}"
                                                             alt="Product">
                                                     @else
                                                         <img class="img-fluid"
                                                             src="{{ asset('front/images/product_images/small/no-image.png') }}"
                                                             alt="Product">
                                                     @endif
                                                 </a>
                                                 {{-- <div class="item-action-behaviors">
                                                     <a class="item-quick-look" data-toggle="modal"
                                                         href="#quick-view">Quick
                                                         Look
                                                     </a>
                                                     <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                     <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                         Wishlist</a>
                                                     <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                 </div> --}}
                                             </div>
                                             <div class="item-content">
                                                 <div class="what-product-is">
                                                     <ul class="bread-crumb">
                                                         <li>
                                                             <a
                                                                 href="{{ url('product/' . $productFeature['id']) }}">{{ $productFeature['product_code'] }}</a>
                                                         </li>
                                                     </ul>
                                                     <h6 class="item-title">
                                                         <a
                                                             href="{{ url('product/' . $productFeature['id']) }}">{{ $productFeature['product_name'] }}</a>
                                                     </h6>
                                                     <div class="item-stars">
                                                         <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                             <span style='width:0'></span>
                                                         </div>
                                                         <span>(0)</span>
                                                     </div>
                                                 </div>
                                                 <?php $getDiscountPrice = Product::getDiscountPrice($productFeature['id']); ?>
                                                 @if ($getDiscountPrice > 0)
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $getDiscountPrice }}.VNĐ --}}
                                                            {{ number_format($getDiscountPrice, 0, '.', '.') }} VNĐ

                                                         </div>
                                                         <div class="item-old-price">
                                                             {{-- {{ $productFeature['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productFeature['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @else
                                                     <div class="price-template">
                                                         <div class="item-new-price">
                                                             {{-- {{ $productFeature['product_price'] }}.VNĐ --}}
                                                             {{ number_format($productFeature['product_price'], 0, '.', '.') }} VNĐ

                                                         </div>
                                                     </div>
                                                 @endif

                                             </div>
                                             <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                             @if ($isProductNew == 'Yes')
                                                 <div class="tag new">
                                                     <span>{{ __('Mới') }}</span>
                                                 </div>
                                             @endif
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Top Collection /- -->
     <!-- Banner-Layer -->
     @if (isset($fixBanners[0]['image']))
         <!-- Banner-Layer -->
         <div class="banner-layer">
             <div class="container">
                 <div class="image-banner">
                     <a target="_blank" rel="nofollow" href="{{ url($fixBanners[0]['link']) }}"
                         class="mx-auto banner-hover effect-dark-opacity">
                         <img class="img-fluid"
                             src="{{ asset('front/images/banner_images/' . $fixBanners[0]['image']) }}"
                             alt="{{ $fixBanners[0]['alt'] }}" title="{{ $fixBanners[0]['title'] }}">
                     </a>
                 </div>
             </div>
         </div>
         <!-- Banner-Layer /- -->
     @endif
     <!-- Banner-Layer /- -->
     <!-- Site-Priorities -->
     <section class="app-priority">
         <div class="container">
             <div class="priority-wrapper u-s-p-b-80">
                 <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-3">
                         <div class="single-item-wrapper">
                             <div class="single-item-icon">
                                 <i class="ion ion-md-star"></i>
                             </div>
                             <h2>
                                 {{ __('Giá trị lớn') }}
                             </h2>
                             <p>{{ __('Chúng tôi cung cấp giá cả cạnh tranh trên phạm vi sản phẩm hơn 100 triệu của chúng tôi') }}</p>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3">
                         <div class="single-item-wrapper">
                             <div class="single-item-icon">
                                 <i class="ion ion-md-cash"></i>
                             </div>
                             <h2>
                                 {{ __('Mua sắm với sự tự tin') }}
                             </h2>
                             <p>{{ __('Bảo vệ của chúng tôi bao gồm mua hàng của bạn từ nhấp chuột để giao hàng') }}</p>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3">
                         <div class="single-item-wrapper">
                             <div class="single-item-icon">
                                 <i class="ion ion-ios-card"></i>
                             </div>
                             <h2>
                                 {{ __('Thanh toán an toàn') }}
                             </h2>
                             <p>{{ __('Thanh toán bằng các phương thức thanh toán an toàn và phổ biến nhất thế giới') }}</p>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3">
                         <div class="single-item-wrapper">
                             <div class="single-item-icon">
                                 <i class="ion ion-md-contacts"></i>
                             </div>
                             <h2>
                                 {{ __('Trung tâm trợ giúp 24/7') }}
                             </h2>
                             <p>{{ __('Hỗ trợ 24/24 để có trải nghiệm mua sắm suôn sẻ') }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Site-Priorities /- -->
 @endsection

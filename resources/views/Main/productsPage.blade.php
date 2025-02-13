@extends('mainlayouts.mainMaster')

<html></html>
<div style="padding-top: 135px" class="main-container section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                <aside>
                    <div class="widget_search">
                       


                    </div>

                    <div class="widget categories">
                        <h4 class="widget-title">All Categories</h4>
                        <ul class="categories-list">
                            <li>
                                <a href="{{ route('products.index', ['category' => 'Hand-Tools']) }}">
                                    <i class="lni-dinner"></i>
                                    Hand tools
                                    <span class="category-counter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index', ['category' => 'Electrical'])}}">
                                    <i class="lni-control-panel"></i>
                                    Electrical
                                    <span class="category-counter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index', ['category' =>'General Safety'])}}">
                                    <i class="fa-solid fa-fire-extinguisher"></i>
                                    General Safety
                                    <span class="category-counter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index', ['category' =>'Gardening'])}}">
                                    <i class="lni-coffee-cup"></i>
                                    Garedning
                                    <span class="category-counter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('products.index', ['category' =>'Ladders'])}}">
                                    <i class="lni-home"></i>
                                    Ladders
                                    <span class="category-counter"></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <div class="widget">
                        <div class="add-box">

                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                <div class="product-filter">
                    <div class="short-name">
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#list-view"
                                ><i class="lni-list"></i
                            ></a>
                        </li>
                    </ul>
                </div>

                <div class="adds-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade">
                            <div class="row">
                                <div
                                    class="col-xs-12 col-sm-12 col-md-6 col-lg-6"
                                >
                                    <div class="featured-box">
                                        <figure>
                                            <span class="price-save">
                                                30% Save
                                            </span>
                                            <div class="icon">
                                                <span class="bg-green"
                                                    ><i class="lni-heart"></i
                                                ></span>
                                                <span
                                                    ><i class="lni-bookmark"></i
                                                ></span>
                                            </div>
                                            <a href="#"
                                                ><img
                                                    class="img-fluid"
                                                    src="{{asset('assets/img/featured/img-1.jpg')}}"
                                                    alt=""
                                            /></a>
                                        </figure>
                                        <div class="feature-content">
                                            <div class="product">
                                                <a href="#">Electronic > </a>
                                                <a href="#">Apple</a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html"
                                                    >Canon SX Powershot ...</a
                                                >
                                            </h4>
                                            <div class="meta-tag">
                                                <span>
                                                    <a href="#"
                                                        ><i
                                                            class="lni-user"
                                                        ></i>
                                                        John Smith</a
                                                    >
                                                </span>
                                                <span>
                                                    <a href="#"
                                                        ><i
                                                            class="lni-map-marker"
                                                        ></i>
                                                        New York, US</a
                                                    >
                                                </span>
                                                <span>
                                                    <a href="#"
                                                        ><i class="lni-tag"></i>
                                                        Apple</a
                                                    >
                                                </span>
                                            </div>
                                            <p class="dsc">
                                                Lorem Ipsum is simply dummy text
                                                of the printing and typesetting
                                                industry. Lorem Ipsum has been
                                                the industry.
                                            </p>
                                            <div class="listing-bottom">
                                                <h3 class="price float-left">
                                                    $249.00
                                                </h3>
                                                <a
                                                    href="ads-details.html"
                                                    class="btn btn-common float-right"
                                                    >View Details</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div id="list-view" class="tab-pane fade active show">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="featured-box">
                                            <figure>


                                                <a href="#">
                                                    <img
                                                        class="img-fluid"
                                                        src="{{ asset($product->product_image) }}"
                                                        alt="{{ $product->name }}"
                                                    />
                                                </a>
                                            </figure>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="#">{{ $product->category->name ?? 'Category' }} > </a>
                                                    <a href="#">{{ $product->brand->name ?? 'Brand' }}</a>
                                                </div>
                                                <h4>
                                                    <a href="{{route('singleProduct.index', ['id'=>$product->id])}}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="#"><i class="lni-user"></i> {{ $product->user->name ?? 'Owner' }}</a>
                                                    </span>
                                                    <span>
                                                        <a href="#"><i class="lni-map-marker"></i> {{ $product->location ?? 'Location' }}</a>
                                                    </span>
                                                    <span>
                                                        <a href="#"><i class="lni-tag"></i> {{ $product->category->name ?? 'Category' }}</a>
                                                    </span>
                                                </div>
                                                <p class="dsc">
                                                    {{ Str::limit($product->description, 100, '...') }}
                                                </p>
                                                <div class="listing-bottom">
                                                    <h3 class="price float-left">
                                                        {{$product->price_per_day}}
                                                    </h3>
                                                    <a
                                                        href="{{route('singleProduct.index', ['id'=>$product->id])}}"
                                                        class="btn btn-common float-right"
                                                    >
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="pagination-bar">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link active" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

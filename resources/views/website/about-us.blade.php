@extends('website.layout')
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- about wrapper start -->
    <div class="about-us-wrapper pt-60 pb-40">
        <div class="container">
            <div class="row">
                <!-- About Text Start -->
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="about-text-wrap">
                        <h2>{{ $settings->title }}</h2>
                        <p>{{ $settings->description }}</p>
                    </div>
                </div>
                <!-- About Text End -->
                <!-- About Image Start -->
                <div class="col-lg-5 col-md-10">
                    <div class="about-image-wrap">
                        <img class="img-full" src="{{ asset('images/settings/' . $settings->image) }}" alt="About Us" />
                    </div>
                </div>
                <!-- About Image End -->
            </div>
        </div>
    </div>
    <!-- about wrapper end -->
    <!-- Begin Counterup Area -->
    <div class="counterup-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                @foreach ($statistics as $statistic)
                    <div class="col-lg-3 col-md-6">
                        <!-- Begin Limupa Counter Area -->
                        <div class="limupa-counter white-smoke-bg">
                            <div class="container">
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter text-warning">{{ $statistic->counter }}</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>{{ $statistic->title }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- limupa Counter Area End Here -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Counterup Area End Here -->
    <!-- team area wrapper start -->
    <div class="team-area pt-60 pt-sm-44">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="li-section-title capitalize mb-25">
                        <h2><span>our team</span></h2>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                        <div class="team-thumb">
                            <img src="{{ asset('images/team/4.png') }}" alt="Our Team Member">
                        </div>
                        <div class="team-content text-center">
                            <h3>Jonathan Scott</h3>
                            <p>IT Expert</p>
                            <a href="#">info@example.com</a>
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end single team member -->

            </div>
        </div>
    </div>
    <!-- team area wrapper end -->
@endsection

@extends("layouts.app")

@section('title')
<title>{{$page['page_name']}} - {{$info['company_name']}}</title>
@endsection('title')

@section('main')

<div class="hero" id="active">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">{{$page->header_text}}</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
        <p>{{$page->sub_text}} </p>
        <div>
            <a href="#requestQuote" class="btn primary_bg text-white wow fadeIn" data-wow-duration="2s" data-wow-delay=".4s">Get a Quote Now</a>
        </div>
    </div>
</div>
</div>


<section class="about">
    <div class="container">
        <div class="section_title">
            <h3>About Top Class Carpets</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>Who we are</p>
        </div>

        <div class="section_content">
            <div class="row">
                <div class="col-md-6">
                    <h3>{{$aboutPage->about_heading}}</h3>
                    <div class="divider"></div>
                    <div class="about_us_content">
                        {!! $aboutPage->about_us !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_home_carousel">
                        @foreach ($slides as $slide)
                        <div class="item">
                            <img src="{{env('APP_CDN')}}/{{$slide->image}}" class="img-fluid w-100" alt="" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<section class="services">
    <div class="container">
        <div class="section_title">
            <h3>We sell all types of quality Flooring Materials</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>To many clients like homes and offices</p>
        </div>

        <!-- Rugs, Vinyl Sheet, Vinyl Tile, Carpet, Laminate, Hardwood,  -->
        <div class="section_content mt-3">
            <div class="row gy-3">
                @foreach ($services as $service)
                <div class="col-md-4 col-sm-6 wow swing" data-wow-delay="0.2s" data-wow-duration="1s">
                    <div class="service_block">
                        <img src="{{env('APP_CDN')}}/{{$service->image}}" class="img-fluid w-100" alt="">
                        <div class="content">
                            <a href="/collections/{{$service->title}}">
                                <h4>{{$service->title}}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- 
        <div class="section_footer my-5">
            <div class="text-center">
                <a href="/collections" class="btn btn-default secondary_color bg-lg">View Collections</a>
            </div>
        </div> -->
    </div>
</section>


<section class="collections">
    <div class="container">
        <div class="section_title">
            <h3>Our Collections</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>Our products are available in a different sizes and styles.</p>
        </div>
    </div>


    <div class="section_content">
        <div class="container">

            <div class="row section_controls">
                <div class="col-12">
                    <ul class="filter-button-groups">
                        <li class="btn active" data-filter="">
                            All
                        </li>
                        @foreach ($services as $service)
                        <li class="btn" data-filter=".{{$service->id}}">
                            {{$service->title}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row gy-3 collections_grid">
                @foreach ($collections as $collection)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 item {{$collection->Service->id}}">
                    <div class="collection_block">
                        <div class="collection_image">
                            <img src="{{env('APP_CDN')}}/{{$collection->image}}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="collection_content"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>



@endsection('main')


@section('scripts')
<script>
    // <!-- on button click -->
    $grid = $(".collections_grid");

    $('.filter-button-groups').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value

        $grid.children(".item").hide(100)
        $grid.children(filterValue).show(100)

    });
    // change active button class on buttons
    $('.filter-button-groups').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'li', function() {
            $buttonGroup.find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection
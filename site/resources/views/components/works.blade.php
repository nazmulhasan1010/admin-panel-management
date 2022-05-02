<section id="works" class="works section no-padding">
    <h3 class="heading-text">demo template </h3>
    <div class="container-fluid">
        <div class="row">
            @foreach($templetes as $templetes)
                            <div class="col-lg-3 col-md-6 col-sm-6 work ">
                    <a href="{{url($templetes->img_link)}}" class="work-box">
                        <img src="{{url($templetes->img_link)}}" alt="" class="work-image">
                        <div class="overlay-hover"></div>
                        <div class="overlay">
                            <div class="overlay-caption">
                                <h5>{{$templetes->project_name}}</h5>
                                <p>{{$templetes->category}}</p>
                                <h5>{{$templetes->designer}}</h5>
                            </div>
                        </div><!-- overlay -->
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section><!-- works -->

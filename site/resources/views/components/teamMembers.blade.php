<section id="teams" class="section teams">
    <h3 class="heading-text">TEAM MEMBERS </h3>
    <div class="container">
        <div class="row">
            @foreach($teams as $teams)
                <div class="col-md-3 col-sm-6">
                    <div class="person">
                        <img src="{{url($teams->image)}}" alt="" class="img-responsive">
                        <div class="person-content">
                            <h4>{{$teams->name}}</h4>
                            <h5 class="role">{{$teams->title}}</h5>
                            <p>{{$teams->descryption}}</p>
                        </div>
                        <ul class="social-icons clearfix">
                        <li><a href="{{url($teams->facebook)}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="{{url($teams->twitter)}}"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="{{url($teams->linkedin)}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="{{url($teams->google)}}"><i class="fa-brands fa-google-plus-g"></i></a></li>
                        <li><a href="{{url($teams->dribble)}}"><i class="fa-brands fa-dribbble"></i></a></li>

                        </ul>
                    </div><!-- person -->
                </div>
            @endforeach
        </div>
    </div>
</section><!-- teams -->

<h3 class="heading-text">testimonials </h3>
<section id="testimonials" class="section testimonials no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($testomonials as $testomonials)
                        <li>
                            <div class="col-md-6">
                                <div class="avatar">
                                    <img src="{{url($testomonials->image)}}" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <blockquote>
                                    <p>
                                        {{$testomonials->saying}}
                                    </p>
                                    <cite class="author">{{$testomonials->author}}</cite>
                                </blockquote>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div><!-- flexslider -->
        </div>
    </div>
</section><!-- testimonials -->

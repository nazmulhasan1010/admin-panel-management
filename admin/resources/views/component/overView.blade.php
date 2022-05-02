<div class="content-bord">
    <div class="row">
        <div class="col-md-4">
            <a href="{{url('visitor')}}" class="text-black text-decoration-none">
                <div class="card card-hover" style="width: 90%;">
                    <div class="card-body">
                        <h5 class="card-title">Total Visitors</h5>
                        <p class="card-text">{{$totalVisitor}}</p>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{url('works')}}" class="text-black text-decoration-none ">
                <div class="card card-hover" style="width: 90%;">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text">{{$totalPost}}</p>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="" class=" text-black text-decoration-none">
                <div class="card card-hover" style="width: 90%;">
                    <div class="card-body">
                        <h5 class="card-title">Total Members</h5>
                        <p class="card-text">{{$totalMember}}</p>

                    </div>
                </div>
            </a>
        </div>
    </div>

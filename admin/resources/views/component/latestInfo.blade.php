<div class="row">
    <div class="col-md-4 ">
        <div class="table-box">
            <table class="table table-dark table-hover">
                <p class="table-head-text">New Visitor</p>
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($newVisitor as $newVisitor)
                    <tr>
                        <th scope="row">{{$newVisitor->id}}</th>
                        <td>{{$newVisitor->ip}}</td>
                        <td>{{$newVisitor->date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-4 ">
        <div class="table-box">
            <table class="table table-dark table-hover">
                <p class="table-head-text">New Posts</p>
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Designer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($newPosts as $newPosts)
                    <tr>
                        <th scope="row">{{$newPosts->id}}</th>
                        <td>{{$newPosts->project_name}}</td>
                        <td>{{$newPosts->designer}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-4">
        <div class="table-box">
            <table class="table table-dark table-hover">
                <p class="table-head-text">New Members</p>
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Skill</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($newMembers as $newMembers)--}}
{{--                    <tr>--}}
{{--                        <th scope="row">{{$newMembers->id}}</th>--}}
{{--                        <td>{{$newMembers->name}}</td>--}}
{{--                        <td>{{$newMembers->title}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Thornton</td>
                    <td>009i87660r</td>
                </tr>
                </tbody>
            </table>

        </div>

    </div>
</div>
</div>

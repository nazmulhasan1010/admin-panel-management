<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark side-bar">
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none side-top">
        <div class="side-top-itm">
            <a href="" class="text-white text-decoration-none"><span class="fs-4">ADMIN panel</span></a>
        </div>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item ">
            <a href="{{url('home')}}" class="nav-link active" aria-current="page">
                <i class="fa-solid fa-house"></i>
                <div class="menu-item-texts">Home</div>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('visitor')}}" class="nav-link  position-relative">
                <i class="fa-solid fa-users"></i>
                <div class="menu-item-texts">visitors</div>
                <span class="badge bg-secondary newvisitor"></span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('works')}}" class="nav-link">
                <i class="fa-solid fa-house-laptop"></i>
                <div class="menu-item-texts">works</div>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('team')}}" class="nav-link">
                <i class="fa-solid fa-people-group"></i>
                <div class="menu-item-texts">team members</div>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('testminal')}}" class="nav-link">
                <i class="fa-solid fa-book"></i>
                <div class="menu-item-texts">testomonials</div>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link position-relative">
                <i class="fa-solid fa-message"></i>
                <div class="menu-item-texts">inbox</div>
                <span class="badge bg-secondary">4</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle "
           id="profileLinkHead" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{url(session()->get('userMail')['profile'])}}" id="profilePicHead" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{session()->get('userMail')['fName'].' '.session()->get('userMail')['lName']}}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" id="signOut">Sign out</a></li>
        </ul>
    </div>
</div><!-- #side bar -->

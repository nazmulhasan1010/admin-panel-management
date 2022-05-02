@extends('layers.main')
@section('title','Home')
@section('content')
    @include('component.contentNav')
    <div class="content-bord">
        <div class="btn btn-primary" id="member-add">Add New</div> {{-- add button--}}
        {{-- posts table--}}
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="member-data">

            </tbody>
        </table>{{-- end posts table--}}
    </div>
    {{-- upload modal--}}
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add member</h5>
                    <button type="button" class="btn-close btn-close-memberModal" data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadPostModal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="input">Member name</label>
                                    <input type="text" class="form-control" id="memberName"
                                           placeholder="Enter member name">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Title</label>
                                    <input type="text" class="form-control" id="memberTitle" placeholder="Title">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Descryption</label>
                                    <input type="text" class="form-control" id="memberDescryption"
                                           placeholder="Descryption">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Facebook link</label>
                                    <input type="text" class="form-control" id="memberFacebook"
                                           placeholder="Facebook">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="input">Twitter link</label>
                                    <input type="text" class="form-control" id="memberTwitter"
                                           placeholder="Twitter">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input"> Linkedin link</label>
                                    <input type="text" class="form-control" id="memberLinkedin"
                                           placeholder="Linkedin">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input"> Google</label>
                                    <input type="text" class="form-control" id="memberGoogle"
                                           placeholder="Google">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Dribble link</label>
                                    <input type="text" class="form-control" id="memberDribble"
                                           placeholder="Dribble">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input">Attachment photo</label>
                            <input type="file" class="form-control" id="memberProfileAttachment">
                        </div>
                        <div class="preview-img"><img src="" id="memberProfileImgPreview" class="imgpreview" alt="">
                        </div>
                        <button class="btn btn-block btn-primary mt-2 memberUpload-btn">Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>{{--  end upload modal--}}

    {{--    edit modal--}}
    <div class="modal fade" id="memberEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add member</h5>
                    <button type="button" class="btn-close btn-close-memberEditModal" data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadPostModal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="input">Member name</label>
                                    <input type="text" class="form-control" id="memberEditName"
                                           placeholder="Enter member name">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Title</label>
                                    <input type="text" class="form-control" id="memberEditTitle" placeholder="Title">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Descryption</label>
                                    <input type="text" class="form-control" id="memberEditDescryption"
                                           placeholder="Descryption">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Facebook link</label>
                                    <input type="text" class="form-control" id="memberEditFacebook"
                                           placeholder="Facebook">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="input">Twitter link</label>
                                    <input type="text" class="form-control" id="memberEditTwitter"
                                           placeholder="Twitter">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input"> Linkedin link</label>
                                    <input type="text" class="form-control" id="memberEditLinkedin"
                                           placeholder="Linkedin">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input"> Google</label>
                                    <input type="text" class="form-control" id="memberEditGoogle"
                                           placeholder="Google">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="input">Dribble link</label>
                                    <input type="text" class="form-control" id="memberEditDribble"
                                           placeholder="Dribble">
                                    <input type="hidden" id="memberEditId">
                                    <input type="hidden" id="memberEditOldProfileLink">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input">Attachment photo</label>
                            <input type="file" class="form-control" id="memberProfileEditAttachment">
                        </div>
                        <div class="preview-img"><img src="" id="memberProfileEditImgPreview" class="imgpreview" alt="">
                        </div>
                        <button class="btn btn-block btn-primary mt-2 memberEditUpload-btn" id="memberEditBtn">Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    delete modal--}}
    <div class="modal fade" id="memberInfoDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete member information</h5>
                </div>
                <div class="modal-body">
                    Are you sure? Delete the member information?
                    <div class="delete-member-id d-none"></div>
                    <div class="delete-profile-link d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary memberDeleteCanBtn">Cancel</button>
                    <button type="button" class="btn btn-danger memberDeleteConfBtn">Delete</button>
                </div>
            </div>
        </div>
    </div> {{-- end delete modal--}}
    {{--    notification--}}
    <div class="toast align-items-center text-white  border-0 " role="alert" aria-live="assertive"
         aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">

            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" ta-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
@endsection


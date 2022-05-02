@extends('layers.main')
@section('title','Posts')
@section('content')
    @include('component.contentNav')
    <div class="content-bord">
        <div class="btn btn-primary" id="work-add">Add New</div> {{-- add button--}}
        {{-- posts table--}}
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Designer</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="posts-data">

            </tbody>
        </table>{{-- end posts table--}}
    </div>

    {{-- upload modal--}}
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a post</h5>
                    <button type="button" class="btn-close btn-close-inputmodal" data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadPostModal">
                        <div class="form-group mt-3">
                            <label for="input">Project name</label>
                            <input type="text" class="form-control" id="projecTname" placeholder="Enter project name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Catagory</label>
                            <input type="text" class="form-control" id="projecTcatagory" placeholder="Category">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Designer</label>
                            <input type="text" class="form-control" id="projecTdesigner" placeholder="Designer">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Attachment photo</label>
                            <input type="file" class="form-control" id="projecTattachment">
                        </div>
                        <div class="preview-img"><img src="" id="imgpreview" class="imgpreview" alt=""></div>

                        <button class="btn btn-block btn-primary mt-3 upload-btn">Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>{{--  end upload modal--}}

    {{--    delete modal--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                </div>
                <div class="modal-body">
                    Are you sure? Delete this post?
                    <div class="delete-id d-none"></div>
                    <div class="delete-link d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary deleteCanfBtn">Cancel</button>
                    <button type="button" class="btn btn-danger deleteConfBtn">Delete</button>
                </div>
            </div>
        </div>
    </div> {{-- end delete modal--}}

    {{--    edit modal--}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                </div>
                <div class="modal-body">
                    <div class="edit-id d-none"></div>
                    <form>
                        <div class="form-group mt-3">
                            <label for="input">Project name</label>
                            <input type="text" class="form-control" id="projecTnameUp" placeholder="Enter project name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Catagory</label>
                            <input type="text" class="form-control" id="projecTcatagoryUp" placeholder="Category">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">designer</label>
                            <input type="text" class="form-control" id="projecTdesignerUp" placeholder="Designer">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Attachment photo</label>
                            <input type="file" class="form-control" id="projecTattachmentUp">
                            <input type="hidden" id="uniqueid">
                            <input type="hidden" id="oldprofilelink">
                            <input type="hidden" id="seralid">
                        </div>
                        <div class="preview-img"><img src="" id="imgpreviewup" alt="" class="imgpreview"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary editCanButton">Cancel</button>
                    <button type="button" class="btn btn-primary editConButton">Update</button>
                </div>
            </div>
        </div>
    </div>{{--  end  edit modal--}}

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


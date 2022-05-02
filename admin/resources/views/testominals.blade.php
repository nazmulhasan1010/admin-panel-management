@extends('layers.main')
@section('title','Home')
@section('content')
    @include('component.contentNav')
    <div class="content-bord">
        <div class="btn btn-primary" id="testimonials-post-add">Add New</div> {{-- add button--}}
        {{-- posts table--}}
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Saying</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="testimonials-posts-data">

            </tbody>
        </table>{{-- end posts table--}}
    </div>

    {{-- upload modal--}}
    <div class="modal fade" id="testMonialPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a testimonials post</h5>
                    <button type="button" class="btn-close btn-close-testInputModal" data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadTestimonialsPostModal">
                        <div class="form-group mt-3">
                            <label for="input">Author name</label>
                            <input type="text" class="form-control" id="authorName" placeholder="Enter author name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Saying</label>
                            <input type="text" class="form-control" id="authorSaying" placeholder="Saying">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Author profile</label>
                            <input type="file" class="form-control" id="authorProfileAttachment">
                        </div>
                        <div class="preview-img"><img src="" id="authorImgPreView" class="imgpreview" alt=""></div>

                        <button class="btn btn-block btn-primary mt-3 author-upload-btn">Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>{{--  end upload modal--}}

    {{--    delete modal--}}
    <div class="modal fade" id="testimonialsDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete testimonials post</h5>
                </div>
                <div class="modal-body">
                    Are you sure? Delete this testimonials post?
                    <div class="test-delete-id d-none"></div>
                    <div class="test-delete-link d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary testDeleteCanBtn">Cancel</button>
                    <button type="button" class="btn btn-danger testDeleteConfBtn">Delete</button>
                </div>
            </div>
        </div>
    </div> {{-- end delete modal--}}

    {{-- upload modal--}}
    <div class="modal fade" id="testMinialUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Testimonials post update</h5>
                    <button type="button" class="btn-close btn-close-testUpdateModal" data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadTestimonialsPostModal">
                        <div class="form-group mt-3">
                            <label for="input">Author name</label>
                            <input type="text" class="form-control" id="updateAuthorName"
                                   placeholder="Enter author name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Saying</label>
                            <input type="text" class="form-control" id="updateAuthorSaying" placeholder="Saying">
                            <input type="hidden" id="testOldProfile">
                            <input type="hidden" id="testDelId">
                        </div>
                        <div class="form-group mt-3">
                            <label for="input">Author profile</label>
                            <input type="file" class="form-control" id="updateAuthorProfileAttachment">
                        </div>
                        <div class="preview-img"><img src="" id="updateAuthorImgPreView" class="imgpreview" alt="">
                        </div>

                        <button class="btn btn-block btn-primary mt-3 author-upload-btn">Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>{{--  end upload modal--}}

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


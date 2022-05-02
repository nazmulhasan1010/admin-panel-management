@extends('layers.main')
@section('title','Home')
@section('content')
    @include('component.contentNav')
    <div class="content-bord">
        <table class="table table-dark table-hover visitor-table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ip</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="visitor-data">

            </tbody>
        </table>{{-- end posts table--}}
    </div>

    {{--    delete modal--}}
    <div class="modal fade" id="visitorDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Visitor Data</h5>
                </div>
                <div class="modal-body">
                    Are you sure? Delete the visitor data?
                    <div class="visitorDelete-id d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary visitorDeleteCanfBtn">Cancel</button>
                    <button type="button" class="btn btn-danger visitorDeleteConfBtn">Delete</button>
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

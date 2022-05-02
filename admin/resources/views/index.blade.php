@extends('layers.main')
@section('title','Home')
@section('content')
    @include('component.contentNav')
    @include('component.overView')
    @include('component.latestInfo')

@endsection

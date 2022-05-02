@extends('main.main')
@section('title','home')
@section('content')
    @include('components.homeBanner')
    @include('components.features')
    @include('components.works')
    @include('components.teamMembers')
    @include('components.testimonials')
    @include('components.contact')



@endsection
@section('script')

    <script>

    </script>
@endsection

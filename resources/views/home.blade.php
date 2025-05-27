{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
@include('sections.hero')
@include('sections.gallery')
@include('sections.reviews')
@include('sections.contact')
@include('partials.modals.create')
@include('partials.modals.edit')
@endsection
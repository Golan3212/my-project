
@extends('layouts.admin')
@section('title') Main @parent @stop
@section('content')

    <h2>Admin features</h2>

    <x-alert type="info" message="info message"></x-alert>
    <x-alert type="danger" message="danger message"></x-alert>
    <x-alert type="warning" message="warning message"></x-alert>



@endsection

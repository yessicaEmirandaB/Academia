@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/Maestro') }}" method="post" enctype="multipart/form-data">

    @csrf
    @include('Maestro.form',['modo'=>'Crear']);

    </form>
</div>
@endsection
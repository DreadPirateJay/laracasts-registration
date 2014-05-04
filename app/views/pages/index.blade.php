@extends('layouts/master')

@section('content')

  <div class="starter-template">
    <h1>{{ Auth::check() ? "Welcome, " . Auth::user()->username : "Why don't you sign up?" }}</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, dicta, sint quam hic officia numquam natus nulla magnam. Nostrum excepturi odit provident tenetur non dolor aperiam quo suscipit. Amet, quae.</p>
  </div>

@stop
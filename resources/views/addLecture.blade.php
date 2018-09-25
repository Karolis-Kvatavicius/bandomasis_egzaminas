@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sveiki, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Paskaitos</h1>
                    <form action="{{route('addLecture')}}" method="post">
                        @csrf
                        <h3>Nauja Paskaita</h3>
                        <label for="name">Pavadinimas</label><br>
                        <input type="text" name="name" value="{{ old('name') }}"><br><br>
                        <label for="description">Aprašymas</label><br>
                        <input type="text" name="description" value="{{ old('description') }}"><br><br>
                        <input class="add" type="submit" name="submit" value="Pridėti paskaitą"><br>
                    </form><br>
                    <ul>
                    @foreach ($lectures as $lecture)
                      <li>{{$lecture->name}}</li>
                      <div>{{$lecture->description}}</div>
                      <a href="{{route('deleteLecture', $lecture-> id)}}">Ištrinti</a><br><br>  
                    @endforeach
                    </ul>
                    <a href="{{route('home')}}">Grįžti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
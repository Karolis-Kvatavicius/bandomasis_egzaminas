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

                    <h1>{{$student->name}} {{$student->surname}}</h1>
                    <form action="{{route('updateStudent', $student-> id)}}" method="post">
                        @csrf
                        <h3>Redaguoti studentą</h3>
                        <label for="name">Vardas</label><br>
                        <input type="text" name="name" value="{{$student->name}}"><br><br>
                        <label for="surname">Pavardė</label><br>
                        <input type="text" name="surname" value="{{$student->surname}}"><br><br>
                        <label for="email">El. paštas</label><br>
                        <input type="text" name="email" value="{{$student->email}}"><br><br>
                        <label for="phone">Telefono numeris</label><br>
                        <input type="number" name="phone" value="{{$student->phone}}"><br><br>
                        <input class="add" type="submit" name="submit" value="Redaguoti studentą"><br>
                    </form><br>
                    <a href="{{route('addStudent')}}">Grįžti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
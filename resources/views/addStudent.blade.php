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

                    <h1>Studentai</h1>
                    <form action="{{route('addStudent')}}" method="post">
                        @csrf
                        <h3>Įvesti studentą</h3>
                        <label for="name">Vardas</label><br>
                        <input type="text" name="name" value="{{ old('name') }}"><br><br>
                        <label for="surname">Pavardė</label><br>
                        <input type="text" name="surname" value="{{ old('surname') }}"><br><br>
                        <label for="email">El. paštas</label><br>
                        <input type="text" name="email" value="{{ old('email') }}"><br><br>
                        <label for="phone">Telefono numeris</label><br>
                        <input type="number" name="phone" value="{{ old('phone') }}"><br><br>
                        <input class="add" type="submit" name="submit" value="Įvesti studentą"><br>
                    </form><br>
                    <ul>
                    @foreach ($students as $student)
                      <li>{{$student->name}} {{$student->surname}}</li>
                      <div>{{$student->email}}</div>
                      <div>{{$student->phone}}</div>
                      <a href="{{route('studentGrades', $student-> id)}}">Peržiūrėti pažymius</a><br> 
                      <a href="{{route('editStudent', $student-> id)}}">Redaguoti įrašą</a><br>
                      <a href="{{route('deleteStudent', $student-> id)}}">Ištrinti</a><br><br>   
                    @endforeach
                    </ul>
                    <a href="{{route('home')}}">Grįžti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
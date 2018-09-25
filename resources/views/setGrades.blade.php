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

                    <h1>Pažymiai</h1>
                    <form action="{{route('setGrades')}}" method="post">
                        @csrf
                        <h3>Įvesti pažymį</h3>
                        <label for="lecture">Paskaita</label><br>
                        <select name="lecture" id="">
                            @foreach ($lectures as $lecture)
                                <option value="{{$lecture->id}}">{{$lecture->name}}</option>
                            @endforeach
                        </select><br><br>
                        <label for="student">Studentas</label><br>
                        <select name="student" id="">
                            @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->surname}} {{$student->name}}</option>
                            @endforeach
                        </select><br><br>
                        <label for="grade">Pažymys</label><br>
                        <input type="number" name="grade" value="{{ old('grade') }}"><br><br>
                        <input type="submit" name="submit" value="Įrašyti pažymį"><br><br>
                    </form><br>
                    <ul>
                        @foreach ($grades as $grade)
                        <li>{{$grade->student->name}} {{$grade->student->surname}}</li>
                        <div>Paskaita: {{$grade->lecture->name}}</div>
                        <div>Pažymys: {{$grade->grade}}</div><br><br>
                        @endforeach
                    </ul>
                    <a href="{{route('home')}}">Grįžti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
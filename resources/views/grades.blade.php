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

                    <h1>Studento {{$student->name}} {{$student->surname}} pažymiai</h1>
                    <table style="border: 1px solid black;">
                            <tr style="border: 1px solid black;">
                              <th style="border: 1px solid black; text-align: center;">Paskaitos pavadinimas</th>
                              <th style="border: 1px solid black; text-align: center;">Pažymys</th> 
                            </tr>
                    @foreach ($grades as $grade)
                            <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;">{{$grade->lecture->name}}</td>
                              <td style="border: 1px solid black; text-align: center;">{{$grade->grade}}</td>
                            </tr>
                    @endforeach
                    </table><br>
                    <a href="{{route('addStudent')}}">Grįžti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
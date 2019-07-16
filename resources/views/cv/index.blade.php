@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if(session()->has('saved'))
        <div class="alert alert-success">
        {{session()->get('saved')}}
        </div>
        @endif
        <h1>Liste de mes cv</h1>
        <div class="pull-right">
        <a href="{{url('cvs/create')}}" class="btn btn-success">Nouveau cv</a>
        </div>
        <table class="table">
            <head>
                <tr>
                    <th>Title</th>
                    <th>Presentation</th>
                    <th>Birth Date</th>
                    <th>Age</th>
                    <th>Jobs</th>
                    <th>Salary</th>
                    <th>Method Of Payment</th>
                    <th>Date creation de cv </th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
            @foreach($cvs as $cv)
                <tr>
                    <td>{{$cv->titre}}</td>
                    <td>{{$cv->presentation}}</td>
                    <td>{{$cv->birthDate}}</td>
                    <td>{{$cv->age}}</td>
                    <td>{{$cv->jobs}}</td>
                    <td>{{$cv->salary}}</td>
                    <td>{{$cv->methodOfPayment}}</td>
                    <td>{{$cv->created_at}}</td>
                    <td>
                    
                    <form action="{{url('cvs/'.$cv->id)}}" method="post">

                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div style="display: flex";>
                        <div><a href="" class="btn btn-primary">Details</a></div>
                        <div><a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Editer</a></div>
                        <div><button type="submit" class="btn btn-danger">Supprimer</button></div>
                    </div>
                    </form>
                    
                    </td>
                </tr>
                @endforeach
            </body>
        </table>
        </div>
    </div>
</div>
@endsection
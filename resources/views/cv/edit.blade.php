@extends('layouts.app')
@section('content')

<!-----@if(count($errors))
<div class="alert alert-danger" role="alert">
<ul>
   @foreach($errors->all() as $message)
    <li>{{$message}}</li>
    @endforeach
</ul>
</div>
@endif ----->

<!-----.container>.row>.col-md-12-----><!----Emmet---------->
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <!--------        form>.form-group>label+input.form-control--------><!----Emmet---------->
        <form action="{{url('cvs/'.$cv->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}} <!----app key genere token----->
            <div class="form-group @if($errors->get('titre')) has-error @endif">
            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{$cv->titre}}">
            <ul>
             @foreach($errors->get('titre') as $message)
             <li>{{$message}}</li>
             @endforeach
             </ul>
            </div>
            
            <div class="form-group @if($errors->get('presentation')) has-error @endif">
            <label for="">Presentation</label>
            <textarea name="presentation" class="form-control" >{{$cv->presentation}}</textarea>
            <ul>
             @foreach($errors->get('presentation') as $message)
             <li>{{$message}}</li>
             @endforeach
             </ul>
            </div>

            <!-------<div class="form-group">
            <label for="">Date publication</label>
            <input type="text" name="datepublich" class="form-control">
            </div>------->

            <div class="form-group">
            <input type="submit" class="form-control btn btn-danger" value="modifier">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
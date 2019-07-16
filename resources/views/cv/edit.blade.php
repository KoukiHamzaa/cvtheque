@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <!--------        form>.form-group>label+input.form-control--------><!----Emmet---------->
        <form action="{{url('cvs/'.$cv->id)}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}} <!----app key genere token----->
            <div class="form-group @if($errors->get('titre')) has-error @endif">
            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{$cv->titre}}" required>
            <ul>
             @foreach($errors->get('titre') as $message)
             <li>{{$message}}</li>
             @endforeach
             </ul>
            </div>
            <!----------------------->
            <div class="form-group @if($errors->get('presentation')) has-error @endif">
            <label for="">Presentation</label>
            <textarea name="presentation" class="form-control" required>{{$cv->presentation}}</textarea>
            <ul>
             @foreach($errors->get('presentation') as $message)
             <li>{{$message}}</li>
             @endforeach
             </ul>
            </div>
            <!----------------------->
            <div class="form-group @if($errors->get('birthDate')) has-error @endif">
            <label for="">Date de naissance</label>
             <input type="date" name="birthDate" value="{{$cv->birthDate}}">
            <ul>
             @foreach($errors->get('birthDate') as $message)
             <li>{{$message}}</li>
             @endforeach
             </ul>
            </div>
            <!----------------------->
            <div class="form-group @if($errors->get('age')) has-error @endif">
                   <label for="">sélection de l'age</label>
                    <select class="form-control" name ="age" value="{{$cv->age}}" >
                      <option <?php if($cv->age == "10-20") echo "SELECTED";?>>10-20</option>
                      <option <?php if($cv->age == "20-30") echo "SELECTED";?>>20-30</option>
                      <option <?php if($cv->age == "30-35") echo "SELECTED";?>>30-35</option>
                      <option <?php if($cv->age == "35-60") echo "SELECTED";?>>35-60</option>
                    </select>
					<ul>
					 @foreach($errors->get('age') as $message)
					 <li>{{$message}}</li>
					 @endforeach
					 </ul>
					</div>
            <!----------------------->
            <br>
			<div class="form-group @if($errors->get('age')) has-error @endif">
                 <label for="">Comment vous décririez-vous? (Click sur shift pour  sélectionner plusieurs):</label>
              <select multiple class="form-control"  name="jobs[]" required>
                <option value="passionné" <?php if(in_array ( "passionné", $exploidJobs ) ){echo'selected';} ;  ?>>Je suis passionné par mon travail.</option>
                <option value="ambitieux"  <?php if(in_array ( "ambitieux", $exploidJobs )) {echo'selected';}  ?>>Je suis ambitieux et motivé.</option>
                <option value="organisé" <?php if(in_array ( "organisé", $exploidJobs ) ){echo'selected'; }  ?>>Je suis très organisé.</option>
                <option value="humaine" <?php if(in_array ( "humaine", $exploidJobs )  ){ echo'selected';}  ?>>Je suis une personne humaine.</option>
                <option  value="naturel" <?php if(in_array ( "naturel", $exploidJobs ) ) {echo'selected';} ?>>Je suis un leader naturel.</option>
              </select>
					<ul>
					 @foreach($errors->get('age') as $message)
					 <li>{{$message}}</li>
					 @endforeach
					 </ul>
					</div>
            <!----------------------->
            <div class="form-group @if($errors->get('salary')) has-error @endif">
             <h2>sélectionner vous salaire</h2>
                  <label class="radio-inline">
                  <input type="radio" name="salary" value="2000-3000£"  <?php if($cv->salary== "2000-3000£") echo "checked";?> >2000-3000£
                </label>
                <label class="radio-inline">
                  <input type="radio" name="salary"value="3000-5000£"  <?php if($cv->salary== "3000-5000£") echo "checked";?>>3000-5000£
                </label>
                <label class="radio-inline">
                  <input type="radio" name="salary" value="7000£ plus"  <?php if($cv->salary== "7000£ plus") echo "checked";?>>7000£ plus
                </label>
            <ul>
             @foreach($errors->get('salary') as $messsalary)
             <li>{{$messsalary}}</li>
             @endforeach
             </ul>
            </div>
            <!----------------------->
			<div class="form-group @if($errors->get('methodOfPayment')) has-error @endif">
            <label for="">methodOfPayment</label>
               <h2>sélectionner vous méthode de paiement </h2>
                <input type="checkbox" name="methodOfPayment[]" value="visaCard" <?php if(in_array ( "visaCard", $exploidMethodOfPayment ) ){echo'checked';} ;  ?>> visa card<br>
                <input type="checkbox" name="methodOfPayment[]" value="cashMoney"  <?php if(in_array ( "cashMoney", $exploidMethodOfPayment ) ){echo'checked';} ;  ?>> cash money <br>
                <input type="checkbox" name="methodOfPayment[]" value="loyaltyCard"  <?php if(in_array ( "loyaltyCard", $exploidMethodOfPayment ) ){echo'checked';} ;  ?>>loyalty card<br><br>
            <ul>
             @foreach($errors->get('methodOfPayment') as $messmethodOfPayment)
             <li>{{$messmethodOfPayment}}</li>
             @endforeach
             </ul>
            </div>
            <!----------------------->
            <div class="form-group">
            <input type="submit" class="form-control btn btn-danger" value="modifier">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
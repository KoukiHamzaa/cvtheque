        @extends('layouts.app')
        @section('content')
        <!-----.container>.row>.col-md-12-----><!----Emmet---------->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <!-------- form>.form-group>label+input.form-control--------><!----Emmet---------->
                <form action="{{url('cvs')}}" method="post">
                {{csrf_field()}} <!----app key genere token----->
                    <div class="form-group @if($errors->get('titre')) has-error @endif">
                    <label for="">Titre</label>
                    <input type="text" name="titre" class="form-control" value="{{old('titre')}}" required>
                    <ul>
                    @foreach($errors->get('titre') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                    </ul>
                    </div>
                    
                    <div class="form-group @if($errors->get('presentation')) has-error @endif">
                    <label for="">Presentation</label>
                    <textarea name="presentation" class="form-control" value="{{old('presentation')}}" required></textarea>
                    <ul>
                    @foreach($errors->get('presentation') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                    </ul>
                    </div>

                    <h2>Date de naissance</h2>
                     <!---- <input type="date" name="date"><br><br>--->
                     <input type="date" name="birthDate" value="<?php echo date("Y-m-d"); ?>" value="{{old('birthDate')}}">
                    <!------------------------------------------------>
                    <div class="form-group">
                   <label for="">sélection de l'age</label>
                    <select class="form-control" name ="age" >
                      <option>10-20</option>
                      <option>20-30</option>
                      <option>30-35</option>
                      <option>35-60</option>
                    </select>
                  <br>
                  <label for="">Comment vous décririez-vous? (Click sur shift pour  sélectionner plusieurs):</label>
                  <select multiple class="form-control"  name="jobs[]" required >
                    <option value="passionné">Je suis passionné par mon travail.</option>
                    <option value="ambitieux">Je suis ambitieux et motivé.</option>
                    <option value="organisé">Je suis très organisé.</option>
                    <option value="humaine">Je suis une personne humaine.</option>
                    <option  value="naturel">Je suis un leader naturel.</option>
                  </select>
                  <!------------------------------------------>
                  <h2>sélectionner vous salaire</h2>
                  <label class="radio-inline">
                  <input type="radio" name="salary" value="2000-3000£"checked>2000-3000£
                </label>
                <label class="radio-inline">
                  <input type="radio" name="salary"value="3000-5000£">3000-5000£
                </label>
                <label class="radio-inline">
                  <input type="radio" name="salary"value="7000£ plus">7000£ plus
                </label>
            </div>
              <!--------------------->
              <h2>sélectionner vous méthode de paiement </h2>
                <input type="checkbox" name="methodOfPayment[]" value="visaCard"> visa card<br>
                <input type="checkbox" name="methodOfPayment[]" value="cashMoney"> cash money <br>
                <input type="checkbox" name="methodOfPayment[]" value="loyaltyCard" checked>loyalty card<br><br>
                     <!---------------------> 
                    <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" value="enregistrer">
                    </div>
                </form>
                </div>
            </div>
        </div>
        @endsection
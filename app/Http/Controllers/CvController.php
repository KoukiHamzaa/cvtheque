<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use App\Http\Requests\cvRequest;

class CVController extends Controller
{   
    //lister les cvs
    public function index(){
      $listcv = Cv::all();
      return view('cv.index', ['cvs'=>$listcv]);
    }
    //afficher le formulaire de creation de cv 
    public function create(){
     return view('cv.create');
    }
    //save cv
    public function store(cvRequest $request){
      
       $cv = new Cv();
       $cv->titre = $request->input('titre');
       $cv->presentation = $request->input('presentation');
       $cv->birthDate = $request->input('birthDate');
       $cv->age = $request->input('age');
       //------------------------------------
     //  $arrJobs = $request->input('jobs[]');
       //-------------------------------
        //return $request->all();
       //print_r($_POST); die ;
    // print_r($_POST['methodOfPayment'] ) ; die() ;
    $arrJobs = $_POST['jobs'];
    $x=implode($arrJobs ,"#");
    $cv->jobs=$x;
    /*
    echo"<pre>";
    echo ($_POST['jobs']);
    die();*/
       //-------------------------------------
       $cv->salary = $request->input('salary');
       //-------------------------------------------------
       //$cv->methodOfPayment = $request->input('methodOfPayment[]');
       $arrMethodOfPayment = $request->input('methodOfPayment[]');
       $new_methodOfPayment= implode('/', $arrMethodOfPayment);
       $cv->methodOfPayment = $new_methodOfPayment;
       //------------------------------------------------------------
       $cv->save();
       session()->flash('success','le cv est bien enregestré');
       return redirect('cvs');
    }
    //permet de recupere un cv puis de le mettre dans un formulaire 
    public function edit($id){
     $cv=Cv::find($id);
     return view('cv.edit',['cv'=>$cv]);
    }
    //pemet de modifier un cv 
    public function update(cvRequest $request , $id){
        $cv = Cv::find($id);
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->birthDate = $request->input('birthDate');
       $cv->age = $request->input('age');
      /* $cv->jobs = $request->input('jobs');*/
       $cv->salary = $request->input('salary');
	   $cv->methodOfPayment = $request->input('methodOfPayment');
        $cv->save();
        return redirect('cvs');

    }
    public function destroy(Request $request , $id){
     //return $request->all();
     $cv = Cv::find($id);
     $cv->delete();
     return redirect('cvs');
    }
}

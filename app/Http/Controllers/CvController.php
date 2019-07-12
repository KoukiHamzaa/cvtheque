<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use App\Http\Requests\cvRequest;
use App\Http\Controllers\Controller;

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
    public function store(Request $request){
        //echo '<pre>'; print_r($_POST);die;
        //$cv = new Cv();
        $arrJobs = $_POST['jobs'];
        $arrJobs=implode($arrJobs ,"-");
        $arrMethodOfPayment = $_POST['methodOfPayment'];
        $arrMethodOfPayment=implode($arrMethodOfPayment ,"-");
        
        Cv::create([
            'titre' => $request->input('titre'),
            'presentation' => $request->input('presentation'),
            'birthDate' => $request->input('birthDate'),
            'age' => $request->input('age'),
            'jobs' => $arrJobs,
            'salary' => $request->input('salary'),
            'methodOfPayment' => $arrMethodOfPayment
        ]);
        return redirect('cvs');
     }
    //permet de recupere un cv puis de le mettre dans un formulaire 
    public function edit($id){
     $cv=Cv::find($id);
     $exploidJobs = $cv->jobs;
     $exploidJobs = explode("-", $exploidJobs);
    //dd ($exploidJobs) ;  die() ;
    $exploidMethodOfPayment = $cv->methodOfPayment;
    $exploidMethodOfPayment = explode("-", $exploidMethodOfPayment);
     return view('cv.edit',['cv'=>$cv,'exploidJobs'=>$exploidJobs,'exploidMethodOfPayment'=>$exploidMethodOfPayment]);
    }
    //pemet de modifier un cv 
    public function update(cvRequest $request , $id){
        $arrJobs = $_POST['jobs'];
        $arrJobs=implode($arrJobs ,"-");
        $arrMethodOfPayment = $_POST['methodOfPayment'];
        $arrMethodOfPayment=implode($arrMethodOfPayment ,"-");
        $cv = Cv::find($id);
		//*********************
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->birthDate = $request->input('birthDate');
        $cv->age = $request->input('age');
        $cv->jobs = $arrJobs;
        $cv->salary = $request->input('salary');
        $cv->methodOfPayment = $arrMethodOfPayment;
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

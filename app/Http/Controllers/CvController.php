<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use Auth;
use App\Http\Requests\cvRequest;
use App\Http\Controllers\Controller;


class CVController extends Controller
{   

  public function __construct(){
     $this->middleware('auth');
  }
    //lister les cvs
    public function index(){
      // $listcv = Cv::all();
      $listcv = Cv::where('user_id', Auth::user()->id)->get();

      return view('cv.index', ['cvs'=>$listcv]);
    }
    //afficher le formulaire de creation de cv 
    public function create(){
     return view('cv.create');
    }
    //save cv
    public function store(Request $request){
        //echo '<pre>'; print_r($_POST);die;
       // $cv = new Cv();
        // function arrJobs() {
            $arrJobs = $_POST['jobs'];
           $arrJobs=implode($arrJobs ,"-");
            //$arrJobs = (object) $arrJobs;
        //  }
        //  function arrMethodOfPayment(){
            $arrMethodOfPayment = $_POST['methodOfPayment'];
            $arrMethodOfPayment=implode($arrMethodOfPayment ,"-");
          //  $arrMethodOfPayment = (object) $arrMethodOfPayment;
            

        // }
        //echo Auth::user()->id ;die;
       Cv::create([
            'titre' => $request->input('titre'),
            'presentation' => $request->input('presentation'),
            'birthDate' => $request->input('birthDate'),
            'age' => $request->input('age'),
            'jobs' => $arrJobs,
            'salary' => $request->input('salary'),
            'methodOfPayment' => $arrMethodOfPayment,
            'user_id'=>Auth::user()->id 
        ]);
      /* $cv-> titre = $request->input('titre');
        $cv-> presentation = $request->input('presentation');
        $cv-> birthDate = $request->input('birthDate');
        $cv-> age = $request->input('age');
        $cv-> jobs = $arrJobs;
        $cv-> salary =  $request->input('salary');
        $cv-> methodOfPayment = $arrMethodOfPayment;
        $cv->save();*/
        session()->flash('saved', 'successfully saved cv');
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

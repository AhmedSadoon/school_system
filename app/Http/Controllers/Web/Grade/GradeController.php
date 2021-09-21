<?php

namespace App\Http\Controllers\Web\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;
use toastr;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(){

        $Grades=Grade::all();

        return view('pages.Grades.Grades',compact('Grades'));
    }



    public function store(StoreGradeRequest $request){

        try{

            $validator=$request->validated();

            $Grade=new Grade();

            $Grade->Name = ['en' => $request->Name_en, 'ar' =>  $request->Name];
            $Grade->Notes=$request->Notes;

            $Grade->save();

            toastr()->success('Data has been saved successfully!');

                return redirect()->route('grade.index');


        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }





    }







}

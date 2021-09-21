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


    public function update(StoreGradeRequest $request)
    {
      try {
          $validated = $request->validated();
          $Grades = Grade::findOrFail($request->id);
          $Grades->update([
            $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
            $Grades->Notes = $request->Notes,
          ]);
          toastr()->success(trans('messages.Update'));
          return redirect()->route('grade.index');
      }
      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

    }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function destroy(Request $request)
     {

       $Grades = Grade::findOrFail($request->id)->delete();
       toastr()->error(trans('messages.Delete'));
       return redirect()->route('grade.index');

     }







}

<?php


namespace App\Http\Controllers\Web\ClassRoom;

use App\Http\Controllers\Controller;
use App\Models\classroom;
use App\Models\Grade;
use Illuminate\Http\Request;





class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $My_Classes = classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $List_Classes = $request->List_Classes;

        try {



            foreach ($List_Classes as $List_Class) {

                $My_Classes = new classroom();

                $My_Classes->Name_Class = [ 'ar' => $List_Class['Name'],'en' => $List_Class['Name_class_en']];

                $My_Classes->Grade_id = $List_Class['Grade_id'];
                $My_Classes->save();

            }



            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    /*


    */


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>

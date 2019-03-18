<?php

namespace App\Http\Controllers\Student;

use App\Model\Student;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $model;
    function __construct(StudentRepository $model)
    {
        $this->model=$model;
    }

    public function index()
    {
        return response()->json($this->model->getAll());
    }

    public function getList(Request $request){
        return response()->json($this->model->customList($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //with roster_id
        $input=$request->all();

        $validator = Validator::make($input,Student::$rule);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json($this->model->create($input));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();

        $validator = Validator::make($input,Student::$rule);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json($this->model->update($id,$input));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->model->delete($id));
    }
}

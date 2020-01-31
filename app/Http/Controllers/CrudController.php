<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('home-page', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $matricole = [];
        foreach ($employees as $employee) {
            if ($employee -> matricola) {
                $matricole[] = $employee -> matricola;
            };
        }
        for ($i=0; $i < 1000; $i++) { 
            $random = rand(100, 999);

            if (!in_array($random, $matricole)) {
                $nuovaMatricola = $random;
                break;
            }
        }

        $departments = Department::all();
        $reparti = [];
        foreach ($departments as $department) {
            $reparti[] = $department['reparto'];
        }

        return view('create-employee', compact('employees', 'nuovaMatricola', 'reparti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $dati = $request -> validate([
            'matricola' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'department_id' => 'required'
        ]);
        Employee::create($dati);
        
        return redirect('/');
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
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $reparti = [];
        foreach ($departments as $department) {
            $reparti[] = $department['reparto'];
        }

        return view('edit-employee', compact('employee', 'departments', 'reparti'));
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
        $dati = $request -> validate([
            'matricola' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'department_id' => 'required'
        ]);
        Employee::whereId($id) -> update($dati);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id) -> delete();

        return redirect('/');
    }
}

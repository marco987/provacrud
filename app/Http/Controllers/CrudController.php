<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;

class CrudController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('home-page', compact('employees'));
    }

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

    public function store(Request $request)
    {
        $dati = $request -> validate([
            'matricola' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'department_id' => 'required'
        ]);
        Employee::create($dati);
        
        return redirect('/');
    }

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

    public function destroy($id)
    {
        Employee::findOrFail($id) -> delete();

        return redirect('/');
    }

    public function drawing()
    {
        
        return view('estrazione');
    }
}

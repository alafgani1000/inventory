<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class SalaryCheckController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('payroll/payroll');
    }

    public function checkDoubleData(Request $request)
    {
        $salaries = DB::connection('hris')->select('select
                nopegawai,
                id_type_income,
                count(*) as count
            from income_deductions_employee
            where id_periode = ?
            group by nopegawai, id_type_income
            having count(*) > 1',
            [$request->periode]
        );
        return response()->json($salaries);
    }

}

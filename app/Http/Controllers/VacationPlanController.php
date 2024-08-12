<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VacationPlan;
use App\Http\Requests\StoreVacationPlanRequest;
use PDF;

class VacationPlanController extends Controller
{
    
    public function index(){    
        $vacationPlans = VacationPlan::all();
        return response()->json($vacationPlans);
    }


    
    public function store(StoreVacationPlanRequest $request){
        $vacationPlan = VacationPlan::create($request->validated());
        return response()->json($vacationPlan, 201);
    }



    
    public function show($id){
         // Buscar o plano de férias pelo ID
         $vacationPlan = VacationPlan::find($id);

         // Verificar se o plano de férias foi encontrado
         if (!$vacationPlan) {
             return response()->json(['message' => 'Plano de férias não encontrado.'], 404);
         }
 
         // Retornar o plano de férias encontrado
         return response()->json($vacationPlan, 200);
    }

    
    public function update(Request $request, $id){
        $vacationPlan = VacationPlan::findOrFail($id);
        $vacationPlan->update($request->all());

        return response()->json($vacationPlan, 200);
    }

    
    public function destroy($id){
        $vacationPlan = VacationPlan::findOrFail($id);
        $vacationPlan->delete();

        return response()->json(null, 204);
    }

    public function generatePdf($id){
        // Buscar o plano de férias pelo ID
        $vacationPlan = VacationPlan::findOrFail($id);

        // Carregar a visualização do PDF e passar os dados
        $pdf = PDF::loadView('vacation_plans.pdf', compact('vacationPlan'));

        // Retornar o PDF para download
        return $pdf->download('vacation_plan.pdf');
    }
}

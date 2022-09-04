<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index() {
        //teste 
        $expenses = Expense::all();
        return view('welcome', ['expenses' => $expenses]);
    }

    public function create() {
        return view('expenses.create');
    }

    //função que recebe o post do formulário
    public function store(Request $request) {

        //cria objeto com os dados recebidos pelo request
        $expense = new Expense;
        //preenche as propriedades recebidas pelo request
        $expense->value = $request->value;
        $expense->description = $request->description;
       // $expense->type = $request->type;

        //salva os dados no banco
        $expense->save();

        //redireciona o usuário
        return redirect('/');

    }
}

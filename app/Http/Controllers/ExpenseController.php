<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    public function index() {
        //Pega os dados do banco e imprime
        $expenses = Expense::all();
        return view('welcome', ['expenses' => $expenses]);
    }

  
    public function table() {
        //Pega os dados do banco e imprime
       // $expenses = Expense::all(); //modo onde os usuários viam os gastos de todos


       //usuário ve apenas o seu próprio gastos
       $expenses = Expense::where('user_id', Auth::id())->get();

       
        
        return view('expenses.expenseTable', ['expenses' => $expenses]); 
           
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
        $expense->date = $request->date;
        $expense->description = $request->description;
        $expense->id = $request->id;
        $expense->created_at = $request->created_at;
        $expense->types = $request->types;

        //acessando id do usuário logado
        $user = auth()->user();
        $expense->user_id = $user->id;

        //salva os dados no banco
        $expense->save();

        //redireciona o usuário
        //with retorna mensagem para o usuário
        return redirect('/')->with('msg', 'Gasto Adicionado com Sucesso');

    }


   
    //identifica o id do usuário proprietário do gasto adicionado 
    //NAO FUNCIONA 
    public function show($id) {

        $expense = Expense::findOrFail($id);

        $expenseOwner = User::where('id', $expense->user_id)->first()->toArray();

        return view('expenses.expenseTable', ['expense' => $expense, 'expenseOwner' => $expenseOwner]);


    }


}

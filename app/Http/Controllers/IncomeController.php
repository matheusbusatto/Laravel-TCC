<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class IncomeController extends Controller
{

    public function index()
    {
        //Pega os dados do banco e imprime
        $incomes = Income::all();
        return view('welcome', ['incomes' => $incomes]);
    }


    public function table()
    {
        //usuário ve apenas o seu próprio gastos
        $incomes = Income::where('user_id', Auth::id())->get();



        return view('incomes.incomeTable', ['incomes' => $incomes]);
    }


    public function income()
    {
        //usuário ve apenas suas receitas
        $incomes = Income::where('id', Auth::id())->get();



        return view('incomes.income', ['income' => $incomes]);
    }


    public function create()
    {
        return view('incomes.income');
    }


    //função que recebe o post do formulário
    public function store(Request $request)
    {

        //cria objeto com os dados recebidos pelo request
        $income = new Income();
        //preenche as propriedades recebidas pelo request
        $income->value = $request->value;
        $income->date = $request->date;
        $income->description = $request->description;
        $income->id = $request->id;
        $income->created_at = $request->created_at;


        //acessando id do usuário logado
        $user = auth()->user();
        $income->user_id = $user->id;

        //salva os dados no banco
        $income->save();

        //redireciona o usuário
        //with retorna mensagem para o usuário
        return redirect('/incomes/income')->with('msg', 'Receita Adicionada com Sucesso');
    }
}

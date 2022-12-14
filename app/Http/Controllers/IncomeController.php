<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
        //usuário ve apenas suas receitas
        $incomes = Income::where('user_id', Auth::id())->get();
        $userId = Auth::id();

        //soma dos valores
        $values = DB::table('incomes')
            ->whereIn('user_id', [$userId])
            ->select('value')
            ->get();

        $total_incomes = $values->sum('value');


        return view('incomes.incomeTable', ['incomes' => $incomes, 'total_incomes' => $total_incomes]);
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
        Alert::success('Sucesso', 'Receita Adicionada');
        return redirect('/incomes/income')->with('msg', 'Receita Adicionada com Sucesso');
    }

    public function edit($id)
    {
        $income = Income::findOrFail($id);

        return view('incomes.editIncomes', ['income' =>  $income]);
    }

    public function destroy($id)
    {
        Income::findOrfail($id)->delete();
        Alert::success('Sucesso', 'Item Excluído');
        return redirect('/incomes/incomeTable');
    }


    public function update(Request $request)
    {
        Income::findOrFail($request->id)->update($request->all());
        Alert::success('Sucesso', 'Item Editado');
        return redirect('/incomes/incomeTable');
    }


    //teste

    public function sum()
    {

        $userId = Auth::id();

        $totais = DB::table('incomes')->select('value')->get();
        $total_sum = $totais->sum('value');

        $totaise = DB::table('expenses')->select('value')->get();
        $totale_sum = $totaise->sum('value');

        //teste filtro de datas

        
        
        $month = request('mes');
        $incomes_month = DB::table('incomes')
            ->whereIn('user_id', [$userId])
            ->whereMonth('date', $month)
            ->get();
           //dd($incomes_month);

            $current = Carbon::now();
         
        $incomes = DB::table('incomes')
        ->whereIn('user_id', [$userId])
        ->select('date')
        ->get();
      // dd($incomes);
       
      

   

        /** //FUNCIONA
        $incomes = DB::table('incomes')
            ->whereIn('user_id', [$userId])
            ->whereMonth('date', '10')
            ->get();
        dd($incomes);
         */









        return view('incomes.teste', ['total_sum' => $total_sum, 'totale_sum' => $totale_sum, 'month' => $month]);
    }
}

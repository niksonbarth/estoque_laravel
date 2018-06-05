<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

        public function __construct()
        {
            //$this->middleware('autorizacao', ['only' => ['adiciona', 'remove', 'edita']]);
            $this->middleware('auth', ['only' => ['adiciona', 'remove', 'edita']]);
        }

        public function lista(){
            //$produtos = DB::select('select * from produtos');
            //return view('listagem')->with('produtos', $produtos);
            $produtos = Produto::all();
            return view('produto.listagem')->withProdutos($produtos);
        }

        public function listaJson(){
            //$produtos = DB::select('select * from produtos');
            $produtos = Produto::all();
            return $produtos;
            //return response()->json($produtos);
        }

        public function mostra($id){
            //$id = Request::route('id');
            //$resposta = DB::select('select * from produtos where id = ?', [$id]);
            $resposta = Produto::find($id);

            if(empty($resposta)){
                return "Esse produto não existe";
            }

            //return view('produto.detalhes')->with('p', $resposta[0]);
            return view('produto.detalhes')->with('p', $resposta);
        }

        public function novo(){
            return view('produto.formulario');
        }

        public function edita($id){
            return view('produto.formulario')->with('p', Produto::find($id));
        }

        public function remove($id){
            $produto = Produto::find($id);
            $produto->delete();
            return redirect()->action('ProdutoController@lista');
        }


        public function adiciona(ProdutosRequest $request){
            //metodo 1
            // $nome = Request::input('nome');
            // $descricao = Request::input('descricao');
            // $valor = Request::input('valor');
            // $quantidade = Request::input('quantidade');

            // //DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array($nome, $quantidade, $valor, $descricao));
            // DB::table('produtos')->insert(['nome' => $nome, 'valor' => $valor, 'descricao' => $descricao, 'quantidade' => $quantidade]);

            //metodo 2
            // $produto = new Produto();
            // $produto->nome = Request::input('nome');
            // $produto->descricao = Request::input('descricao');
            // $produto->valor = Request::input('valor');
            // $produto->quantidade = Request::input('quantidade');
            // $produto->save();

            //metodo 3
            // $params = Request::all();
            // $produto = new Produto($params);
            // $produto->save();

            $produto = Produto::find($request->input('id', -1));
            if(empty($produto)){
                Produto::create($request->all());
            }else{
                $produto->nome = $request->input('nome');
                $produto->descricao = $request->input('descricao');
                $produto->valor = $request->input('valor');
                $produto->quantidade = $request->input('quantidade');
                $produto->save();
            }

            //return redirect('/produtos')->withInput(Request::only('nome'));
            return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
        }
}
@extends('layout.principal')

@section('conteudo')
<h1>Novo produto</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/produtos/adiciona" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="id" @unless(empty($p)) value="{{$p->id}}" @endunless/>
    <div class="form-group">
        <label>Nome</label>
    <input name="nome" class="form-control" @unless(empty($p)) value="{{$p->nome}}" @else value="{{old('nome')}}" @endunless>
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" class="form-control" @unless(empty($p)) value="{{$p->descricao}}" @else value="{{old('descricao')}}" @endunless>
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" @unless(empty($p)) value="{{$p->valor}}" @else value="{{old('valor')}}" @endunless>
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" type="number" class="form-control" @unless(empty($p)) value="{{$p->quantidade}}" @else value="{{old('quantidade')}}" @endunless>
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@stop
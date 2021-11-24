<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>{{$produto->descricao}}</h1>
    <form method="post" action="{{url('/insert/item/')}}">
        @csrf

        <input type="hidden" class="form-control" value={{$produto->id}} id="produto" name="produto">

    <div class="form-group">
        <label for="unidade_medida"><b>Ingredientes</b></label>
        <select class="form-control" id="ingredientes" name="ingredientes">
            @foreach($ingredientes as $ingrediente)
          <option  value={{$ingrediente->id}}>{{$ingrediente->descricao}} - {{$ingrediente->unidMedida}}</option>
          @endforeach
     
   
          </select>
      </div>
      <div class="form-group">
        <label for="descricao"><b>Qtd</b></label>
        <input type="number" class="form-control" id="qtd" name="qtd">
        <small id="qtd" class="form-text text-muted">Informe aqui a quantidade que vai 
            desse ingrediente nesse lanche, geralmente essa quantidade é em grama, unidade ou porção</small>
      </div>
      <button type="submit" class="btn btn-primary">Inserir</button>

      <a href="{{url("/")}}"> <button type="button" class="btn btn-warning">Voltar</button></a>
    </form><br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Qtd</th>
            <th scope="col">Custo</th>
            <th scope="col">Opções</th>
        
          </tr>
        </thead>
        <tbody>
          @php
  
  $resul = 0;
  $total = 0;
  @endphp

            @foreach($itens as $item)
          
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->descricao}}</td>
            <td>{{$item->qtd}}</td>

            @if($item->unidMedida == 'kilo')
    @php
        $resul = ($item->valor*$item->qtd)/1000;

    @endphp
     <td>{{  'R$ '.number_format($resul, 2, ',', '.') }}</td>
    @endif

    @if($item->unidMedida == 'unidade')
    @php
       $resul = ($item->valor*$item->qtd);
      
    @endphp
     <td>{{  'R$ '.number_format($resul, 2, ',', '.') }}</td>
    @endif

    @if($item->unidMedida == 'porcao')
    @php
      $resul = ($item->valor/$item->qtd);
   
    @endphp
     <td>{{  'R$ '.number_format($resul, 2, ',', '.') }}</td>
    @endif

        <td>
           <a href="{{url("/delete/item/$item->id_item/$item->id_produto")}}"><button type="button" class="btn btn-danger">Excluir</button></a>
          
           
            </td>
            </tr>
                @endforeach
         </tbody>
      </table>
</div>
</body>
</html>
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
      <H2>CADASTRO DE PRODUTOS</H2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Tipo</th>
            <th scope="col">Opções</th>
      
          </tr>
        </thead>
        <tbody>

            @foreach($produtos as $produto)
          <tr>
            <th scope="row">{{$produto->id}}</th>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->tipo}}</td>
            <td>
              <a href="{{url("/cadastro/item/$produto->id")}}"><button type="button" class="btn btn-secondary">Ingredientes</button></a>
              <a href="{{url("/cadastro/item-acessorio/$produto->id")}}"><button type="button" class="btn btn-secondary">Acessórios</button></a>
                        </td>
          
                </tr>
         @endforeach
       
   
        </tbody>
      </table>
     <a href="{{url("/cadastro/produtos")}}"> <button type="button" class="btn btn-success">+ Incluir Produtos</button></a>

      <a href="{{url("/")}}"> <button type="button" class="btn btn-warning">Voltar</button></a>
      <br>      <br>  <br>      <br>
    </div>

</body>
</html>
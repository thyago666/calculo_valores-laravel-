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
    <form method="post" action="{{url('/insert/ingrediente')}}">
      @csrf
        <div class="form-group">
          <label for="descricao"><b>Descrição</b></label>
          <input type="text" class="form-control" id="descricao" name="descricao">
          <small id="descricao" class="form-text text-muted">Informe aqui a descrição de seu ingrediente, ex: Alface, Milho, Hamburguer etc</small>
        </div>

        <div class="form-group">
            <label for="unidade_medida"><b>Unidade de Medida</b></label>
            <select class="form-control" id="unidade_medida" name="unidade_medida">
  
              <option  value="kilo">Kilo</option>
              <option value="unidade">Unidade</option>
              <option  value="porcao">Porção</option>
       
              </select>
          </div>
      
        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{url("/")}}"> <button type="button" class="btn btn-warning">Voltar</button></a>

      </form>
    </div>
</body>
</html>
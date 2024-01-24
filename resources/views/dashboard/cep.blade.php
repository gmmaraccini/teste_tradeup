<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
  <body>
    <div class="container text-center">
        <h1>Formulário de cep</h1>
    <br>
    <br>
        <form class="row g-2" id='formCep' name='formCep'>
        <div class="col-auto">
            <label for="cep" class="visually-hidden">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="Digite o cep">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" id='pesquisarCep'>Pesquisar</button>
        </div>
        </form>
        <br>
    <!-- FORMULARIO DE ENDEREÇO -->
        <form class="row g-3" id='formRetornaEndereco' name='formRetornaEndereco'>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Logradouro</label>
              <input type="text" class="form-control" id="logradouro" placeholder="Logradouro">
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="complemento" placeholder="Complemento">
              </div>
              <div class="col-6">
                <label for="inputAddress2" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" placeholder="Bairro">
              </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Cidade</label>
              <input type="text" class="form-control" id="cidade" placeholder="Cidade">
            </div>
            <div class="col-md-2">
              <label for="inputState" class="form-label">UF</label>
              <input type="text" class="form-control" id="uf" placeholder="UF">

            </div>

          </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- jquery tags -->
    <script>
        $(document).ready(function() {
            $('#cep').mask('00000-000');
            $("#formCep").submit(function(event) {
            event.preventDefault();
            var cep = $("#cep").val();
            cep = cep.replace('-','');
            $.ajax({
                    type: 'GET',
                    url: '/api/cep/' + cep,
                    data: {cep: cep},
                    dataType: 'json',
                    success: function(resposta) {
                        $("#logradouro").val(resposta.logradouro);
                        $("#complemento").val(resposta.complemento);
                        $("#bairro").val(resposta.bairro);
                        $("#cidade").val(resposta.localidade);
                        $("#uf").val(resposta.uf);
                    },
                    error: function() {
                        alert('Erro na requisição. Verifique o cep e tente novamente');
                    }
                });
         });
        });
    </script>
</body>
</html>

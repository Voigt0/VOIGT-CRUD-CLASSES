<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/menu.png" style="width: 4vw;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tabelas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="php/tabelaPessoaFisica.php">Tabela Pessoa Física</a></li>
            <li><a class="dropdown-item" href="php/tabelaContaCorrente.php">Tabela Conta Corrente</a></li>
            <li><a class="dropdown-item" href="php/tabelaContatos.php">Tabela Contatos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="php/cadPessoaFisica.php">Cadastro Pessoa Física</a></li>
            <li><a class="dropdown-item" href="php/cadContaCorrente.php">Cadastro Conta Corrente</a></li>
            <li><a class="dropdown-item" href="php/cadContatos.php">Cadastro Contatos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Classes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="classes/PessoaFisica.class.php">Classe Pessoa Física</a></li>
            <li><a class="dropdown-item" href="classes/ContaCorrente.class.php">Classe Conta Corrente</a></li>
            <li><a class="dropdown-item" href="classes/Contatos.class.php">Classe Contatos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="php/operacao.php">Operação</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
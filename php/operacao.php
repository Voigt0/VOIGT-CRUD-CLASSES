<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Operação</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cadastro.css'>
    <script src='../js/main.js'></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "acao.php";
    $comando = isset($_GET['comando']) ? $_GET['comando'] : "";
    $tabela = "operacao";
    $dados;
    if ($comando == 'update'){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id, $tabela);
    }
    $cc_numero = isset($_POST['cc_numero']) ? $_POST['cc_numero'] : "";
    $cc_pf_id = isset($_POST['cc_pf_id']) ? $_POST['cc_pf_id'] : "";
    $cc_operacao = isset($_POST['cc_operacao']) ? $_POST['cc_operacao'] : "";
    $cc_valor = isset($_POST['cc_valor']) ? $_POST['cc_valor'] : "";
?>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <content>
    <form action="acao.php" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
        <h1>Operação na conta corrente</h1>
        <br>
        <label class="formItem formText" id="">Pessoa física:</label>
        <select class="form-select" aria-label="Escolha a pessoa física" name="cc_pf_id" value="">  
            <?php
                $pdo = Conexao::getInstance();
                $consulta = $pdo->query("SELECT * FROM pessoa_fisica");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option name="" value="<?php echo $linha['pf_id']; ?>" <?php if ($comando == "update" && $linha['pf_id'] == $dados['cc_pf_id']){echo "selected";}?>><?php echo $linha['pf_nome'];?></option>
            <?php } ?>
        </select>
        <br>
        <label class="formItem formText" id="">Conta corrente:</label>
        <select class="form-select" aria-label="Escolha a conta" name="cc_numero" value="">  
            <?php
                $pdo = Conexao::getInstance();
                $consulta = $pdo->query("SELECT * FROM conta_corrente");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option name="" value="<?php echo $linha['cc_numero']; ?>" <?php if ($comando == "update" && $linha['cc_numero'] == $dados['cc_numero']){echo "selected";}?>><?php echo $linha['cc_numero'];?></option>
            <?php } ?>
        </select>
        <br>
        <div class="form-group">
        <label for="">Operação:</label>
        <br>
        </div>
        <div class="form-group">
        <label for="">Saque:</label>
        <input type="radio" class="" required name="cc_operacao" id="cc_operacao" placeholder="Digite o saldo" value="saque">
        <br>
        </div>
        <div class="form-group">
        <label for="">Depósito:</label>
        <input type="radio" class="" required name="cc_operacao" id="cc_operacao" placeholder="Digite o saldo" value="saque">
        </div>
        <br>
        <div class="form-group">
        <label for="">Valor:</label>
        <input type="text" class="form-control" required type="text" name="cc_valor" id="cc_valor" placeholder="Digite o valor" value="<?php if ($comando == "update"){echo $dados['cc_valor'];}?>">
        </div>
        <br>
        <input type="hidden" name="comando" id="" value="<?php if($comando == "update"){echo "update";}else{echo "insert";}?>">
        <input type="hidden" id="tabela" name="tabela" class="tabela" value="operacao">
        <input type="hidden" name="id" id="" value="<?php if($comando == "update"){echo $id;}?>">
        <button type="submit" class="btn btn-dark" id="acao" value="ENVIAR">Enviar</button>
    </form>
    </content>
    <footer class="" id="">
    </footer>
</body>
</html>
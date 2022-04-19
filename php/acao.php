<?php
    $comando = "";
    if(isset($_POST['comando'])){$comando = $_POST['comando'];}else if(isset($_GET['comando'])){$comando = $_GET['comando'];}
    $seletor = "";
    if(isset($_POST['seletor'])){$seletor = $_POST['seletor'];}else if(isset($_GET['seletor'])){$seletor = $_GET['seletor'];}

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    acao($comando, $seletor);

    function acao($acao, $seletor){
        if($seletor == "operacao"){
            require_once "ContaCorrente.class.php";
            if($_POST['cc_operacao'] == "saque"){
                $contaCorrente = new ContaCorrente($_POST['cc_numero'], "", $_POST['cc_pf_id'], "");
                $contaCorrente->saque($_POST['cc_valor']);
                header("location:tabelaContaCorrente.php");
            } else if($_POST['cc_operacao'] == "deposito"){
                $contaCorrente = new ContaCorrente($_POST['cc_numero'], "", $_POST['cc_pf_id'], "");
                $contaCorrente->deposito($_POST['cc_valor']);
                header("location:tabelaContaCorrente.php");
            }
        }

        if($seletor == "PessoaFisica"){
            require_once "../classes/PessoaFisica.class.php";
        } else if($seletor == "ContaCorrente"){
            require_once "../classes/ContaCorrente.class.php";
        } else if($seletor == "Contatos"){
            require_once "../classes/Contatos.class.php";
        }
        if($acao == "insert"){
            if($seletor == "PessoaFisica"){
                $pessoaFisica = new PessoaFisica("", $_POST['pf_cpf'], $_POST['pf_nome'], $_POST['pf_dt_nascimento'],);
                $pessoaFisica->inserir();
                header("location:tabelaPessoaFisica.php");
            } else if($seletor == "ContaCorrente") {
                $contaCorrente = new ContaCorrente("", $_POST['cc_saldo'], $_POST['cc_pf_id'], $_POST['cc_dt_ultima_alteracao']);
                $contaCorrente->inserir();
                header("location:tabelaContaCorrente.php");
            } else if($seletor == "Contatos") {
                $contatos = new Contatos("", $_POST['cont_tipo'], $_POST['cont_descricao'], $_POST['cont_pf_id']);
                $contatos->inserir();
                header("location:tabelaContatos.php");
            }
        } else if($acao == "deletar"){
            if($seletor == "PessoaFisica"){
                $pessoaFisica = new PessoaFisica($_GET['id'], "", "", "");
                $pessoaFisica->deletar();
                header("location:tabelaPessoaFisica.php");
            } else if($seletor == "ContaCorrente") {
                $contaCorrente = new ContaCorrente($_GET['id'], "", "", "");
                $contaCorrente->deletar();
                header("location:tabelaContaCorrente.php");
            } else if($seletor == "Contatos") {
                $contatos = new Contatos($_GET['id'], "", "", "");
                $contatos->deletar();
                header("location:tabelaContatos.php");
            }
        } else if($acao == "update"){
            if($seletor == "PessoaFisica"){
                $pessoaFisica = new PessoaFisica($_POST['id'], $_POST['pf_cpf'], $_POST['pf_nome'],  $_POST['pf_dt_nascimento']);
                $pessoaFisica->atualizar();
                header("location:tabelaPessoaFisica.php");
            } else if($seletor == "ContaCorrente"){
                $contaCorrente = new ContaCorrente($_POST['id'], $_POST['cc_saldo'], $_POST['cc_pf_id'], $_POST['cc_dt_ultima_alteracao']);
                $contaCorrente->atualizar();
                header("location:tabelaContaCorrente.php");
            } else if($seletor == "Contatos"){
                $contatos = new Contatos($_POST['id'], $_POST['cont_tipo'], $_POST['cont_descricao'],  $_POST['cont_pf_id']);
                $contatos->atualizar();
                header("location:tabelaContatos.php");
            }
        }
    }

    function buscarDados($id,$seletor){
        $pdo = Conexao::getInstance();
        $dados = array();
    if($seletor == 'PessoaFisica'){
        $consulta = $pdo->query("SELECT * FROM pessoa_fisica WHERE pf_id = $id");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['pf_cpf'] = $linha['pf_cpf'];
            $dados['pf_nome'] = $linha['pf_nome'];
            $dados['pf_dt_nascimento'] = $linha['pf_dt_nascimento'];
        }
    } else if($seletor == 'ContaCorrente'){
        $consulta = $pdo->query("SELECT * FROM conta_corrente, pessoa_fisica WHERE cc_numero = $id");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['cc_saldo'] = $linha['cc_saldo'];
            $dados['cc_pf_id'] = $linha['cc_pf_id'];
            $dados['cc_dt_ultima_alteracao'] = $linha['cc_dt_ultima_alteracao'];
        }
    } else if($seletor == 'Contatos'){
        $consulta = $pdo->query("SELECT * FROM contatos, pessoa_fisica WHERE cont_id = $id");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['cont_tipo'] = $linha['cont_tipo'];
            $dados['cont_descricao'] = $linha['cont_descricao'];
            $dados['cont_pf_id'] = $linha['cont_pf_id'];
        }
    }
        return $dados;
    }
    
    require_once("../classes/PessoaFisica.class.php");
    function exibir($chave, $dado){
        $str = 0;
        foreach($dado as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }


    function lista_pessoa($id){
        $pessoaFisica = new PessoaFisica("","","","");
        $lista = $pessoaFisica->buscarPessoa($id);
        return exibir(array('pf_id', 'pf_nome'), $lista);

    }
?>
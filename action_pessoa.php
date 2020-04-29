<?php
include_once "inc/check_login.php";

if($logarDao->checkLogin()) {
    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql(); 

    switch($_REQUEST['option']) {
        case "read":
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $inicio = ($_REQUEST['pagina']*$_REQUEST['qnt_res_pg']) - $_REQUEST['qnt_res_pg'];
                $limite = $_REQUEST['qnt_res_pg'];
                $numTotalPessoas = $pessoaDao->numTotalPessoas();
                $qnt_pg = ceil($numTotalPessoas/$limite);
                $max_links = 3;
          
                $html = "<table width='100%'>
                <thead>
                    <tr>
                        <th scope='col'>CPF</th>
                        <th scope='col'>NOME</th>
                        <th scope='col'>AÇÕES</th>
                    </tr>    
                </thead>";                
                foreach($pessoaDao->findAll($inicio, $limite) as $p) {
                    $html .= "<tr><td>".$p['cpf']."</td>";
                    $html .= "<td>".$p['nome']."</td>";
                    $html .= "<td>
                    <a href='http://".$_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1]."/edit?id=".$p['id']."' style='color: blue; text-decoration: underline; cursor: pointer'>Editar</a>
                    <a id='".$p['id']."' name='".$p['nome']."' onclick='deletar(this)' style='color: blue; text-decoration: underline; cursor: pointer'>deletar</a>
                    </td>
                    </tr>";
                }              
                $html .= "</tbody></table>";
                
                $html .= "<div style='display: flex; justify-content: center; margin: 3px 0px'><span style='margin: 0px 10px'>Página ".$_REQUEST['pagina']." de ".$qnt_pg."</span>";

                $html .= "<a onclick='listar_pessoas(1,".$limite.")' style='color: blue; cursor: pointer'>Primeira</a>";
                for($pag_ant = $_REQUEST['pagina'] - $max_links; $pag_ant <= $_REQUEST['pagina'] - 1; $pag_ant++) {
                    if($pag_ant >= 1) {
                        $html .= "<a onclick='listar_pessoas(".$pag_ant.",".$limite.")' style='color: blue; cursor: pointer;margin: 0px 5px'>".$pag_ant."</a>";
                    }
                }

                for($pag_dep = $_REQUEST['pagina'] + 1; $pag_dep <= $_REQUEST['pagina'] + $max_links; $pag_dep++) { 
                    if($pag_dep <= $qnt_pg) {
                        $html .= "<a onclick='listar_pessoas(".$pag_dep.",".$limite.")' style='color: blue; cursor: pointer;margin: 0px 5px'>".$pag_dep."</a>"; 
                    }                  
                }
                $html .= "<a onclick='listar_pessoas(".$qnt_pg.",".$limite.")' style='color: blue; cursor: pointer;margin: 0px 5px'>Última</a></div>";
                echo $html;
            }
        break;

        case "create":
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $pessoa->setCpf($_REQUEST['cpf']);
                $pessoa->setNome($_REQUEST['nome']);
                
                $pessoaDao->create($pessoa);
                die(header("Location: http://".$_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1]));
            } 
        break;    

        case "update":
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $pessoa->setId($_REQUEST['id']);
                $pessoa->setCpf($_REQUEST['cpf']);
                $pessoa->setNome($_REQUEST['nome']);
                
                $pessoaDao->update($pessoa);
                die(header("Location: http://".$_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1]));
            } 
        break;

        case "delete":
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $pessoaDao->delete($_REQUEST['id']);        
            }
        break;
    }
} else {
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1]."/login"));
}
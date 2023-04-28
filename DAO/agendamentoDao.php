<?php 
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Agendamento.php";
    class agendamentoDao{
        public function InserirAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
            $nome = $agendamento->getNome_cliente();
            $hora_inicio = $agendamento->getHoraInicio();
            $hora_inicio = $hora_inicio->format('Y-m-d H:i:s');
            $hora_fim = $agendamento->getHoraFim();
            $hora_fim = $hora_fim->format('Y-m-d H:i:s');
            $data = $agendamento->getData();
            $data = $data->format('Y-m-d');
            $valor = $agendamento->getValor();
            // $status = $agendamento->getStatus();
            $servico = $agendamento->getServico();
            $forma = $agendamento->getFormaPagamento();
            // $id_adm = $agendamento->getIdAdm();

            $sql = "INSERT INTO agendamento (nome_cliente, hora_inicio, hora_fim, data_agendamento, valor_agendamento, status_agendamento, desc_serviço_agendamento, forma_pagamento, Administrador_id_administrador)
            VALUES ('$nome', '$hora_inicio', '$hora_fim', '$data', '$valor', 2, '$servico', '$forma', 1);";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ConsultarAgendamento($data_filtro){
            $conexao = Conexao::Conectar();
            if(empty($data_filtro)){
                $sql =  "select * from agendamento order by data_agendamento;";
            }
            else{
                $sql =  "select * from agendamento where data_agendamento = '".$data_filtro."' order by data_agendamento;";
            }
            $consulta = $conexao->query($sql);
            $formato = 'Y-m-d H:i:s';
            $agenda = array();
            while($row = mysqli_fetch_assoc($consulta)){
                $nome_cliente = $row["nome_cliente"];
                $hora_inicio = DateTime::createFromFormat($formato, $row["hora_inicio"]);
                $hora_fim = DateTime::createFromFormat($formato, $row["hora_fim"]);
                $data_agendamento = new DateTime($row["data_agendamento"]);
                // $string = $data_agendamento->format('Y-m-d H:i:s');
                $valor = $row["valor_agendamento"]; // converter para string no formato desejado
                $descricao = $row["desc_serviço_agendamento"];
                $pagamento = $row["forma_pagamento"];
                $agendamento = new Agendamento($nome_cliente, $hora_inicio, $hora_fim, $data_agendamento, $valor, $descricao, $pagamento, 1);
                array_push($agenda, $agendamento);
                  
               // $hora  = $row["hora_inicio"];
                // $hora = DateTime::createFromFormat('Y-m-d H:i:s', $hora);
                // echo "<a href='#'>Cliente: ".$row["nome_cliente"]." Horario: ".$hora->format("H:i")."</a><br><br>";
            }
            return $agenda;
        }
    }
?>
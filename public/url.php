<?php

				
    if( !empty($_GET['url']) ){
        $url = explode( "/" , $_GET['url']);
        if( empty($url[count($url)-1]) ){
            unset($url[count($url)-1]);
        }

        switch( $url[0] ){


/// TECNICA



case 'plano_manutencao': include('pages/tecnica/plano_manutencao.php');break;
case 'inserir_plano_manutencao': include('pages/insert/inserir_plano_manutencao.php');break;
case 'controle_os': include('pages/tecnica/controle_os.php');break;
case 'teste_app': include('testeapp.php');break;
case 'inserir_os': include('pages/insert/inserir_os.php');break;
case 'salvar_interacao_os': include('pages/insert/salvar_interacao_os.php');break;
case 'ver_orcamentos_abertos': include('pages/tecnica/ver_orcamentos_abertos.php');break;
case 'linha_do_tempo':
@$dataFiltro = $url[1];
include('pages/tecnica/linha_do_tempo.php');break; 

case 'retornar_os': include ('retornar_os.php');break;
case 'direcionar_os': include('rotaDirecionar.php');break;

case 'orcamento_solicitado': 
@$id = $url[1];
include('pages/tecnica/orcamento_solicitado.php');break;

case 'editar_plano': 
@$id = $url[1];
include('pages/tecnica/editar_plano.php');break;

case 'alterar_plano_manutencao': 
@$id = $url[1];
include('pages/edit/alterar_plano_manutencao.php');break;

case 'deletar_plano': 
@$id = $url[1];
include('pages/edit/deletar_plano.php');break;



case 'home': include('pages/tarefas/listar_tarefas.php');break;
case 'add-aluno': include('pages/alunos/add-aluno.php');break;
				
case 'inserircliente':
include('pages/insert/clientes.php');break;	
				
case 'atualizar_tarefa2':
include('pages/tarefas/atualizar.php');break;					
			
case 'listar_tarefas_concluidas':
include('pages/tarefas/listar_tarefas_concluidas.php');break;					
				
				
				
case 'tela_cliente':
@$id = $url[1];
include('pages/clientes/perfil.php');break;

// clientes
case 'cad_cliente':
include('pages/clientes/cad_cliente.php');break;

case 'listar_clientes':
@$counter = $url[1];
include('pages/clientes/listar_clientes.php');break;	

case 'listar_unico':
@$counter = $url[1];
include('pages/clientes/listar_unico.php');break;	

case 'listar_unico_produto':
    @$counter = $url[1];
    include('pages/produtos/listar_unico_produto.php');break;	

case 'deletar_cliente':
@$id = $url[1];
include('pages/del/clientes.php');break;	
				
case 'editar_cliente':
@$id = $url[1];
include('pages/clientes/edit_cliente.php');break;					

case 'alterar_cliente':
@$id = $url[1];
include('pages/edit/clientes.php');break;

case 'edit_equipamento':
@$id = $url[1];
include('pages/edit/edit_equipamento.php');break;


case 'editar_equipamento':
@$id = $url[1];
include('pages/equipamentos/editar_equipamento.php');break;

case 'formulario_equipamentos2':
@$id = $url[1];
include('pages/equipamentos/formulario_equipamentos2.php');break;

case 'inserirequipamentos2':
    include('pages/insert/equipamentos2.php');break;
    
case 'listar_equipamento_cliente':
    @$id = $url[1];
    include('pages/clientes/listar_equipamento_cliente.php');break;

case 'editar_equipamentos':
@$id = $url[1];
include('pages/clientes/edit_equipamentos.php');break;

case 'alterar_equipamento':
@$id = $url[1];
include('pages/edit/equipamentos.php');break;

case 'deletar_equipamento':
    @$id = $url[1];
    include('pages/del/equipamento.php');break;	

    


//colaboradores 
case 'inserircolaboradores':
include('pages/insert/colaboradores.php');break;

case 'cad_colaboradores':
include('pages/colaboradores/cad_colaboradores.php');break;

case 'listar_colaboradores':
    include('pages/colaboradores/listar_colaboradores.php');break;

case 'edit_colaboradores':
    @$id = $url[1];
    include('pages/colaboradores/edit_colaboradores.php');break;

case 'alterar_colaboradores':
    @$id = $url[1];
    include('pages/edit/colaboradores.php');break;

case 'deletar_colaboradores':
    @$id = $url[1];
    include('pages/del/colaboradores.php');break;

    case 'deletar_produto':
        @$id = $url[1];
        include('pages/del/deletar_produto.php');break;

        
//fornecedores
case 'listar_fornecedores':
    include('pages/fornecedores/listar_fornecedores.php');break;

 case 'inserirfornecedores':
    include('pages/insert/fornecedores.php');break;

case 'cad_fornecedores':
    include('pages/fornecedores/cad_fornecedores.php');break;

case 'edit_fornecedores':
@$id = $url[1];
include('pages/fornecedores/edit_fornecedores.php');break;

case 'alterar_fornecedores':
    @$id = $url[1];
    include('pages/edit/fornecedores.php');break;

case 'deletar_fornecedores':
    @$id = $url[1];
    include('pages/del/fornecedores.php');break;

				
				
				

//SETORES 
case 'formulario_setor':
include('pages/setores/formulario.php');break;
				
case 'inserirsetor':
include('pages/insert/setor.php');break;				
				
case 'deletar_colaboradores':
include('pages/insert/setor.php');break;				
    
case 'deletar_setor':				
include('pages/del/setor.php');break;	
				
case 'edit_setor':
@$id = $url[1];				
include('pages/setores/editar.php');break;				
				
case 'alterarsetor':
@$id = $url[1];				
include('pages/edit/setor.php');break;					
				
case 'permissao_setor':
@$id = $url[1];	
@$id2 = $url[2];
@$id3 = $url[3];	
include('pages/edit/permissao_setor.php');break;					
				
// COLUNAS
				
case 'formulario_coluna':
include('pages/colunas/formulario.php');break;	
				
case 'inserircoluna':
include('pages/insert/coluna.php');break;				
				
				
				
				
				
				
				
				
case 'listar_pagar':
 include('pages/financeiro/listar_pagar.php');break;
				
				
//Tarefas 
case 'formulario_tarefa':
    include('pages/tarefas/formulario.php');break;

case 'inserirtarefa':
        include('pages/insert/tarefa.php');break;	

case 'listar_tarefas':
				@$id = $url[1];
        include('pages/tarefas/listar_tarefas.php');break;

case 'edit_tarefas':
        @$id = $url[1];
        include('pages/tarefas/edit_tarefas.php');break;

				
case 'minhas_tarefas':
        @$id = $url[1];
        include('pages/tarefas/minhas_tarefas.php');break;				
				
case 'minhas_tarefas_setor':
        @$id = $url[1];
        include('pages/tarefas/minhas_tarefas_setor.php');break;				
								
				
case 'alterar_tarefas':
        @$id = $url[1];
        include('pages/edit/tarefas.php');break;

case 'deletar_tarefas':
        @$id = $url[1];
		@$id2 = $url[2];		
        include('pages/del/tarefas.php');break;
				
				
case 'atualizar_tarefa_detalhes':
        @$id = $url[1];
        include('pages/edit/tarefasdetalhes.php');break;				
				
				
				

//categoria_contas 
//contas
case 'formulario_contas':
    include('pages/categorias/formulario_contas.php');break;

case 'inserircontas':
    include('pages/insert/contas.php');break;

//CAIXA 
case 'formulario_caixa':
    include('pages/caixa/formulario_caixa.php');break;

case 'inserircaixa':
    include('pages/insert/caixa.php');break;


case 'listar_caixa':
    include('pages/caixa/listar_caixa.php');break;	

case 'edit_caixa':
    @$id = $url[1];
    include('pages/caixa/edit_caixa.php');break;

case 'alterar_caixa':
    @$id = $url[1];
    include('pages/edit/caixa.php');break;

case 'deletar_caixa':
    @$id = $url[1];
    include('pages/del/caixa.php');break;


//PROCEDIMENTOS 
case 'formulario_procedimento':
    include('pages/procedimentos/formulario_procedimento.php');break;

case 'inserirprocedimento':
    include('pages/insert/procedimento.php');break;

//Equipamentos 
case 'formulario_equipamentos':
    include('pages/equipamentos/formulario_equipamentos.php');break;

case 'inserirequipamentos':
    include('pages/insert/equipamentos.php');break;

case 'listar_equipamentos':
        @$id = $url[1];
    include('pages/equipamentos/listar_equipamentos.php');break;


//Anotaçoes 
case 'formulario_anotacoes':
    include('pages/anotacoes_clientes/formulario_anotacoes.php');break;


case 'inseriranotacoes':
    include('pages/insert/anotacoes.php');break;

case 'editar_anotacoes':
    @$id = $url[1];
    include('pages/anotacoes_clientes/edit_anotacoes.php');break;

case 'alterar_anotacoes':
    @$id = $url[1];
    include('pages/edit/anotacoes.php');break;


case 'deletar_anotacoes':
    @$id = $url[1];
    include('pages/del/anotacoes.php');break;

case 'listar_anotacoes':
        include('pages/anotacoes_clientes/listar_anotacoes.php');break;



//Anotaçoes2
case 'formulario_anotacoes2':
    @$id = $url[1];
    include('pages/anotacoes_clientes/formulario_anotacoes2.php');break;


case 'inseriranotacoes2':
include('pages/insert/anotacoes2.php');break;

//Marcas

case 'formulario_marcas':
@$id = $url[1];
    include('pages/marcas/formulario.php');break;


case 'inserir_marcas':
    include('pages/insert/inserir_marcas.php');break;

case 'listar_marcas':
    include('pages/marcas/listar_marcas.php');break;	

case 'editar_marcas':
    @$id = $url[1];
    include('pages/marcas/edit_marcas.php');break;

case 'alterar_marcas':
    @$id = $url[1];
    include('pages/edit/marcas.php');break;

case 'deletar_marcas':
    @$id = $url[1];
    include('pages/del/marcas.php');break;
//Modelos

case 'formulario_modelo':
				    @$id = $url[1];
include('pages/modelo/formulario.php');break;

case 'formulario_modelo2':
				    @$id = $url[1];
include('pages/modelo/formulario2.php');break;				
				
case 'inserir_modelo';
    include('pages/insert/modelo.php');break;

case 'inserir_modelo2';
    include('pages/insert/modelo2.php');break;

case 'alterar_modelo':
    @$id = $url[1];
     include('pages/edit/modelo.php');break;

case 'editar_modelo':
    @$id = $url[1];
    include('pages/modelo/edit_modelo.php');break;
    
case 'deletar_modelos':
    @$id = $url[1];
    include('pages/del/modelo.php');break;
//Produtos 
case 'formulario_produtos':
    include('pages/produtos/formulario.php');break;

case 'inserir_produto';
    include('pages/insert/produtos.php');break;

case 'listar_produtos':
    @$counter = $url[1];
    include('pages/produtos/listar_produtos.php');break;

case 'edit_produtos':
    @$id = $url[1];
    @$id2 = $url[2];
    include('pages/produtos/edit_produtos.php');break;

case 'alterar_produtos':
    @$id = $url[1];
    @$id2 = $url[2];
    include('pages/edit/produtos.php');break;

case 'add_foto_produto':
 @$id = $url[1];
  include('pages/produtos/fotos.php');break;

case 'remover_foto':
 @$id = $url[1];
 @$id2 = $url[2];				
  include('pages/produtos/deletar_foto.php');break;
    

				case 'sair':
include('sair.php');break;
	
	   default: include('requisicao.php');
        }
    }
?>
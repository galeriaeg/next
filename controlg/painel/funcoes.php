<?php
ini_set('display_errors', 0);

function cont()
{

	$id = $_GET["id"];

	switch (@$id) {

		case "0":
			echo "<script>
			this.location = 'index.php';
			</script>";
			break;

		case "2":
			$titulo = "Administradores";
			include("modulos/admins/index.php");
			break;

		case "2.1":
			$titulo = "Cadastrar Administrador";
			include("modulos/admins/cadastra.php");
			break;

		case "2.1.1":
			$titulo = "Cadastrar Administrador";
			include("modulos/admins/resp_cadastra.php");
			break;


		case "2.2":
			$titulo = "Editar Administrador";
			include("modulos/admins/edita.php");
			break;

		case "2.2.1":
			$titulo = "Meus dados";
			include("modulos/admins/resp_edita.php");
			break;

		case "2.3":
			$titulo = "Meus dados";
			include("modulos/admins/resp_edita_senha.php");
			break;

		case "2.4.1":
			$titulo = "Excluir usuário";
			include("modulos/admins/resp_excluir.php");
			break;



		case "3":
			$titulo = "Notícias";
			include("modulos/noticias/index.php");
			break;

		case "3.1":
			$titulo = "Cadastrar de Notícia";
			include("modulos/noticias/cadastra.php");
			break;

		case "3.1.1":
			$titulo = "Cadastrar de Notícia";
			include("modulos/noticias/resp_cadastra.php");
			break;

		case "3.2":
			$titulo = "Editar Notícia";
			include("modulos/noticias/edita.php");
			break;

		case "3.2.1":
			$titulo = "Editar Notícia";
			include("modulos/noticias/resp_edita.php");
			break;

		case "3.3":
			$titulo = "Excluir Notícia";
			include("modulos/noticias/resp_deleta.php");
			break;

		case "3.4":
			$titulo = "Excluir Foto";
			include("modulos/noticias/resp_deleta_anexo.php");
			break;





		case "4":
			$titulo = "Fontes";
			include("modulos/noticias-fontes/index.php");
			break;

		case "4.1":
			$titulo = "Cadastrar Fonte";
			include("modulos/noticias-fontes/cadastra.php");
			break;

		case "4.1.1":
			$titulo = "Cadastrar Fonte";
			include("modulos/noticias-fontes/resp_cadastra.php");
			break;

		case "4.2":
			$tit = "Editar Fonte";
			include("modulos/noticias-fontes/edita.php");
			break;

		case "4.2.1":
			$titulo = "Editar Fonte";
			include("modulos/noticias-fontes/resp_edita.php");
			break;

		case "4.3":
			$titulo = "Excluir Fonte";
			include("modulos/noticias-fontes/resp_deleta.php");
			break;

		case "4.4":
			$titulo = "Fonte/Excluir Anexo";
			include("modulos/noticias-fontes/resp_deleta_upload.php");
			break;




		case "5":
			$titulo = "Slides";
			include("modulos/slide/index.php");
			break;

		case "5.1":
			$titulo = "Cadastrar Slide";
			include("modulos/slide/cadastra.php");
			break;

		case "5.1.1":
			$titulo = "Cadastrar Slide";
			include("modulos/slide/resp_cadastra.php");
			break;

		case "5.2":
			$tit = "Editar Slide";
			include("modulos/slide/edita.php");
			break;

		case "5.2.1":
			$titulo = "Editar Slide";
			include("modulos/slide/resp_edita.php");
			break;

		case "5.3":
			$titulo = "Excluir Slide";
			include("modulos/slide/resp_deleta.php");
			break;

		case "5.4":
			$titulo = "Slide/Excluir Anexo";
			include("modulos/slide/resp_upload.php");
			break;





		case "6":
			$titulo = "Produtos";
			include("modulos/produtos/index.php");
			break;

		case "6.1":
			$titulo = "Cadastrar Produto";
			include("modulos/produtos/cadastra.php");
			break;

		case "6.1.1":
			$titulo = "Cadastrar Produto";
			include("modulos/produtos/resp_cadastra.php");
			break;

		case "6.2":
			$titulo = "Editar Produto";
			include("modulos/produtos/edita.php");
			break;

		case "6.2.1":
			$titulo = "Editar Produto";
			include("modulos/produtos/resp_edita.php");
			break;

		case "6.2.2":
			$titulo = "Produto/Excluir Anexo";
			include("modulos/produtos/resp_deleta_upload.php");
			break;

		case "6.3":
			$titulo = "Excluir Produto";
			include("modulos/produtos/resp_deleta.php");
			break;






		case "7":
			$titulo = "Marcas";
			include("modulos/marcas/index.php");
			break;

		case "7.1":
			$titulo = "Cadastrar Marca";
			include("modulos/marcas/cadastra.php");
			break;

		case "7.1.1":
			$titulo = "Cadastrar Marca";
			include("modulos/marcas/resp_cadastra.php");
			break;

		case "7.2":
			$titulo = "Editar Marca";
			include("modulos/marcas/edita.php");
			break;

		case "7.2.1":
			$titulo = "Editar Marca";
			include("modulos/marcas/resp_edita.php");
			break;

		case "7.2.2":
			$titulo = "Marca/Excluir Anexo";
			include("modulos/marcas/resp_deleta_upload.php");
			break;

		case "7.3":
			$titulo = "Excluir Marca";
			include("modulos/marcas/resp_deleta.php");
			break;




		case "8":
			$titulo = "Páginas";
			include("modulos/conteudo/index.php");
			break;

		case "8.1":
			$titulo = "Cadastrar de Página";
			include("modulos/conteudo/cadastra.php");
			break;

		case "8.1.1":
			$titulo = "Cadastrar de Página";
			include("modulos/conteudo/resp_cadastra.php");
			break;

		case "8.2":
			$tit = "Editar Página";
			include("modulos/conteudo/edita.php");
			break;

		case "8.2.1":
			$titulo = "Editar Página";
			include("modulos/conteudo/resp_edita.php");
			break;

		case "8.3":
			$titulo = "Excluir Página";
			include("modulos/conteudo/resp_deleta.php");
			break;





		case "9":
			$titulo = "Linhas";
			include("modulos/linhas/index.php");
			break;


		case "9.1.1":
			$titulo = "Cadastrar Linha";
			include("modulos/linhas/resp_cadastra.php");
			break;

		case "9.2":
			$titulo = "Editar Linha";
			include("modulos/linhas/edita.php");
			break;

		case "9.2.1":
			$titulo = "Editar Linha";
			include("modulos/linhas/resp_edita.php");
			break;

		case "9.3":
			$titulo = "Excluir Linha";
			include("modulos/linhas/resp_deleta.php");
			break;



		case "10":
			$titulo = "Área de atuação";
			include("modulos/area-atuacao/index.php");
			break;

		case "10.1":
			$titulo = "Cadastrar  Área de atuação";
			include("modulos/area-atuacao/cadastra.php");
			break;

		case "10.1.1":
			$titulo = "Cadastrar  Área de atuação";
			include("modulos/area-atuacao/resp_cadastra.php");
			break;

		case "10.2":
			$titulo = "Editar  Área de atuação";
			include("modulos/area-atuacao/edita.php");
			break;

		case "10.2.1":
			$titulo = "Editar  Área de atuação";
			include("modulos/area-atuacao/resp_edita.php");
			break;

		case "10.2.2":
			$titulo = " Área de atuação/Excluir Anexo";
			include("modulos/area-atuacao/resp_deleta_upload.php");
			break;

		case "10.3":
			$titulo = "Excluir Área de atuação";
			include("modulos/area-atuacao/resp_deleta.php");
			break;




		case "11":
			$titulo = "Contatos";
			include("modulos/contatos/edita.php");
			break;

		case "11.1":
			$titulo = "Cadastrar Contatos";
			include("modulos/contatos/resp_edita.php");
			break;




		default:
			echo "<img src='imgs/aviso.png' style='margin-left:5px; margin-top:20px;'>";
	}
}

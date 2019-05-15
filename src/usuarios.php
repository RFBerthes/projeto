<?php
	include_once("conexao.php");
	$result_usuarios = "SELECT * FROM usuarios";
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Admin</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="admin.php">Peça&Pag</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="admin.php">HOME <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ADMINISTRAÇÃO
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="cadastros.php">cadastros </a>
                <a class="dropdown-item" href="produtos.php">Produtos    </a>
                <a class="dropdown-item" href="usuarios.php">Usuários    </a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="mesas.php">MESAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">RELATÓRIOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">BACKUP</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">SAIR</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0 bg-dark" type="submit">OK</button>
          </form>
        </div>
      </nav>

      <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var recipientperfil = button.data('whateverperfil')
          var recipientnome = button.data('whatevernome')
          var recipientusuario = button.data('whateverusuario')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('ID do Usuario: ' + recipient)
          modal.find('#idusuario').val(recipient)
          modal.find('#recipient-perfil').val(recipientperfil)
          modal.find('#recipient-name').val(recipientnome)
          modal.find('#recipient-usuario').val(recipientusuario)
        })
      </script>

  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2">
      <div class="pull-right">
				<button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade text-dark" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Cadastrar Usuário</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                <form action="registro-usuario.php" method="POST">
                
                  <div class="form-group">
                    <label>Perfil</label>
                    <select name="perfil" id="perfil" class="form-control">
                        <option value="admin">Administrador</option>
                        <option value="caixa">Caixa</option>
                        <option value="atendente" selected>Atendente</option>
                        <option value="cozinheiro">Cozinheiro</option>
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" id=nome name=nome required class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" id=usuario name=usuario required class="form-control" placeholder="Usuário" >
                  </div>
  
                  <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="senha" name="senha" required placeholder="Senha" type="password" minlength="4">
                  </div>
          
                  <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                    <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Enviar </button>
                  </div>
                </form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
        <?php if (isset($_GET['sucesso'])) { ?>
          <div class="alert alert-success" role="alert" style="text-align:center">
            <strong>Usuário cadastrado com sucesso!</strong>
          </div>
        <?php }elseif (isset($_GET['erro1'])){ ?>
          <div class="alert alert-danger" role="alert" style="text-align:center">
            <strong>Erro! Usuário já existe, tente novamente...</strong>
          </div>
        <?php } ?>

        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
              <table class="table bg-light table-striped" style="text-align:center">
                <thead>
                  <tr>
                    <th>Perfil</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($usuarios = mysqli_fetch_assoc($resultado_usuarios)){ ?>
                    <tr>
                      <td><?php echo $usuarios['perfil']; ?></td>
                      <td><?php echo $usuarios['nome'];   ?></td>
                      <td><?php echo $usuarios['usuario'];?></td>
                      <td>                          
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $usuarios['idusuario']; ?>"  data-whateverperfil="<?php echo $usuarios['perfil']; ?>"  data-whatevernome="<?php echo $usuarios['nome']; ?>" data-whateverusuario="<?php echo $usuarios['usuario']; ?>" >Editar</button>
                        <a href="apagar-usuario.php?usuario=<?php echo $usuarios['usuario']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
               </table>
            </div>
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-dark" id="exampleModalLabel">Editar Usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="edita-usuario.php" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>Perfil</label>
                          <select name="perfil" id="perfil" class="form-control">
                              <option value="admin">Administrador</option>
                              <option value="caixa">Caixa</option>
                              <option value="atendente" selected>Atendente</option>
                              <option value="cozinheiro">Cozinheiro</option>
                          </select>
                        </div>
        
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" id=nome name=nome required class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                          <label>Usuario</label>
                          <input type="text" id=usuario name=usuario required class="form-control" placeholder="Usuário" >
                        </div>
                      <input type="hidden" name="idusuario"  id="idusuario">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Alterar</button>
                      </div>
                    </form>
                  </div>			  
                </div>
              </div>
            </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>


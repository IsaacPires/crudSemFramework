<?php

require_once 'models/User.php';

$users = (new User())->getAll();


require_once 'layout/header.html';
?>


  <h1 class="mt-4 mb-4">Listagem de Usuários</h1>
  
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>

            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td style="max-width : 100px; ">
                    <button type="button" class="btn btn-primary edit-btn" data-nome='<?= $user->name ?>' data-email='<?= $user->email ?>' data-id='<?= $user->id ?>' >Editar</button>
                    <button type="button" class="btn btn-danger delete-btn" data-id='<?= $user->id ?>'>Excluir</button>
                    <a href="colors.php?id=<?= $user->id ?>&name=<?= $user->name ?>" type="button" class="btn btn-info cores-btn" >Cores</a>

                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
  </table>
  <button type="button" data-add='true' class="btn btn-success add-btn">Adicionar Usuário</button>

  <?php require_once 'layout/footer.html'; ?>


  <!-- Modal Editar/criar -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"><span class="actionName"></span> Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="saveUser" method="POST" enctype="multipart/form-data" action="userRequest.php">
          <div class="form-group">
            <label for="editNome">Nome</label>
            <input required type="text" class="form-control" id="editNome" name="name" >
          </div>
          <div class="form-group">
            <label for="editEmail">Email</label>
            <input required type="email" class="form-control" id="editEmail" name="email">
          </div>
          <input type="hidden" name="id" id='editId' >
          <input type="hidden" name="action" value='edit' id='action' >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button form="saveUser" type="submit" class="btn btn-primary" >Salvar Alterações</button>
      </div>
    </div>
  </div>
</div>

<!-- Model delete -->

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Você tem certeza que deseja excluir este item?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form method="POST" enctype="multipart/form-data" action="userRequest.php">
            <input type="hidden" name="id" id='deleteId' >
            <input type="hidden" name="action" value='delete' >
            <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Confirmar Exclusão</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


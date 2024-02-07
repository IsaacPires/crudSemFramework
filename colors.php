<?php

require_once 'models/UserColor.php';

$userColors = (new UserColor())->getOne($_GET['id']);


require_once 'layout/header.html';
?>

<h2>Cores do <?= $_GET['name']??'usuário' ?></h2>
      <table class="table">
        <thead>
          <tr>
            <th>Cores</th>
            <th>ação</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($userColors as $userColor) { ?>
          <tr>
            <td><?= $userColor->name ?> </td>
            <td><button type="button" class="btn btn-danger deleteColor-btn"
            data-userColor='<?= $userColor->Id ?>'
            data-id='<?= $userColor->Id ?>'
            data-name='<?= $_GET['name'] ?>'
            data-userId='<?= $_GET['id'] ?>'
            >Excluir</button></td>
          </tr>        
        <?php } ?>


        </tbody>
      </table>
      <form method="POST" action="userColorRequest.php">
        <select class="primary" name='colorId' aria-label=".form-select-lg example">
          <option selected>Insira uma nova cor</option>
          <option value="1">Blue</option>
          <option value="2">Red</option>
          <option value="3">Yellow</option>
          <option value="4">Green</option>
          <input type="hidden" name="userName"value="<?= $_GET['name'] ?>"  >
          <input type="hidden" name="userId"value="<?= $_GET['id'] ?>"  >
          <input type="hidden" name="action"  id="userid" value="save"  >

        </select>
        <button type='submit' class="btn btn-primary">Adicionar nova cor</button>
        <a href="index.php"class="btn btn-primary">Voltar</a>

      </form>

<?php

require_once 'layout/footer.html';

?>


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
          <form method="POST" enctype="multipart/form-data" action="userColorRequest.php">

            <input type="hidden" name="id" id='id' >
            <input type="hidden" name="name" id='name' >
            <input type="hidden" name="userId" id='userId' value='<?= $_GET['id'] ?>'>
            <input type="hidden" name="action" value='delete' >

            <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Confirmar Exclusão</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


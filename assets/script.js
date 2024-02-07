  $(document).ready(function(){


    $(".edit-btn").click(function(){
      const nome = $(this).data('nome') ;
      const email = $(this).data('email') ;
      const id = $(this).data('id');

      $(".actionName").text('Editar');



      $("#editNome").val(nome);
      $("#editEmail").val(email);
      $("#editId").val(id);
      $("#editModal").modal("show");

    });

    $(".add-btn").click(function(){
      $(".actionName").text('Adicionar');
      $("#editNome").val('');
      $("#editEmail").val('');
      $("#action").val('save');

      $("#editModal").modal("show");

    });

    $(".delete-btn").click(function(){
      const id = $(this).data('id') ;
      $("#deleteId").val(id);

      $("#confirmDeleteModal").modal("show");
    });

    $(".deleteColor-btn").click(function(){
       const id = $(this).data('id') ;
      const name = $(this).data('name') ;

      $("#id").val(id);
      $("#name").val(name);

      $("#confirmDeleteModal").modal("show");
    });

    $(".cores-btn").click(function(){
      const nome = $(this).data('nome') ;
      $("#userNameColor").text(nome);
      console.log($(this).data());


      $("#colorModal").modal("show");
    });

  });

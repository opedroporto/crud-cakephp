<style>
    .user-img {
        height: 100px;
        background: white;
    }
</style>

<h1>Adicionar usuário</h1>

<?php
    echo $this->Form->create($usuario, array('enctype'=>'multipart/form-data'));
    // Hard code the user for now.
    // echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('foto', array('type'=>'file', 'accept'=>'image/png, image/gif, image/jpeg'));
    echo $this->Html->image('usuario/' .  'semImagem.png', array('class' => 'user-img'));
    echo $this->Form->control('email');
    echo $this->Form->control('senha', ['type' => 'password']);
    echo $this->Form->control('created', ['disabled']);
    echo $this->Form->control('modified', ['disabled']);
    echo $this->Form->button(__('Editar'));
    echo $this->Form->end();
?>


<?php $this->start('script'); ?>
<script>
    
    $(document).ready(()=>{
      $('#foto').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('.user-img').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

</script>

<?php $this->end(); ?>
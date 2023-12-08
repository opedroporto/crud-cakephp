<style>
    .user-img {
        height: 100px;
        background: white;
    }
</style>

<h1>Editar brinquedo #<?= $brinquedo->id ?></h1>

<?php
    echo $this->Form->create($brinquedo, array('enctype'=>'multipart/form-data'));
    echo $this->Form->control('foto', array('type'=>'file', 'accept'=>'image/png, image/gif, image/jpeg'));
    echo $this->Html->image('brinquedo/' .  $brinquedo->foto, array('class' => 'user-img'));
    echo $this->Form->control('modelo');
    echo $this->Form->control('marca');
    echo $this->Form->control('faixa_etaria');
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
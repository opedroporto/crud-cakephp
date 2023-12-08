<style>
    .user-img {
        height: 200px;
        background: white;
    }
</style>

<h1>Usuário #<?= $usuario->id ?></h1>

<?= $this->Html->image('usuario/' .  $usuario->foto, array('class' => 'user-img')) ?>
<p>E-mail: <?= $usuario->email ?></p>
<p>Senha: ********<p>
<p><small>Criado: <?= $usuario->created->format(DATE_RFC850) ?></small></p>
<p><small>Modificado: <?= $usuario->modified->format(DATE_RFC850) ?></small></p>
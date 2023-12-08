<style>
    .user-img {
        height: 200px;
        background: white;
    }
</style>

<h1>Brinquedo #<?= $brinquedo->id ?></h1>

<?= $this->Html->image('brinquedo/' .  $brinquedo->foto, array('class' => 'user-img')) ?>
<p>Modelo: <?= $brinquedo->modelo ?></p>
<p>Marca: <?= $brinquedo->marca ?></p>
<p>Faixa etária: <?= $brinquedo->faixa_etaria ?></p>
<p><small>Criado: <?= $brinquedo->created->format(DATE_RFC850) ?></small></p>
<p><small>Modificado: <?= $brinquedo->modified->format(DATE_RFC850) ?></small></p>
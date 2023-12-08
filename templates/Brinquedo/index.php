<style>
    a {
        display: block;
    }
    .table-img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        background: white;
    }
    .top-content {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .top-content * {
        margin: 0;
    }
</style>

<div class="top-content">
    <h1>Brinquedos</h1>
    
    <form action="<?= $this->Url->build([
        'controller' => 'Brinquedo',
        'action' => 'add'
    ]);
    ?>">
        <button type="submit" value="Adicionar">Adicionar</button>
    </form>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Imagem</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Faixa etária</th>
        <th>Criado</th>
        <th>Modificado</th>
        <th>Opções</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($brinquedos as $brinquedo): ?>
        <tr>
            <td>
                <?= $brinquedo->id ?>
            </td>
            <td>
                <?= $this->Html->image('brinquedo/' .  $brinquedo->foto, array('class' => 'table-img')) ?>
            </td>
            <td>
                <?= $brinquedo->modelo ?>
            </td>
            <td>
                <?= $brinquedo->marca ?>
            </td>
            <td>
                <?= $brinquedo->faixa_etaria ?>
            </td>
            <td>
                <?= $brinquedo->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $brinquedo->modified->format(DATE_RFC850) ?>
            </td>
            <td>
                <span>
                    <a href="<?= $this->Url->build([
                        'controller' => 'brinquedo',
                        'action' => 'view',
                        $brinquedo->id,
                    ]);
                    ?>">
                    Ver
                    </a>
                <span>
                <span>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $brinquedo->id]) ?>
                </pspan>
                <span>
                    <?= $this->Form->postLink(
                        'Deletar',
                        ['action' => 'delete', $brinquedo->id],
                        ['confirm' => 'Tem certeza que deseja deletar o brinquedo #' . $brinquedo->id . '?'])
                    ?>
                </span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
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
    <h1>Usuários</h1>
    
    <form action="<?= $this->Url->build([
        'controller' => 'Usuario',
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
        <th>E-mail</th>
        <th>Criado</th>
        <th>Modificado</th>
        <th>Opções</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td>
                <?= $usuario->id ?>
            </td>
            <td>
                <?= $this->Html->image('usuario/' .  $usuario->foto, array('class' => 'table-img')) ?>
            </td>
            <td>
                <?= $usuario->email ?>
            </td>
            <td>
                <?= $usuario->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $usuario->modified->format(DATE_RFC850) ?>
            </td>
            <td>
                <span>
                    <a href="<?= $this->Url->build([
                        'controller' => 'Usuario',
                        'action' => 'view',
                        $usuario->id,
                    ]);
                    ?>">
                    Ver
                    </a>
                <span>
                <span>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $usuario->id]) ?>
                </pspan>
                <span>
                    <?= $this->Form->postLink(
                        'Deletar',
                        ['action' => 'delete', $usuario->id],
                        ['confirm' => 'Tem certeza que deseja deletar o usuário #' . $usuario->id . '?'])
                    ?>
                </span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
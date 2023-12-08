<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        gap: 2rem;
        padding: 1rem;
    }

    .container .item {
        width: 24rem;
        height: 6rem;
        display: flex;
        /* justify-content: center; */
        padding-left: 6rem;
        align-items: center;
        background: white;
        border: 1px solid var(--color-cakephp-red);
    }
</style>

<div class="container">
    <?php if ($loggedIn && $loggedIn->id == 1) { ?>
    
        <a href="<?= $this->Url->build([
            'controller' => 'usuario',
            'action' => 'index'
        ]);
        ?>">
            <div class="item">
                <i class='bx bxs-user'></i> Usuários
            </div>
        </a>
    
    <?php } ?>
    
    <a href="<?= $this->Url->build([
        'controller' => 'brinquedo',
        'action' => 'index'
    ]);
    ?>">
        <div class="item">
            <i class='bx bxs-dice-6'></i> Brinquedos
        </div>
    </a>
</div>
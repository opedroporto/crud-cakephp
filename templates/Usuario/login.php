<?php
    $this->layout = "guest";
?>

<style>
    .login-container {
        width: 100%;
        height: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-form {
        width: 100%;
    }

    .title {
        text-align: center;
    }
</style>

<div class="login-container">
    <div class="login-form">
        <?= $this->Flash->render() ?>
        <h3 class="title">Login</h3>
        <?= $this->Form->create() ?>
        <fieldset>
            <!-- <legend><?= __('Please enter your username and password') ?></legend> -->
            <?= $this->Form->control('email', ['required' => true]) ?>
            <?= $this->Form->control('senha', ['required' => true, 'type' => 'password']) ?>
        </fieldset>
        <?= $this->Form->submit(__('Login')); ?>
        <?= $this->Form->end() ?>
    
        <!-- <?= $this->Html->link("Add User", ['action' => 'add']) ?> -->
    </div>
</div>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - MeuCRUD
    </title>
    <?= $this->Html->meta('icon', '/favicon.ico', ['type' => 'icon']) ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <!-- Box icon CSS   -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- End -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
<div class="sidebar close">
    <a href="<?= $this->Url->build('/'); ?>">
      <div class="logo-details">
        <img class="logo_img" src="<?= $this->Url->build('/favicon.ico'); ?>" alt="Logo">
        <span class="logo_name">MeuCRUD</span>
      </div>  
    </a>
    <ul class="nav-links">
      <li>
        <a href="<?= $this->Url->build('/'); ?>">
          <i class='bx bx-home'></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="<?= $this->Url->build([
              'controller' => 'brinquedo',
              'action' => 'index'
          ]);
          ?>">
            <i class='bx bxs-dice-6'></i>
            <span class="link_name">Brinquedos</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Brinquedos</a></li>
          <li>
            <a href="<?= $this->Url->build([
              'controller' => 'brinquedo',
              'action' => 'add'
              ]);
              ?>">
              Adicionar
            </a>
          </li>
        </ul>
      </li>
      <?php if ($loggedIn && $loggedIn->id == 1) { ?>
      <li>
        <div class="icon-link">
          <a href="<?= $this->Url->build([
                        'controller' => 'usuario',
                        'action' => 'index'
                    ]);
                    ?>">
            <i class='bx bxs-user' ></i>
            <span class="link_name">Usuários</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Usuários</a></li>
          <li>
            <a href="<?= $this->Url->build([
              'controller' => 'usuario',
              'action' => 'add'
              ]);
              ?>">
              Adicionar
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <!-- <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li> -->
      <li>
        <?php if ($loggedIn) { ?>
        <a href="<?= $this->Url->build([
              'controller' => 'Usuario',
              'action' => 'view',
              $loggedIn->id,
          ]);
          ?>">
          <div class="profile-details">
            <div class="profile-content">
              <?= $this->Html->image('usuario/' .  $loggedIn->foto, array('class' => 'table-img')) ?>
            </div>
            <div class="name-job">
              <div class="profile_name"><?= mb_strimwidth($loggedIn->email, 0, 10, "...") ?></div>
              <!-- <div class="job">Crypto Expert</div> -->
            </div>
            <a href="<?= $this->Url->build([
                'controller' => 'Usuario',
                'action' => 'logout'
            ]);
            ?>">
              <i class='bx bx-log-out'></i>
            </a>
          </div>
        </a>
        <?php } else  { ?>
        <a href="<?= $this->Url->build([
              'controller' => 'Usuario',
              'action' => 'login',
          ]);
          ?>">
          <div class="login-details">
            Log in
          </div>
        </a>
        <?php 
        } ?>
      </li>
    </ul>
  </div>
  <section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
    </div>

    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Meu</span>CRUD</a>
        </div>
        <div class="top-nav-links">
            <!-- <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a> -->
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

  </section>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
          arrow[i].addEventListener("click", (e)=>{
          let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
          arrowParent.classList.toggle("showMenu");
          });
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        sidebarBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
        });
    </script>
    <?= $this->fetch('script') ?>
</body>
</html>

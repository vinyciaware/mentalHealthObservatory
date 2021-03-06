<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('/adminLTE/bootstrap/css/bootstrap.css') ?>
    
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') ?>

    <?= $this->Html->css('/adminLTE/dist/css/AdminLTE.css') ?>
    <?= $this->Html->css('/adminLTE/dist/css/skins/skin-green-light.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <style>
        @import 'https://fonts.googleapis.com/css?family=Lato';

        *{
            font-family: 'Lato', sans-serif;
        }
    </style>
    
</head>
<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
        <?= $this->element('header'); ?>     
        <?= $this->element('sidebar'); ?>
        <div class="content-wrapper" style="min-height: 300px;">
            <?= $this->Flash->render() ?>
            <section class="content">
                <?= $this->fetch('content') ?>
            </section>

        </div>
       
        <?= $this->element('footer'); ?>


    </div>
    <?= $this->Html->script('/js/jquery.js') ?>
    <?= $this->Html->script('/adminLTE/bootstrap/js/bootstrap.js') ?>
    <?= $this->Html->script('/adminLTE/dist/js/app.js') ?>
    <script>
        $(document).ready(function(){
            <?= $this->fetch('script'); ?>
        })
    </script>
</body>
</html>

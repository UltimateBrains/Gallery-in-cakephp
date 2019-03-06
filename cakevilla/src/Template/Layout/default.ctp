<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['bootstrap.css','custom.css']) ?>
    <!--  <?= $this->Html->css('base.css') ?>  -->
  <!--  <?= $this->Html->css('style.css') ?> -->
    <?= $this->Html->script(['jquery.min.js','popper.min.js'],['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('bootstrap.min.js',['block' => 'scriptBottom']) ?>
   
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
   <?php echo $this->element('navbar') ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>

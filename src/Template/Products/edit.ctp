<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $product->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $product->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($product); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Product']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

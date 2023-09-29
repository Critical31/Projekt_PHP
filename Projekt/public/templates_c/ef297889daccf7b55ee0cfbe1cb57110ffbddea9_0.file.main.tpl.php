<?php
/* Smarty version 4.3.0, created on 2023-09-29 20:47:30
  from 'C:\xampp\htdocs\Projekt\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65171bc24e2ee4_64666624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef297889daccf7b55ee0cfbe1cb57110ffbddea9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\templates\\main.tpl',
      1 => 1696013240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65171bc24e2ee4_64666624 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
</head>

<body id="mainb">
    
<div id="header">
    <div id="header1">
        <form class="back-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Szukaj" class="back-button">
        </form>
    </div>
    <h1>Części Samochodowe</h1>
    <div id="header2">
        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
showCart">Koszyk</a>
        <?php if ('loggedInUserName') {?>
            <span class="loggedInUserName">Zalogowany jako: <?php echo $_smarty_tpl->tpl_vars['loggedInUserName']->value;?>
</span>
        <?php }?>
        <?php } else { ?>	
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Zaloguj</a>
        <?php }?>
    </div>
</div>    
<div id="topd">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_32212097265171bc24e2240_99399221', 'topd');
?>

</div>
<div id="lowd">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58025899465171bc24e29c6_69951668', 'lowd');
?>

</div>
</body>

</html><?php }
/* {block 'topd'} */
class Block_32212097265171bc24e2240_99399221 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_32212097265171bc24e2240_99399221',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'topd'} */
/* {block 'lowd'} */
class Block_58025899465171bc24e29c6_69951668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'lowd' => 
  array (
    0 => 'Block_58025899465171bc24e29c6_69951668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'lowd'} */
}

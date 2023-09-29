<?php
/* Smarty version 4.3.0, created on 2023-09-29 03:44:17
  from 'C:\xampp\htdocs\Projekt\app\views\RegisterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65162bf1606944_70894462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02f43cf7a1efcc65d2709ace1906634007b4cd7f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\RegisterView.tpl',
      1 => 1695951823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65162bf1606944_70894462 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169853867465162bf1602306_15212066', 'topd');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'topd'} */
class Block_169853867465162bf1602306_15212066 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_169853867465162bf1602306_15212066',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="register-show">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Rejestracja do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
        <div class="pure-control-group">
			<label for="id_name">name: </label>
			<input id="id_name" type="text" name="name" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zarejestruj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
    
</form>	
<form class="back-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
</div>
<?php
}
}
/* {/block 'topd'} */
}

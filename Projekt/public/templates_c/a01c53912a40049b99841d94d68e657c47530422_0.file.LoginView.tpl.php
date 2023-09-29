<?php
/* Smarty version 4.3.0, created on 2023-09-29 20:43:51
  from 'C:\xampp\htdocs\Projekt\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65171ae7442965_31006451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a01c53912a40049b99841d94d68e657c47530422' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\LoginView.tpl',
      1 => 1696013022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65171ae7442965_31006451 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118104156865171ae743e196_96192743', 'topd');
?>







<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'topd'} */
class Block_118104156865171ae743e196_96192743 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_118104156865171ae743e196_96192743',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="login-form">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
            <legend>Logowanie do systemu</legend>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login:</label>
                    <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" />
                </div>
                <div class="pure-control-group">
                    <label for="id_pass">Hasło:</label>
                    <input id="id_pass" type="password" name="pass" />
                </div>
                <div class="pure-controls">
                    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary" />
                </div>
            </fieldset>
        </form>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerShow" class="register-link">Zarejestruj</a>
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

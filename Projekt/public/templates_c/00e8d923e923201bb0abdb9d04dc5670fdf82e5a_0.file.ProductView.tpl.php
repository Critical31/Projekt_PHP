<?php
/* Smarty version 4.3.0, created on 2023-09-29 19:52:34
  from 'C:\xampp\htdocs\Projekt\app\views\ProductView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65170ee2ef4c06_66441481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00e8d923e923201bb0abdb9d04dc5670fdf82e5a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\ProductView.tpl',
      1 => 1696009953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ProductViewTable.tpl' => 1,
  ),
),false)) {
function content_65170ee2ef4c06_66441481 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27015989665170ee2ee3ef1_26369884', 'topd');
?>

    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18069597365170ee2ef1dc3_72672567', 'lowd');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'topd'} */
class Block_27015989665170ee2ee3ef1_26369884 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_27015989665170ee2ee3ef1_26369884',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="search-form-container">
        <form id="search-form" class="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productViewPart','table'); return false;">
            <legend>Opcje wyszukiwania</legend>
            <fieldset>
                <input type="text" name="sf_name" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->name;?>
" /><br />
                <select name="sf_option" id="option">
                    <option value="-" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->option == '-') {?>selected<?php }?>>Nazwa</option>
                    <option value="--" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->option == '--') {?>selected<?php }?>>Kod</option>
                    <option value="---" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->option == '---') {?>selected<?php }?>>Model</option>
                    <option value="----" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->option == '----') {?>selected<?php }?>>Marka</option>
                </select>
                <select name="sf_type" id="type">
                    <option value="all" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->type == 'all') {?>selected<?php }?>>Wszystkie</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['t']->value["rodzaj_czesci"];?>
" <?php if ($_smarty_tpl->tpl_vars['searchForm']->value->type == $_smarty_tpl->tpl_vars['t']->value["rodzaj_czesci"]) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['t']->value["rodzaj_czesci"];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <br />
                <button type="submit" class="search-button">Filtruj</button>
            </fieldset>
        </form>
    </div>
<?php
}
}
/* {/block 'topd'} */
/* {block 'lowd'} */
class Block_18069597365170ee2ef1dc3_72672567 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'lowd' => 
  array (
    0 => 'Block_18069597365170ee2ef1dc3_72672567',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="table">
        <?php $_smarty_tpl->_subTemplateRender("file:ProductViewTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
<?php
}
}
/* {/block 'lowd'} */
}

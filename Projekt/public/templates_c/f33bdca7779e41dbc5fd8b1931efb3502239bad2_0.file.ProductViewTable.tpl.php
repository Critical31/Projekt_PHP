<?php
/* Smarty version 4.3.0, created on 2023-09-29 19:18:19
  from 'C:\xampp\htdocs\Projekt\app\views\ProductViewTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_651706db1b8424_59406434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f33bdca7779e41dbc5fd8b1931efb3502239bad2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\ProductViewTable.tpl',
      1 => 1696007769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651706db1b8424_59406434 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="strona">
    <span>Strona:</span>
    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productView?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['currentPage']->value) {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
    <?php }
}
?>
</div>
<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
    <table class="product-table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kod</th>
                <th>Rodzaj</th>
                <th>Model</th>
                <th>Marka</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showDetails/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_czesci'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["kod_czesci"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rodzaj_czesci"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["model"]["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["marka"]["nazwa"];?>
</td></tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <?php } else { ?>
    <h1>Brak Wyników</h1>
    <?php }
}
}

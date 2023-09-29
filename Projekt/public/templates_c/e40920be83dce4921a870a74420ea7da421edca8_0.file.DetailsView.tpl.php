<?php
/* Smarty version 4.3.0, created on 2023-09-29 06:58:22
  from 'C:\xampp\htdocs\Projekt\app\views\DetailsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6516596edba161_13777580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e40920be83dce4921a870a74420ea7da421edca8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\DetailsView.tpl',
      1 => 1695963498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6516596edba161_13777580 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17972109346516596edb4464_28956289', 'topd');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'topd'} */
class Block_17972109346516596edb4464_28956289 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_17972109346516596edb4464_28956289',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="product-details">
    <table class="product-table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kod</th>
                <th>Rodzaj</th>
                <th>Model</th>
                <th>Generacja</th>
                <th>Marka</th>
                <th>Cena</th>
                <th>Ilość w magazynie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['nazwa'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['kod_czesci'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['rodzaj_czesci'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['model_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['generacja'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['marka_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['productDetails']->value['cena'];?>
 zł</td>
                <td><?php echo $_smarty_tpl->tpl_vars['quantity']->value;?>
</td>
            </tr>
        </tbody>
    </table>
    <form class="cart-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addToCart" method="post">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['productDetails']->value['id_czesci'];?>
">
        <input type="submit" value="Dodaj do koszyka" class="add-to-cart-button">
        <input type="number" name="quant" value="1" class="quantity-input">
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

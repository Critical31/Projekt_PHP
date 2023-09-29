<?php
/* Smarty version 4.3.0, created on 2023-09-29 06:59:42
  from 'C:\xampp\htdocs\Projekt\app\views\CartView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_651659be36bb51_09346904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '771413662c6d9b17a18b42684af857262cc0228f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt\\app\\views\\CartView.tpl',
      1 => 1695963577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651659be36bb51_09346904 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1239476393651659be35e724_73653917', 'topd');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'topd'} */
class Block_1239476393651659be35e724_73653917 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topd' => 
  array (
    0 => 'Block_1239476393651659be35e724_73653917',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="cart-view"> 
    <h1>Twój koszyk</h1>

    <?php if ($_smarty_tpl->tpl_vars['cartItems']->value) {?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Generacja</th>
                    <th>Kod</th>
                    <th>Rodzaj</th>
                    <th>Ilość</th>
                    <th>Suma</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cartItems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nazwa'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['cena'];?>
 zł</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['marka'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['model'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['generacja'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['kod'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['rodzaj'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ilosc'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['cena']*$_smarty_tpl->tpl_vars['item']->value['ilosc'];?>
 zł</td>
                        <td>
                            <form class="remove-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
removeFromCart" method="post">
                                <input type="hidden" name="idr" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_czesci'];?>
">
                                <input type="submit" value="Usuń" class="remove-button">
                            </form>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <p class="total-amount">Łącznie: <?php echo $_smarty_tpl->tpl_vars['totalAmount']->value;?>
 zł</p>
        <form class="checkout-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doCheckout" method="post">
            <input type="submit" value="Złóż zamówienie" class="checkout-button">
        </form>
        <form class="back-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
    <?php } else { ?>
        <p class="empty-cart-message">Twój koszyk jest pusty.</p>
        <form class="back-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
    <?php }?>
    </div>
<?php
}
}
/* {/block 'topd'} */
}

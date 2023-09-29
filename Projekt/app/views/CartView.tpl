{extends file="main.tpl"}

{block name=topd}
    <div class="cart-view"> 
    <h1>Twój koszyk</h1>

    {if $cartItems}
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
                {foreach $cartItems as $item}
                    <tr>
                        <td>{$item.nazwa}</td>
                        <td>{$item.cena} zł</td>
                        <td>{$item.marka}</td>
                        <td>{$item.model}</td>
                        <td>{$item.generacja}</td>
                        <td>{$item.kod}</td>
                        <td>{$item.rodzaj}</td>
                        <td>{$item.ilosc}</td>
                        <td>{$item.cena * $item.ilosc} zł</td>
                        <td>
                            <form class="remove-form" action="{$conf->action_root}removeFromCart" method="post">
                                <input type="hidden" name="idr" value="{$item.id_czesci}">
                                <input type="submit" value="Usuń" class="remove-button">
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
        <p class="total-amount">Łącznie: {$totalAmount} zł</p>
        <form class="checkout-form" action="{$conf->action_root}doCheckout" method="post">
            <input type="submit" value="Złóż zamówienie" class="checkout-button">
        </form>
        <form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
    {else}
        <p class="empty-cart-message">Twój koszyk jest pusty.</p>
        <form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
    {/if}
    </div>
{/block}

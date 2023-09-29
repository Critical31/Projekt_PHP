{extends file="main.tpl"}

{block name=topd}
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
                <td>{$productDetails.nazwa}</td>
                <td>{$productDetails.kod_czesci}</td>
                <td>{$productDetails.rodzaj_czesci}</td>
                <td>{$productDetails.model_name}</td>
                <td>{$productDetails.generacja}</td>
                <td>{$productDetails.marka_name}</td>
                <td>{$productDetails.cena} zł</td>
                <td>{$quantity}</td>
            </tr>
        </tbody>
    </table>
    <form class="cart-form" action="{$conf->action_root}addToCart" method="post">
        <input type="hidden" name="id" value="{$productDetails.id_czesci}">
        <input type="submit" value="Dodaj do koszyka" class="add-to-cart-button">
        <input type="number" name="quant" value="1" class="quantity-input">
    </form>
    <form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
</div>
{/block}

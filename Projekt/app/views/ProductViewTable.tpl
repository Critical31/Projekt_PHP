<div class="strona">
    <span>Strona:</span>
    {for $i=1 to $totalPages}
        <a href="{$conf->action_url}productView?page={$i}" {if $i == $currentPage}class="active"{/if}>{$i}</a>
    {/for}
</div>
{if $products}
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
            {foreach $products as $p}
            {strip}
            <tr>
                <td><a href="{$conf->action_url}showDetails/{$p.id_czesci}">{$p["nazwa"]}</a></td>
                <td>{$p["kod_czesci"]}</td>
                <td>{$p["rodzaj_czesci"]}</td>
                <td>{$p["model"]["nazwa"]}</td>
                <td>{$p["marka"]["nazwa"]}</td>
            </tr>
            {/strip}
            {/foreach}
        </tbody>
    </table>
    {else}
    <h1>Brak Wyników</h1>
    {/if}
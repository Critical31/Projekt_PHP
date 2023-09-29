{extends file="main.tpl"}

{block name=topd}
    <div class="search-form-container">
        <form id="search-form" class="search-form" onsubmit="ajaxPostForm('search-form','{$conf->action_root}productViewPart','table'); return false;">
            <legend>Opcje wyszukiwania</legend>
            <fieldset>
                <input type="text" name="sf_name" value="{$searchForm->name}" /><br />
                <select name="sf_option" id="option">
                    <option value="-" {if $searchForm->option == '-'}selected{/if}>Nazwa</option>
                    <option value="--" {if $searchForm->option == '--'}selected{/if}>Kod</option>
                    <option value="---" {if $searchForm->option == '---'}selected{/if}>Model</option>
                    <option value="----" {if $searchForm->option == '----'}selected{/if}>Marka</option>
                </select>
                <select name="sf_type" id="type">
                    <option value="all" {if $searchForm->type == 'all'}selected{/if}>Wszystkie</option>
                    {foreach $types as $t}
                    {strip}
                    <option value="{$t["rodzaj_czesci"]}" {if $searchForm->type == $t["rodzaj_czesci"]}selected{/if}>{$t["rodzaj_czesci"]}</option>
                    {/strip}
                    {/foreach}
                </select>
                <br />
                <button type="submit" class="search-button">Filtruj</button>
            </fieldset>
        </form>
    </div>
{/block}
    
{block name=lowd}
    <div id="table">
        {include file="ProductViewTable.tpl"}
    </div>
{/block}


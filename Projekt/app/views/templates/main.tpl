<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
    <script type="text/javascript" src="{$conf->app_url}/js/functions.js"></script>
</head>

<body id="mainb">
    
<div id="header">
    <div id="header1">
        <form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Szukaj" class="back-button">
        </form>
    </div>
    <h1>Części Samochodowe</h1>
    <div id="header2">
        {if count($conf->roles)>0}
        <a href="{$conf->action_root}logout">Wyloguj</a>
        <a href="{$conf->action_root}showCart">Koszyk</a>
        {if loggedInUserName}
            <span class="loggedInUserName">Zalogowany jako: {$loggedInUserName}</span>
        {/if}
        {else}	
        <a href="{$conf->action_root}loginShow">Zaloguj</a>
        {/if}
    </div>
</div>    
<div id="topd">
    {block name=topd}{/block}
</div>
<div id="lowd">
    {block name=lowd}{/block}
</div>
</body>

</html>
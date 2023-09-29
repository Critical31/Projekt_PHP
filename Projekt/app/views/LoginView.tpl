{extends file="main.tpl"}

{block name=topd}
    <div class="login-form">
        <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
            <legend>Logowanie do systemu</legend>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login:</label>
                    <input id="id_login" type="text" name="login" value="{$form->login}" />
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
        <a href="{$conf->action_root}registerShow" class="register-link">Zarejestruj</a>
        <form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
    </div>
{/block}







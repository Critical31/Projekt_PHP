{extends file="main.tpl"}

{block name=topd}
<div class="register-show">
<form action="{$conf->action_root}register" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Rejestracja do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
        <div class="pure-control-group">
			<label for="id_name">name: </label>
			<input id="id_name" type="text" name="name" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zarejestruj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
    
</form>	
<form class="back-form" action="{$conf->action_root}productView" method="post">
            <input type="hidden" name="sf_name" value="">
            <input type="hidden" name="sf_option" value="-">
            <input type="hidden" name="sf_type" value="all">
            <input type="submit" value="Powrót do przeglądania" class="back-button">
        </form>
</div>
{/block}
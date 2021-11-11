<h2>Üzenetküldés:</h2>
<script type="text/javascript" src="./logicals/connect.js"></script>
<form name="kapcsolat" action="./logicals/connect.php" onsubmit="return ellenoriz();" method="post">
    <div width: 500 px>
		Név (minimum 5 karakter):	
        <label><input type="text" id="nev" name="nev" size="22" maxlength="40"> </label>
        <br/>
		E-mail (kötelező):
        <label><input type="text" id="email" name="email" size="32" maxlength="40"> </label>
        <br/>
		Üzenet (kötelező):
        <label> <textarea id="szoveg" name="szoveg" cols="30" rows="10"></textarea>  </label>
        <br/>
        <input id="kuld" type="submit" value="Küld">
        <button onclick="ellenoriz();" type="button">Ellenőriz</button>
    </div>
</form>

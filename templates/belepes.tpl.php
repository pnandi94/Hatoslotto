    <form action = "?oldal=belep" method = "post">
      <fieldset>
        <legend>Bejlentkezés</legend>
        <br>
        <input type="text" name="uid" placeholder="Felhasználónév" required><br><br>
        <input type="password" name="pwd" placeholder="Jelszó" required><br><br>
        <input type="submit" name="login" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <form action = "?oldal=regisztral" method = "post">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="uid" placeholder="Felhasználónév" required><br><br>
		<input type="text" name="email" placeholder="Email cím" required><br><br>
        <input type="password" name="pwd" placeholder="Jelszó" required><br><br>
        <input type="password" name="pwdr" placeholder="Jelszó újra" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>

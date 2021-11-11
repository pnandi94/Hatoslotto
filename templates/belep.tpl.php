<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Bejelentkezett:</h1>
        Felhasználónév: <strong><?= $row['uid'] ?></strong>
        Email: <strong><?= $row['email'] ?></strong>
    <?php } else { ?>
        <h1>A bejelentkezés nem sikerült!</h1>
        <a href="?oldal=belepes" >Próbálja újra!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>

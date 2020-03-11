<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE ?></title>
</head>
<body>
<div>
    <h1>Trouve le mot en moins de <?= MAX_TRIALS ?> coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte <?= $_SESSION['nbLetters'] ;?> lettres&nbsp;:
        <?= $_SESSION['replacementString'] ;?> </p>
</div>
<div>
    <img src="../images/pendu<?= $_SESSION['trials'] ;?>.gif"
         alt="">
</div>
<div>
    <p>Voici les lettres que tu as déjà essayées&nbsp;:
<!--        Ce que j'avais fait-->
         <?php foreach($_SESSION['letters'] as $letter => $value):?>
            <?php if($value === false):?>
                <span><?= $letter ;?></span>
            <?php endif ;?>
        <?php endforeach;?>
    </p>
    <p>
<!--        Ce que le prof propose -->
        <?= $_SESSION['used_letters']; ?>
    </p>

</div>
<?php if($_SESSION['game_state']==='running'): ?>
    <form action="../index.php"
          method="post">
        <fieldset>
            <legend>Il te reste <?=  $_SESSION['remaining_trials'] ;?> essais pour sauver ta peau
            </legend>
            <div>
                <label for="triedLetter">Choisis ta lettre</label>
                <select name="triedLetter"
                        id="triedLetter">

                    <? foreach($_SESSION['letters'] as $letter => $value):?>
                        <?php if($value): ?>
                        <option value="<?= $letter ;?>"><?= $letter ;?></option>
                        <?php endif ;?>
                    <? endforeach;?>

                </select>
                <input type="submit"
                       value="essayer cette lettre">
            </div>
        </fieldset>
    </form>
<?php else: ?>
    <?php include($_SESSION['game_state'] . '.php') ?>
<?php endif; ?>
</body>
</html>
<?php
require('./configs/config.php');
if($_SERVER['REQUEST_METHOD']==='GET'){
    $words = file(FILE_PATH, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

    $_SESSION['word'] = strtolower($words[rand(0, count($words)-1)]);
    $_SESSION['nbLetters'] = strlen($_SESSION['word']);
    $_SESSION['trials'] = 0;
    $_SESSION['game_state'] = 'running';
    $_SESSION['remaining_trials'] = MAX_TRIALS;
    $_SESSION['replacementString'] = str_pad('', $_SESSION['nbLetters'], REPLACEMENT_CHAR);
    $_SESSION['letters'] = $letters;
    $_SESSION['used_letters'] = '';
}elseif($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['triedLetter'])){
        if(!array_key_exists($_POST['triedLetter'], $_SESSION['letters'])){
            header('Location: index.php');
            exit();
        }
        $triedLetter = strtolower($_POST['triedLetter']);
        $_SESSION['letters'][$_POST['triedLetter']] = false;
        $_SESSION['used_letters'] .= $triedLetter;

        $letterFound = false;
        for($i = 0; $i < $_SESSION['nbLetters']; $i++){
            if(substr($_SESSION['word'], $i, 1) === $triedLetter){
                $_SESSION['replacementString'][$i] = $triedLetter;
                $letterFound = true;
            }
        }
        if(!$letterFound){
            $_SESSION['trials']++;
            $_SESSION['remaining_trials'] = MAX_TRIALS - $_SESSION['trials'];
            if($_SESSION['remaining_trials'] < 1){
                $_SESSION['game_state'] = 'lost';
            }
        }else{
            if($_SESSION['word']===$_SESSION['replacementString']){
                $_SESSION['game_state'] = 'won';
            }
        }
    }
}else{
    header('Location: index.php');
    exit();
}
require('./views/start.php');
//tried letter soumis dans post

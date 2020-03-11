<?php
//contente
define('SITE_TITLE', 'Le pendu');
// Le nombre de coups auquel le joueur à droit
define('MAX_TRIALS', 8);
// Définir le mot à trouver
// Caractère qui cache le mot
define('REPLACEMENT_CHAR', '*');
//statu vainqueur
define('STATE', 'win');
define('FILE_PATH', './datas/words.txt');
session_start();
$letters = [
    "a" => true,
    "b" => true,
    "c" => true,
    "d" => true,
    "e" => true,
    "f" => true,
    "g" => true,
    "h" => true,
    "i" => true,
    "j" => true,
    "k" => true,
    "l" => true,
    "m" => true,
    "n" => true,
    "o" => true,
    "p" => true,
    "q" => true,
    "r" => true,
    "s" => true,
    "t" => true,
    "u" => true,
    "v" => true,
    "w" => true,
    "x" => true,
    "y" => true,
    "z" => true
];

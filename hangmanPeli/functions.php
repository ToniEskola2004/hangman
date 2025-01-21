<?php
session_start();

function resetScoreboard()
{
    if (isset($_POST['reset'])) {
        $_SESSION['gamesWon'] = 0;
        $_SESSION['gamesLost'] = 0;
        $_SESSION['incorrectGuesses'] = 0;
        $_SESSION['correctGuesses'] = 0;
    }
}

function setUpGame()
{
    if (!isset($_SESSION["word"])) {
        $isDisabled = false;
        $words = file(filename: "culture.txt");
        $word = rtrim(string: strtoupper(string: $words[array_rand(array: $words)]));
        $_SESSION['word'] = $word;
        $_SESSION['guesses'] = [];
        $_SESSION['lives'] = 6;
        if (!isset($_SESSION['gamesWon'])) {
            $_SESSION['gamesWon'] = 0;
        }
        if (!isset($_SESSION['gamesLost'])) {
            $_SESSION['gamesLost'] = 0;
        }
        if (!isset($_SESSION['incorrectGuesses'])) {
            $_SESSION['incorrectGuesses'] = 0;
        }
        if (!isset($_SESSION['correctGuesses'])) {
            $_SESSION['correctGuesses'] = 0;
        }
        if (!isset($_SESSION['winPercentage'])) {
            $_SESSION['winPercentage'] = 100;
        }
        if (!isset($_SESSION['r'])) {
            $_SESSION['r'] = 0;
        }
        if (!isset($_SESSION['g'])) {
            $_SESSION['g'] = 255;
        }
        return $isDisabled;
    }
}

function changeWord()
{
    if (isset($_POST['gategory'])) {
        $words = file(filename: $_POST["gategory"] . ".txt");
        $word = rtrim(string: strtoupper(string: $words[array_rand(array: $words)]));
        $_SESSION['word'] = $word;
    }
}

function dealWithGuesses()
{
    if (isset($_POST['guess'])) {
        if (!in_array(needle: $_POST['guess'], haystack: $_SESSION['guesses'])) {
            if (strpos(haystack: $_SESSION['word'], needle: $_POST['guess']) === FALSE) {
                $_SESSION['lives']--;
                $_SESSION['incorrectGuesses']++;
            } else {
                $_SESSION['correctGuesses']++;
            }
            changeColor();
            $_SESSION['guesses'][] = $_POST['guess'];
        } else {
            // echo "You have already guessed that letter<br>";
            alert("You have already guessed that letter<br>");
        }
    }
}

function changeColor()
{
    $_SESSION['winPercentage'] = $_SESSION['correctGuesses'] / ($_SESSION['incorrectGuesses'] + $_SESSION['correctGuesses']) * 100;
    if ($_SESSION['winPercentage'] >= 50) {
        $_SESSION['r'] = 255 - ($_SESSION['winPercentage'] - 50) * 5.1;
        $_SESSION['g'] = 255;
    } else {
        $_SESSION['g'] = $_SESSION['winPercentage'] * 5.1;
        $_SESSION['r'] = 255;
    }
}

function currentStateOfPlay()
{
    $_SESSION['lettersLeftToGuess'] = 0;
    $currentStateOfPlay = '';
    $wordLenght = strlen(string: $_SESSION['word']);
    for ($i = 0; $i < $wordLenght; $i++) {
        if (in_array(needle: $_SESSION['word'][$i], haystack: $_SESSION['guesses'])) {
            $currentStateOfPlay .= $_SESSION['word'][$i];
        } else {
            $currentStateOfPlay .= "_";
            $_SESSION['lettersLeftToGuess']++;
        }
        $currentStateOfPlay .= " ";
    }
    return $currentStateOfPlay;
}

function youWon()
{
    if ($_SESSION['lettersLeftToGuess'] == 0) {
        include "youWon.php";

        $_SESSION['gamesWon']++;
        unset($_SESSION['word']);
    }
}
function youLost()
{
    $_SESSION['gamesLost']++;
    unset($_SESSION['word']);
}

function alert($message)
{
    include "alert.php";
    return;
}

<?php
session_start();

function resetScoreboard() {
    if (isset($_POST['reset'])) {
        $_SESSION['gamesWon'] = 0;
        $_SESSION['gamesLost'] = 0;
        $_SESSION['incorrectGuesses'] = 0;
        $_SESSION['correctGuesses'] = 0;
    }   
}

function setUpGame() {
    if (!isset($_SESSION["word"])) {
        $words = file(filename: "words.txt");
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
    }
}

function dealWithGuesses() {
    if (isset($_POST['guess'])) {
        if (!in_array(needle: $_POST['guess'], haystack: $_SESSION['guesses'])) {
            if (strpos(haystack: $_SESSION['word'], needle: $_POST['guess']) === FALSE) {
                $_SESSION['lives']--;
                $_SESSION['incorrectGuesses']++;
            } else {$_SESSION['correctGuesses']++;}
            $_SESSION['guesses'][] = $_POST['guess'];
        } else {
            // echo "You have already guessed that letter<br>";
            alert("You have already guessed that letter<br>");
        }
    }
}

function currentStateOfPlay() {
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

function youWon() {
    if ($_SESSION['lettersLeftToGuess'] == 0) {
        include "youWon.php";

        $_SESSION['gamesWon']++;
        unset($_SESSION['word']);
    }
}
function youLost() {
    $_SESSION['gamesLost']++;
    unset($_SESSION['word']);
}

function remainingLetters() {
    $remainingLetters = array_diff(range('A', 'Z'), $_SESSION['guesses']);
    return $remainingLetters;
}

function alert($message) {
    include "alert.php";
    return;
}


?>
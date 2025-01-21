<?php
include "functions.php";

include "header.php";

include "category.php";

resetScoreboard();

setUpGame();

changeWord();

dealWithGuesses();

if ($_SESSION['lives'] <= 0) {
    include "youLost.php";

    youLost();
} else {
    $currentStateOfPlay = currentStateOfPlay();

    include "currentStateOfPlay.php";

    youWon();
}

if ($_SESSION['lives'] != 0 && $_SESSION['lettersLeftToGuess'] != 0) {
    include "form.php";
}
include "scoreboard.php";
include "footer.php";
include "modal.php";
?>
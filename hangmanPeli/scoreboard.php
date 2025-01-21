<div class="row" id="scoreBoardRow">
        <div class="col-md-6 text-center">
                <canvas id="canvas" width="350" height="300"></canvas>
        </div>
        <div class="col-md-6">
                <ul class="list-group">
                        <li class="list-group-item active">SCOREBOARD</li>
                        <li class="list-group-item d-flex justify-content-between">Games Won<span
                                        class="badge bg-primary"><?php echo $_SESSION['gamesWon'] ?></span></li>
                        <li class="list-group-item d-flex justify-content-between">Games Lost<span
                                        class="badge bg-primary"><?php echo $_SESSION['gamesLost'] ?></span></li>
                        <li class="list-group-item d-flex justify-content-between">Total Games Played<span
                                        class="badge bg-primary"><?php echo $_SESSION['gamesWon'] + $_SESSION['gamesLost'] ?></span></li>
                        <li class="list-group-item d-flex justify-content-between">Incorrect guesses<span
                                        class="badge bg-primary"><?php echo $_SESSION['incorrectGuesses'] ?></span></li>
                        <li class="list-group-item d-flex justify-content-between">Correct guesses<span
                                        class="badge bg-primary"><?php echo $_SESSION['correctGuesses'] ?></span></li>
                        <li class="list-group-item d-flex justify-content-between"><button type="button" class="btn btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">Reset scoreboard</button>
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Correct guesses rate" style="background-color: rgb(<?php echo $_SESSION['r'] ?>, <?php echo $_SESSION['g'] ?>, 0)">
                                        <?php echo round($_SESSION['winPercentage']) . "%"?>
                                </button>
                        </li>
                </ul>
        </div>
</div>
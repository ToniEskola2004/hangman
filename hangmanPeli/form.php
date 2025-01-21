<form class="row justify-content-center text-center mt-4" method="POST" action="">
    <div class="col-7 justify-content-center g-3">
        <?php
        foreach (range('A', 'Z') as $letter) {
            // Check if the current button should be disabled
            $disabledAttribute = (in_array($letter, $_SESSION['guesses'])) ? 'disabled' : '';
            echo '<button type="submit" name="guess" class="btn btn-primary col-auto m-1" value = "' . strtoupper(string: $letter) . '"' . $disabledAttribute . ' >' . strtoupper(string: $letter) . '</button>';
        }
        ?>
    </div>
</form>
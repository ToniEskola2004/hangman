<button id="gategory-toggle">Toggle</button>
<form id="gategory-selector" style="display:none;" class="dropdown" name="gategory" method="post" action="">
    <select class="form-select" aria-label="Default select example">
        <option value="culture">Culture</option>
        <option value="space">Space</option>
        <option value="history">History</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="hangman.php" class="btn btn-success" role="button">Play Again?</a>
</form>
<script>
    $("#gategory-toggle").on("click", function() {
        $("#gategory-selector").slideToggle("slow");
    });
</script>
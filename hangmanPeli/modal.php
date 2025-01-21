<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CAUTION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to reset the scoreboard?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">CANCEL</button>
                <form method="POST" action="hangman.php">
                    <li class="list-group-item d-flex justify-content-between"><button class="btn btn-danger"
                            name="reset">RESET SCOREBOARD</button></li>
                </form>
            </div>
        </div>
    </div>
</div>
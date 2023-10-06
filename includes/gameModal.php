<div class="modal fade" id="gameModalToggle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="gameToggleLabel"
                    style="font-size: 1.5rem;">Game Creation</h4>
                <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body text-white">
                <div class="mb-3 Input">
                    <label for="gameName" class="form-label">Game Name</label>
                    <input type="text" class="form-control" id="gameName" name="gameName" placeholder="Enter game name">
                    <small></small>
                </div>
                <div class="mb-3 Input">
                    <label for="gameType" class="form-label">Game Type</label>
                    <select class="form-select" id="gameType" aria-label="Default select example">
                        <option value="" disabled selected style="display:none;">Select Game</option>
                        <option value="football">Football</option>
                        <option value="Chess">Chess</option>
                        <option value="race">Race</option>
                    </select>
                    <small></small>
                </div>
                <div class="mb-3 Input">
                    <label for="gender" class="form-label">Gender Preference</label>
                    <select class="form-select" id="gender" aria-label="Default select example">
                        <option value="" disabled selected style="display:none;">Select a Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="open">Open</option>
                    </select>
                    <small></small>
                </div>
                <div class="Input playerNumber">
                    <label for="maxplayer" class="form-label">Maximum Number of
                        Players</label>
                    <input type="number" class="form-control" id="maxplayer" name="maxplayer"
                        placeholder="Enter Maximum Number of Players">
                    <small></small>
                </div>
                <div class="Input playerNumber">
                    <label for="mixplayer" class="form-label">Minimum Number of
                        Players</label>
                    <input type="number" class="form-control" id="minplayer" name="minplayer"
                        placeholder="Enter Minimum Number of Players">
                    <small></small>
                </div>
                <div class="mb-3 Input">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-control" placeholder="Enter Description of the Game"
                        name="description" rows="4" style="color:white;" required></textarea>
                    <small></small>
                </div>
                <button class="btn btn-primary d-grid w-100" id="createGame">Create Game</button>
            </div>
        </div>
    </div>
</div>

</html>
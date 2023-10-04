<div class="modal fade" id="gameModalToggle">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fw-bold"
                    style="width:100%;display:flex; justify-content:center;align-items:center;" id="gameToggleLabel"
                    style="font-size: 1.5rem;">Game Creation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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
                        <option selected>Select Game</option>
                        <option value="football">Football</option>
                        <option value="race">Race</option>
                    </select>
                    <small></small>
                </div>
                <div class="mb-3 Input">
                    <label for="gender" class="form-label">Gender Preference</label>
                    <select class="form-select" id="gameType" aria-label="Default select example">
                        <option selected>Select a Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <small></small>
                </div>

                <div class="mb-3 Input">
                    <label for="maxplayer" class="form-label">Maximum Number of
                        Players</label>
                    <input type="text" class="form-control" id="maxplayer" name="maxplayer"
                        placeholder="Enter Maximum Number of Players">
                </div>

                <div class="mb-3 Input">
                    <label for="mixplayer" class="form-label">Minimum Number of
                        Players</label>
                    <input type="text" class="form-control" id="minplayer" name="minplayer"
                        placeholder="Enter Minimum Number of Players">
                </div>
                <div class="mb-3 Input">
                    <label for="date" class="form-label">Date</label>
                    <div class="input-daterange" id="bs-datepicker-daterange">
                        <input id="date" type="text" placeholder="YYYY/MM/DD" class="form-control" name="startDate"
                            required>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100" id="sendCode">Create</button>
            </div>
        </div>
    </div>
</div>
</html>
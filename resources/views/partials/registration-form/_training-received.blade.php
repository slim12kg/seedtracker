@if(!auth()->user()->seedCompany())
    <div class="form-row">
        <div class="col-md-12">
            <label for="">Trainings received in seed production?</label>
        </div>
        <div class="col-md-12 mb-0point5">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="trainings_received" id="yes" value="yes" required>
                <label class="form-check-label font-normal" for="yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="trainings_received" id="no" value="no">
                <label class="form-check-label font-normal" for="no">No</label>
            </div>
        </div>
        <div class="group-content">
            <div class="col-md-11 p-0">
                <div class="col-md-6 mb-3">
                    <label for="crop_trained">Crop Trained</label>
                    <input type="text" class="form-control" id="crop_trained" name="trainings['crop_trained'][]" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="organizer_institute">Organizer Institute</label>
                    <input type="text" class="form-control" id="organizer_institute" name="trainings['organizer_institute'][]" required>
                </div>
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button class="btn btn-primary btn-sm" title="add more" onclick="event.preventDefault();addMore(this)"> &plus; </button>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
            <div class="col-md-11 p-0">
                <div class="col-md-4 mb-3">
                    <label for="organizer_name">Organizer Name</label>
                    <input type="text" class="form-control" id="organizer_name" name="trainings['organizer_name'][]" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="date_of_training">Date of Training</label>
                    <input type="date" class="form-control" id="date_of_training" name="trainings['date_of_training'][]" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="evidence">Evidence (pdf / jpeg)</label>
                    <input type="file" class="form-control p-3px" accept=".jpeg,.pdf,application/pdf,image/jpeg" id="evidence" name="trainings['evidence'][]" required>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 0.5%">&nbsp;</div>
        </div>
    </div>
@endif
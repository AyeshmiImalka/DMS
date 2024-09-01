<!-- Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRecordModalLabel">Add New Distributors</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addRecordForm">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="regName">Distributor Name</label>
                            <input type="text" class="form-control" id="regName" name="regName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="regId">Distributor ID</label>
                            <input type="text" class="form-control" id="regId" name="regId" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regDate">Registered Date</label>
                            <input type="date" class="form-control" id="regDate" name="regDate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="licenseYears">License (yrs)</label>
                            <input type="number" class="form-control" id="licenseYears" name="licenseYears" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="renewalUpdate">Renewal Update</label>
                            <input type="date" class="form-control" id="renewalUpdate" name="renewalUpdate" required readonly>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
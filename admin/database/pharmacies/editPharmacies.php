<!-- Edit Record Modal -->
<div class="modal fade" id="editRecordModal" tabindex="-1" role="dialog" aria-labelledby="editRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRecordModalLabel">Edit Pharmacies</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRecordForm">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editRegName">Registered Name</label>
                            <input type="text" class="form-control" id="editRegName" name="regName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editRegId">Registered ID</label>
                            <input type="text" class="form-control" id="editRegId" name="regId" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editRegDate">Registered Date</label>
                            <input type="date" class="form-control" id="editRegDate" name="regDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editLicenseYears">License (yrs)</label>
                            <input type="number" class="form-control" id="editLicenseYears" name="licenseYears" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editRenewalUpdate">Renewal Update</label>
                            <input type="date" class="form-control" id="editRenewalUpdate" name="renewalUpdate" required readonly>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

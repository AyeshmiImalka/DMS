<!-- Add Record Modal -->
<div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="addRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRecordModalLabel">Add New Payment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addRecordForm">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="paymentId">Payment ID</label>
                            <input type="int" class="form-control" id="paymentId" name="paymentId" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regName">Customer Name</label>
                            <input type="text" class="form-control" id="regName" name="regName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="amount">Amount</label>
                            <input type="decimal" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transactionType">Transaction Type</label>
                            <input type="varchar" class="form-control" id="transactionType" name="transactionType" required >
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
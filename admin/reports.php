<style>
  .date-input {
    display: none; /* Initially hide the date inputs */
  }
</style>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Export tickets as</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="exportForm" action="export.php" method="GET">
            <div class="d-flex justify-content-start">
                <label>Export as:</label>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="exportas" id="exportAsExcel" value="excel" checked>
                    <label class="form-check-label" for="exportAsExcel">
                        Excel
                    </label>
                </div>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="exportas" id="exportAsPDF" value="pdf">
                    <label class="form-check-label" for="exportAsPDF">
                        PDF
                    </label>
                </div>
            </div>
        
            <div class="my-3">
                <label for="filterSelect1" class="col-form-label" id="filterLabel">Filter tickets created in</label>
                <div class="w-50">
                    <select class="form-select" id="filterSelect1" name="date">
                        <option value="30days" selected>Last 30 days</option>
                        <option value="7days">Last 7 days</option>
                        <option value="yesterday">From yesterday</option>
                        <option value="setdate">Set date</option>
                        <option value="today">Today</option>
                    </select>
                </div>
                <div class="row" id="dateRow" style="display: none;">
                    <div class="col-6">
                        <label for="dateInput1" class="col-form-label">Date from:</label>
                        <input type="date" id="dateInput1" class="form-control" name="datefrom">
                    </div>
                    <div class="col-6">
                        <label for="dateInput2" class="col-form-label">Date to:</label>
                        <input type="date" id="dateInput2" class="form-control" name="dateto">
                    </div>
                </div>
            </div>
        
            <div>
                <label>Select fields to export</label>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ticket_number" id="ticketNumberCheckbox" name="fields[]">
                            <label class="form-check-label" for="ticketNumberCheckbox">
                                Ticket Number
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="requester_name" id="requesterNameCheckbox" name="fields[]">
                            <label class="form-check-label" for="requesterNameCheckbox">
                                Requester Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="requester_email" id="requesterEmailCheckbox" name="fields[]">
                            <label class="form-check-label" for="requesterEmailCheckbox">
                                Requester Email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="department" id="departmentCheckbox" name="fields[]">
                            <label class="form-check-label" for="departmentCheckbox">
                                Department
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="subject" id="subjectCheckbox" name="fields[]">
                            <label class="form-check-label" for="subjectCheckbox">
                                Subject
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="priority" id="priorityCheckbox" name="fields[]">
                            <label class="form-check-label" for="priorityCheckbox">
                                Priority
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="content" id="contentCheckbox" name="fields[]">
                            <label class="form-check-label" for="contentCheckbox">
                                Content
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ticket_status" id="ticketStatusCheckbox" name="fields[]">
                            <label class="form-check-label" for="ticketStatusCheckbox">
                                Ticket Status
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="date_created" id="dateCreatedCheckbox" name="fields[]">
                            <label class="form-check-label" for="dateCreatedCheckbox">
                                Date Created
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Export</button>
            </div>
        </form>
        
<script>
    function submitForm() {
        var form = document.getElementById('exportForm');
        var exportas = form.querySelector('input[name="exportas"]:checked').value;
        var date = form.querySelector('#filterSelect1').value;

        // Get selected checkboxes
        var checkboxes = form.querySelectorAll('input[name="fields[]"]:checked');
        var fields = [];
        checkboxes.forEach(function(checkbox) {
            fields.push(checkbox.value);
        });

        // Validate at least one checkbox is selected
        if (fields.length === 0) {
            alert("Please select at least one field to export.");
            return;
        }

        // If "Set date" is selected, get the values of date inputs
        if (date === 'setdate') {
            var datefrom = form.querySelector('#dateInput1').value;
            var dateto = form.querySelector('#dateInput2').value;

            // Ensure at least one date is filled before submission
            if (!datefrom && !dateto) {
                alert("Please select at least one date.");
                return;
            }

            // Check if both dates are filled and left date is not higher than the right date
            if (datefrom && dateto && datefrom > dateto) {
                alert("The start date cannot be higher than the end date.");
                return;
            }

            var url = 'export.php?exportas=' + exportas + '&datefrom=' + datefrom + '&dateto=' + dateto + '&fields=' + fields.join(',');
        } else {
            // Constructing the URL for other options
            var url = 'export.php?exportas=' + exportas + '&date=' + date + '&fields=' + fields.join(',');
        }

        // Redirecting to the constructed URL
        window.open(url, '_blank');
    }
</script>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('filterSelect1').addEventListener('change', function() {
    var dateRow = document.getElementById('dateRow');
    if (this.value === 'setdate') {
      dateRow.style.display = 'flex';
    } else {
      dateRow.style.display = 'none';
    }
});
</script>
<!-- Spacer to push the notification button to the end -->
<div class="flex-grow-1"></div>

<div class="nav-item dropdown mx-1 custom-dropdown">
    <button type="button" class="btn btn-sm btn-light position-relative rounded-pill notification" data-bs-toggle="dropdown">
     <i class="fa fa-bell me-lg-2"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger unread-count">
            <span class="visually-hidden">unread messages</span>
      </span>
    </button>
    
    <div class="dropdown-menu dropdown-menu-end m-0 shadow p-2 bg-body rounded" style="width: 400px;">
        
        
        <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    function load_unseen_notification(view = '') {
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: { view: view },
            dataType: "json",
            success: function (data) {
                $('.custom-dropdown .dropdown-menu').html(data.header + data.notification);
                if (data.unseen_notification > 0) {
                    $('.custom-dropdown .unread-count').html(data.unseen_notification).show();
                } else {
                    $('.custom-dropdown .unread-count').hide();
                }
            }
        });
    }

    load_unseen_notification();

    $(document).on('click', '.notification', function () {
        $('.unread-count').html('');
        load_unseen_notification('yes');
    });

    setInterval(function () {
        load_unseen_notification();
    }, 5000);
});


</script>

<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script><!--bootstrapJS-->
<!--startPlugins-->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ url('assets/js/pace.min.js') }}"></script>
<!--endPlugins-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script><!-- Select 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> <!-- Datepicker-->
<script src="{{ url('assets/js/app.js') }}"></script><!--appJS-->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(function() {
        $('#datepicker').datepicker();
    });

    //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
@stack('script')

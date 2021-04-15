</div>
<!-- -------------------------------------------------------------- -->
<!-- Login box.scss -->
<!-- -------------------------------------------------------------- -->
</div>
<!-- -------------------------------------------------------------- -->
<!-- All Required js -->
<!-- -------------------------------------------------------------- -->
<script src="<?php echo base_url(''); ?>src/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(''); ?>src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".preloader").fadeOut();
    // ---------------------------
    // Login and Recover Password
    // ---------------------------
    $('#to-recover').on("click", function() {
        $("#loginform").hide();
        $("#recoverform").fadeIn();
    });

    $('#to-login').on("click", function() {
        $("#loginform").fadeIn();
        $("#recoverform").hide();
    });

    $('#to-register').on("click", function() {
        $("#loginform").hide();
        $("#registerform").fadeIn();
    });

    $('#to-login2').on("click", function() {
        $("#loginform").fadeIn();
        $("#registerform").hide();
    });


    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>

</html>
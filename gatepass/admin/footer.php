<div class="container">
    <!-- Login Modal -->
    <div class="modal fade" id="admin-login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="admin/signin.inc.php">
                    <div class="modal-header">
                        <h1 class="h3 font-weight-normal">Admin Login</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input required="" type="text" name="email" class="form-control mb-3 border border-success" placeholder="E-mail" required autofocus>
                        <input required="" type="password" name="pwd" class="form-control border border-success" placeholder="Password" required autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row d-flex justify-content-center">
            <blockquote class="blockquote mb-0">
                <div class="px-3 py-3 pb-md-4 mx-auto text-center">
                    <p class="h3">Gate Pass</p>
                    <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
                    <?php if (!isset($_SESSION['u_id'])): ?>
                        <a href="#" data-toggle="modal" data-target="#admin-login-modal">Admin Login</a>
                    <?php endif; ?>
                </div>
            </blockquote>
        </div>
    </footer>
</div>
<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <!-- script -->
		<!-- Include Date Range Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script>
            $(document).ready(function(){
                var date_input=$('input[id="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'dd/mm/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                })
            })
        </script>
    </body>
</html>
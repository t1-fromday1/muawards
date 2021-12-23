        <!-- Footer-->
        <footer class="bg-black py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Rules and Regulations</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="https://www.maseno.ac.ke"><img src="images/maseno-logo.png"
                                alt="..." width="40px"></a>
                    </div>
                    <div class="col-auto">
                        <div class="small m-0 text-white"><a style="font-size: 10px;"
                                class="btn btn-sm btn-outline-info" href="http://wa.me/+254743048147">ToonDev</a></div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script language=javascript>
            document.getElementById("next").onclick = function() {
                document.getElementById("first").style.display = "none";
                document.getElementById("last").style.display = "block";
            }
            document.getElementById("back").onclick = function() {
                document.getElementById("first").style.display = "block";
                document.getElementById("last").style.display = "none";
            }

                      
        </script>
</body>
</html>
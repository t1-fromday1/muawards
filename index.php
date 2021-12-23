<?php
 include_once 'header.php';
?>
<?php 
            if(isset($_POST['callaction'])) {
                include 'config.php';
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $sql = "INSERT INTO `emails`(`email`) VALUES ('$email')";

                if($sql) {
                    echo "insert success";
                } else {
                    echo "not success";
                }
            }
        ?>
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="pyro">
                <div class="before"></div>
                <div class="after"></div>
            </div>
            <?php 
    include 'includes/pyroeffect.php';
?>
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start" style="overflow: hidden;">
                    <h5 class="display-5 fw-bolder text-white mb-3" style="font-size:2.5rem;">Maseno University Awards
                    </h5>
                    <h5 class="fw-bold" style="font-size:1rem;">First Edition 2021</h5>
                    <p class="lead fw-normal text-white mb-4">MUAWARDS is here for the first time for your talent
                        representation. <br>Join us to celebrate the legends who have made 2021 a great year, we believe
                        that is you and you deserve this platform and appreciation for your input on your respective
                        field. There are more than enough categories to contest for!<br><br>Registration is a one off
                        fee of Kshs. 300.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="register.php">Register</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#categories">View Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-xl-block text-center">
                <img style="position: relative" class="img-fluid rounded-3 my-8" src="images/papichulo.png" alt="..." />
            </div>
        </div>
    </div>
</header>
<!-- Plan of activities section-->
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 class="fw-bolder mb-0">Here is the plan of activities.</h2>
            </div>
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <div class="col mb-5 h-100" class="card-hover">
                        <div class="feature bg-primary text-white rounded-3 mb-3"
                            style="background: linear-gradient(#fcd202, #84077b)"><i class="bi bi-person-plus"></i>
                        </div>
                        <h2 class="h5">Nominee Registration</h2>
                        <p class="mb-0">Nominees will register on this website from 11th October
                            2021.</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100" class="card-hover">
                        <div style="background: linear-gradient(#fcd202, #84077b)"
                            class="feature bg-primary text-white rounded-3 mb-3">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h2 class="h5">The Award Letter</h2>
                        <p class="mb-0">Successfully registered nominees will receive award letters via email with their
                            voting link and instructions on how to track their votes.</p>
                    </div>
                    <div class="col mb-5 h-100" class="card-hover">
                        <div class="feature bg-primary text-white rounded-3 mb-3"
                            style="background: linear-gradient(#fcd202, #84077b)"><i class="bi bi-pencil-square"></i>
                        </div>
                        <h2 class="h5">Voting</h2>
                        <p class="mb-0">Voting will commence once the nominee registration is over. Good luck!</p>
                    </div>
                    <div class="col h-100" class="card-hover">
                        <div style="background: linear-gradient(#fcd202, #84077b)"
                            class="feature bg-primary text-white rounded-3 mb-3"><i class="bi bi-award"></i>
                        </div>
                        <h2 class="h5">Contestant Award</h2>
                        <p class="mb-0">Winning contestants will be announced and awarded.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 my-5" id="categories">
        <div class="row gx-5">
            <style>
            .categories .col-md-3 {
                width: 50%;
            }

            .categories .col-md-12 a {
                text-decoration: none;
                color: #fff;
            }

            .categories .col-md-12 {
                padding: 10px;
                background: #84077b;
                border-radius: 10px;
                cursor: pointer;
            }

            .categories .col-md-12:hover {
                background: linear-gradient(#fcd202, #84077b);
            }
            </style>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h2 class="fw-bolder mb-0">Nomination Categories</h2>
            </div>
            <div class="col h-100" class="card-hover">
                <div class="row categories">
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Artist Of The Year">Artist Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Dj Of The Year">Dj Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Male Model Of The Year">Male Model Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Female Model of the year">Female Model Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Song Of The Year">Song Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Dance Crew Of The Year">Dance Crew Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Blogger Of The Year">Blogger Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Club Affiliate Of The Year">Club Affiliate Of The Year</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Fine Artist Of The Year">Fine Artist Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Band Of The Year">Band Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100"><a href="./register.php?cat=Poet Of The Year">Poet Of The Year</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Actor Of The Year">Actor Of The
                                Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Rap Act Of The Year">Best Rap Act Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Upcoming Of The Year">Upcoming Artist Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Photographer Of The Year">Photographer Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Feature Film Of The Year">Feature Film Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Most Influential Student Of The Year">Most Influential Student
                                Of The Year</a></div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="col-md-12 h-100" title="Click to register"><a
                                href="./register.php?cat=Graphic Designer Of The Year">Graphic Designer Of The Year</a></div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Testimonial section-->
<div class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-10 col-xl-7">
                <div class="text-center">
                    <div class="fs-5 mb-4 fst-italic">From the office of Sports and Entertainment, I wish to thank you
                        for your interest to shine among the best. Good luck comrade, let us work together and ensure
                        you get the right platform.
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle me-3" width="50px" src="images/pp.jpeg" alt="..." />
                        <div class="fw-bold">
                            Pappichulo
                            <span class="fw-bold text-primary mx-1">/</span>
                            Sports & Entertainment, Maseno University.
                        </div>
                    </div>
                    <br>
                    <br>
                    <img src="images/loog.png" width="100px" alt="....">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to action-->
<aside style="background: linear-gradient(#fcd202, #84077b)" class="bg-primary rounded-3 p-4 p-sm-5 mt-5">
    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
        <div class="mb-4 mb-xl-0">
            <div class="fs-3 fw-bold text-white">Latest updates delivered to you.
            </div>
            <div class="text-white-50">Sign up for our newsletter to receive these updates via email.
            </div>
        </div>
        <form action="index.php" method="post">
            <div class="ms-xl-4">
                <div class="input-group mb-2">
                    <input class="form-control" name="email" type="text" placeholder="Email address..."
                        aria-label="Email address..." aria-describedby="button-newsletter" />
                    <input type="submit" class="btn btn-outline-light" name="callaction" id="button-newsletter"
                        value="Sign up">
                </div>
                <div class="small text-white-50">We care about privacy, and will never share your data.
                </div>
            </div>
        </form>
    </div>
</aside>
<br>
<?php include_once 'footer.php'; ?>
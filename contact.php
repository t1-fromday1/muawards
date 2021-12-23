<?php
    include_once 'header.php';
?>

<!-- Page content-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary text-white rounded-3 mb-3"
                    style="background: linear-gradient(#fcd202, #84077b)"><i class="bi bi-envelope"></i>
                </div>
                <h1 class="fw-bolder">Talk to us</h1>
                <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form method="get" action="contact.php?status=">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" required placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" required placeholder="name@example.com"
                                data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" required placeholder="(123) 456-7890"
                                data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" required type="text"
                                placeholder="Enter your message here..." style="height: 10rem"
                                data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div><input style="background: #84077b;" class="btn btn-primary btn-lg" type="submit"
                                value="Submit"></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Contact cards-->
        <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
            <div class="col">
                <div class="feature bg-primary text-white rounded-3 mb-3" style="background:
                    linear-gradient(#fcd202, #84077b)"><i class="bi bi-chat-dots"></i>
                </div>
                <div class="h5 mb-2">Chat with us</div>
                <p class="text-muted mb-0">Join the dedicated <a href="http://">WhatsApp groups</a> to interact with
                    other
                    colleagues.</p>

            </div>
            <div class="col">
                <div class="feature bg-primary text-white rounded-3 mb-3" style="background:
                    linear-gradient(#fcd202, #84077b)"><i class="bi bi-people"></i></div>
                <div class="h5">Have any questions?</div>
                <p class="text-muted mb-0">Contact us, we reply quickly and always there to make sure you get work done
                    as fast as possible.</p>
            </div>
            <div class="col">
                <div class="feature bg-primary text-white rounded-3 mb-3" style="background:
                    linear-gradient(#fcd202, #84077b)"><i class="bi bi-question-circle"></i></div>
                <div class="h5">Support center</div>
                <p class="text-muted mb-0">We have a dedicated support system to help you whenever you stumble into a
                    problem.</p>
            </div>
            <div class="col">
                <div class="feature bg-primary text-white rounded-3 mb-3" style="background:
                    linear-gradient(#fcd202, #84077b)"><i class="bi bi-telephone"></i>
                </div>
                <div class="h5">Call us</div>
                <p class="text-muted mb-0">Call us anytime, our 24/7 telephone line is <br><span
                        style="font-weight: 700;">+254798 836 552</span>
                </p>
            </div>
        </div>
    </div>
</section>
</main>
<?php include_once 'footer.php'; ?>
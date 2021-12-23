<?php
    session_start(); 
    include 'header.php'; 
?>

<section class="py-5" style="background: linear-gradient(#fcd202, #84077b); overflow: hidden; height: 100vh;">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-5 mb-3"
                style="padding: 20px 30px; border-radius: 5px; color: rgba(255, 255, 255, 0.75);">
                <h2 class="fw-bolder mb-3">Nominee Registration</h2>
                <style>
                .label {
                    margin-bottom: 15px;
                    position: relative;
                    border-bottom: 1px solid #ddd;
                }

                .input {
                    width: 100%;
                    padding: 10px 0px;
                    margin-top: 10px;
                    border: none;
                    outline: none;
                    background-color: transparent;
                }

                .input::placeholder {
                    opacity: 0;
                }

                .spann {
                    position: absolute;
                    top: 0;
                    left: 0;
                    transform: translateY(30px);
                    font-size: 0.825em;
                    transition-duration: 300ms;
                }

                .label:focus-within>.spann,
                .input:not(:placeholder-shown)+.spann {
                    color: purple;
                    transform: translateY(0px);
                }
                </style>
                <?php 
                        if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'exists') {

                        }
                    
                   ?> 
                   <div style="background-color: #84077b; padding: 10px; border-radius: 10px; margin-bottom: 10px;"><p style="margin: 0;">You have already submitted your details, please confirm your payment by sending a screenshot via WhatsApp<span style="font-weight: 700; color: #fff;"><a style="cursor: pointer; color: #000;" href="http://wa.me/+254740715620"><br>Click Here.</a></span></p></div>
                        <?php }?>
                <p class="lead fw-normal text-light mb-1" style="font-size: 15px;">Fill this form with appropriate
                    details to register</p>
                   
                <form action="./backend/register.php" method="post" enctype="multipart/form-data">
                    <div id="first">
                        <div class="form-group input">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="fname" class="label">
                                        <input type="text" name="fname" class="input" required placeholder="e.g. Brian"
                                            id="exampleInput1" placeholder="e.g. Brian">
                                        <span class="spann">First Name</span>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="lname" class="label">
                                        <input type="text" class="input" required placeholder="e.g. Brian" name="lname"
                                            placeholder="e.g. Marara" required>
                                        <span class="spann">Last Name</span>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="label">
                                        <input type="text" class="input" required name="email"
                                            placeholder="abc@mail.com" required>
                                        <span class="spann">Email Address</span>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="label">
                                        <input type="text" class="input" required name="phone" placeholder="2547"
                                            required>
                                        <span class="spann">Phone Number</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="button" id="next" value="Next"
                                            class="btn btn-primary btn-lg px-4 me-sm-3" style="margin-bottom: 100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="last" style="display: none">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="reg_no" class="label">
                                        <input type="text" class="input" name="reg_no" required
                                            placeholder="e.g. CI/00147/018" required>
                                        <span class="spann">Admission Number</span>
                                    </label>
                                </div>
                                <style>
                                select {
                                    color: #fff;
                                    background: #84077b;
                                }

                                select option {
                                    /* margin: 40px; */
                                    background: #fff;
                                    color: #000;
                                }
                                </style>
                                <div class="col-md-6 mb-3">
                                    <select style="background: #84077b; border-radius: 5px; " name="year"
                                        id="year-of-study" class="input" required>
                                        <option style="color: #fff;" class="input" value="year1">Year One</option>
                                        <option style="color: #fff;" class="input" value="year2">Year Two</option>
                                        <option style="color: #fff;" class="input" value="year3">Year Three</option>
                                        <option style="color: #fff;" class="input" value="year4">Year Four</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px; margin-bottom: 8px;" for="pic"
                                        class="bmd-label-floating">Upload a professional picture</label>
                                    <input type="file" name="pic" class="form-control" id="exampleInput1"
                                        aria-required="true" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        </style>
                                        <select style="background: #84077b; border-radius: 5px;" name="category"
                                            id="nom-category" class="input" required>
                                            <?php if (isset($_GET['cat'])) {
                                                $category = $_GET['cat']; ?>
                                            <option selected value="<?php echo $category ?>"><?php echo $category ?>
                                            </option>
                                            <?php } ?>
                                            <option value="ArtistOfTheYear">Artist Of The Year</option>
                                            <option value="DjOfTheYear">Dj Of The Year</option>
                                            <option value="ActorOfTheYear">Actor Of The Year</option>
                                            <option value="MaleModelOfTheYear">Male Model of the year</option>
                                            <option value="FemaleModelOfTheYear">Female Model of the year</option>
                                            <option value="SongOfTheYear">Song Of The Year</option>
                                            <option value="DanceCrewOfTheYear">Dance Crew Of The Year</option>
                                            <option value="BloggerOfTheYear">Blogger Of The Year</option>
                                            <option value="ClubAffiliateOfTheYear">Club Affiliate Of The Year</option>
                                            <option value="BandOfTheYear">Band Of The Year</option>
                                            <option value="PoetOfTheYear">Poet Of The Year</option>
                                            <option value="BestRapActOfTheYear">Best Rap Act Of The Year</option>
                                            <option value="UpcomingArtistOfTheYear">Upcoming Artist Of The Year</option>
                                            <option value="PhotographerOfTheYear">Photographer Of The Year</option>
                                            <option value="FeatureFilmOfTheYear">Feature Film Of The Year</option>
                                            <option value="SportsmanOfTheYear">Sportsman Of The Year</option>
                                            <option value="MostInfluentialStudentOfTheYear">Most Influential Student Of
                                                The Year</option>
                                            <option value="GraphicDesignerOfTheYear">Graphic Designer Of The Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="button" id="back" value="Back"
                                        class="btn btn-primary btn-lg px-4 me-sm-3">
                                    <input type="submit" name="register" value="Register"
                                        class="btn btn-primary btn-lg px-4 me-sm-3">
                                </div>

                            </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    <?php include_once 'footer.php'; ?>
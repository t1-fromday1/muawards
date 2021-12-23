<?php include 'header.php';?>

<style>
/* general styling */
.containe {
  color: #333;
  margin: 0 auto;
  text-align: center;
  color: #fff;
}

h1 {
  font-weight: normal;
  letter-spacing: .125rem;
  text-transform: uppercase;
}

.voter {
  display: inline-block;
  font-size: 1.5em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}

.voter span {
  display: block;
  font-size: 4.5rem;
}

@media all and (max-width: 768px) {
  h1 {
    font-size: calc(1.8rem * var(--smaller));
  }
  
  .voter {
    font-size: calc(1.90rem * var(--smaller));
  }
  
  .voter span {
    font-size: calc(7.775rem * var(--smaller));
  }
}
</style>

<header class="bg-dark py-5">
<div style="height: 100vh;">
<div style="height: 100px;">

</div>
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="containe">
                <h1 id="headline">VOTING STARTS IN</h1>
                <div id="countdown">
                    <ul>
                        <li class="voter"><span id="days"></span>days</li>
                        <li class="voter"><span id="hours"></span>Hours</li>
                        <li class="voter"><span id="minutes"></span>Minutes</li>
                        <li class="voter"><span id="seconds"></span>Seconds</li>
                    </ul>
                </div>
            </div>
        </div>
</div>
</header>
</div>
<script>
      (function () {
            const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;

            //I'm adding this section so I don't have to keep updating this pen every year :-)
            //remove this if you don't need it
            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "10/25/",
                voteday = dayMonth + yyyy;
            
            today = mm + "/" + dd + "/" + yyyy;
            if (today > voteday) {
                voteday = dayMonth + nextYear;
            }
            //end
            
            const countDown = new Date(voteday).getTime(),
                x = setInterval(function() {    

                    const now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    //do something later when date is reached
                    if (distance < 0) {
                    document.getElementById("headline").innerText = "Voting has commenced. <a href='#'>Click here</a> to vote";
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("content").style.display = "block";
                    clearInterval(x);
                    }
                    //seconds
                }, 0)
            }());
    </script>

<?php include 'footer.php';?>
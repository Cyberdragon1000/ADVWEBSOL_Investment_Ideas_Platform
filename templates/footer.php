<div class="mt-4">
      <footer class="text-center text-white" style="background-color: #009879">
        <div class="container pt-1 g-0">
          <div class="row my-0 mx-1">
            <div class="col-3 text-center">
              <p class="h5">About Us</p>
              <p class="h6">
                We help you find the best ideas to invest in. We connect people
                with ideas with those who can fund them.
              </p>
            </div>
            <span class="col-1"></span>
            <div class="col-2">
              <p class="h5">Sitemap</p>
              <ul class="mb-0">
                <li>
                  <a href="#" class="text-white">Home</a>
                </li>
                <li>
                  <a href="#" class="text-white">Log in</a>
                </li>
              </ul>
            </div>
            <span class="col-1"></span>
            <div class="col-2">
              <p class="h5">Useful</p>

              <ul class="mb-0">
                <li>
                  <a href="#" class="text-white">FAQ</a>
                </li>
                <li>
                  <a href="#" class="text-white">Help</a>
                </li>
              </ul>
            </div>
            <span class="col-1"></span>
            <div class="col-2">
              <p class="h5">About us</p>

              <ul class="mb-0">
                <li>
                  <a href="#" class="text-white">contact</a>
                </li>
                <li>
                  <a href="#" class="text-white">who we are</a>
                </li>
              </ul>
            </div>
          </div>

          <hr class="hr-light m-0 g-0" style="opacity: 0.75" />
          <section class="">
            <p class="d-flex justify-content-center align-items-center mb-0">
            <?= (session_status() == PHP_SESSION_ACTIVE) ? 'Signed in as ' . session()->get('first_name'):'' ?>
              <span class="mx-3 <?= (session_status() == PHP_SESSION_ACTIVE) ? 'd-none' : '' ?>">Register for free</span>
            <button type="button" class="btn btn-outline-light <?= (session_status() == PHP_SESSION_ACTIVE) ? 'd-none' : '' ?>">Sign up!</button>
            </p>
          </section>

          <hr class="hr-light m-0 g-0" style="opacity: 0.75" />
          <section class="text-center">
          <a class="btn btn-outline-light m-1" href="https://www.instagram.com/stonks/">
              <i class="bi bi-instagram"></i>
            </a>
            <a class="btn btn-outline-light m-1" href="https://twitter.com/STONKSFinance">
              <i class="bi bi-twitter"></i>
            </a>
            <a class="btn btn-outline-light m-1" href="https://www.facebook.com/stonksdotcom/">
              <i class="bi bi-facebook"></i>
            </a>
          </section>
        </div>
        <div class="text-center" style="background-color: grey">
          Trade Mark Company
          <a class="text-white" href="/">Stonks</a>
        </div>
      </footer>
    </div>

    <style>
      body {
        background-image: url("https://images.unsplash.com/photo-1669951584605-4deba095a87f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80");
        background-color: #cccccc;
        font-family: "Andika", sans-serif;
      }
      th:first-child,
      td:first-child {
        position: sticky;
        left: 0px;
      }
      thead,
      #unmovedtitle {
        background-color: #009879;
      }
      .approval {
        position: sticky;
        right: 0px;
      }
      #decision {
        background-color: #009879;
      }
    </style>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <title>Idea Page Editable</title>
    <style>
      input {
        background-color: #f7f6f8 !important;
      }
      .form-control_border {
        border: 0;
      }
      @media (min-width: 1200px) {
        .container {
          max-width: 970px;
        }
      }
      body {
        padding: 20px;
      }
      label {
        color: #616162;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form action="/newidea" method="post">
        <!-- section 1 -->
        <div class="h-100 d-flex justify-content-center">
          <div class="jumbotron">
            <label for="Title">Title</label>
            <div class="d-flex align-items-center">
              <input
                type="text" name="title"
                class="form-control form-control_border"
                placeholder="Idea Title"
                aria-label="Idea Title"
              />
            </div>
          </div>
        </div>
        <!-- section 2 -->
        <div>
          <div class="form-group mb-4">
            <label for="Abstract">Abstract</label>
            <textarea
              class="form-control"
              id="briefDescription" name="abs"
              placeholder="Brief description of the idea"
              rows="3"
            ></textarea>
          </div>
        </div>
        <!-- section 3 -->
        <div>
          <div class="row mb-4">
          <div class="col">
              <label for="Currency">Currency</label>
              <input
                type="text" name="cur"
                class="form-control form-control_border w-50"
                placeholder="Enter the currency"
                aria-label="Enter the currency"
              />
            </div>
            <div class="col">
              <label for="RiskRating">Risk Rating</label>
              <input
                type="text" name="risk"
                class="form-control form-control_border"
                placeholder="Risk"
                aria-label="Risk"
              />
            </div>
          </div>
        </div>
        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="PublishedDate">Published Date</label>
              <input
                type="date" name="pd"
                class="form-control"
                placeholder="Published Dat"
                aria-label="Published Date"
              />
            </div>
            <div class="col">
              <label for="ExpiryDate">Expiry Date</label>
              <input
                type="date" name="ed"
                class="form-control"
                placeholder="Expiry Date"
                aria-label="Expiry Date"
              />
            </div>
          </div>
        </div>
        <div>
          <div class="form-group mb-4">
            <label for="Content">Content</label>
            <textarea
              class="form-control" name="cont"
              id="detailed_description"
              placeholder="Detailed description of the idea."
              rows="3"
            ></textarea>
          </div>
        </div>
        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Instruments">Instruments</label>
              <input
                type="text" name="int"
                class="form-control form-control_border"
                placeholder="Enter the Instruments"
                aria-label="Enter the Instruments"
              />
            </div>
            <div class="col">
              <label for="ProductType">Product Type</label>
              <input
                type="text" name="pt"
                class="form-control form-control_border"
                placeholder="Enter the Product Type"
                aria-label="Enter the Product Type"
              />
            </div>
          </div>
        </div>
        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="MajorSector">Major Sector</label>
              <input
                type="text" name="maj"
                class="form-control form-control_border"
                placeholder="Enter the Major Sector"
                aria-label="Enter the Major Sector"
              />
            </div>
            <div class="col">
              <label for="MinorSector">Minor Sector</label>
              <input
                type="text" name="min"
                class="form-control form-control_border"
                placeholder="Enter the Minor Sector"
                aria-label="Enter the Minor Sector"
              />
            </div>
          </div>
        </div>
        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Region">Region</label>
              <input
                type="text" name="reg"
                class="form-control form-control_border"
                placeholder="Enter the Region"
                aria-label="Enter the Region"
              />
            </div>
            <div class="col">
              <label for="Country">Country</label>
              <input
                type="text" name="con"
                class="form-control form-control_border"
                placeholder="Enter the Country"
                aria-label="Enter the Country"
              />
            </div>
          </div>
        </div>
        <input
                value=<?= session('id') ?> type="hidden" name="auth"
                />
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary align-items-center">
            Submit
          </button>
        </div>
      </form>
    </div>
  </body>
</html>

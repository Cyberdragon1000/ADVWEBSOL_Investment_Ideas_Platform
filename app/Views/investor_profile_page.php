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
    <title>Investor's Profile Page</title>
  </head>

  <body>
    <div class="container mb-4">
      <form action="" class="mb-4">
        <!-- section 1 -->
        <div class="w-50 mb-4">
          <div class="jumbotron">
            <label for="Name">Name</label>
            <div class="d-flex align-items-center">
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Investor Name"
                aria-label="Investor Name"
              />
            </div>
          </div>
        </div>

        <!-- section 3 -->
        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Expiry Date">Expiry date</label>
              <input
                type="date"
                class="form-control"
                placeholder="Expiry date"
                aria-label="Expiry date"
              />
            </div>
            <div class="col">
              <label for="RiskRating">Risk Rating</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Risk"
                aria-label="Risk"
              />
            </div>
          </div>
        </div>

        <div>
          <div class="form-group mb-4">
            <label for="Key words">Key words</label>
            <textarea
              class="form-control w-50"
              id="brief_interests"
              placeholder="Brief interests"
              rows="3"
            ></textarea>
          </div>
        </div>

        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Instruments">Instruments</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Instruments"
                aria-label="  Instruments"
              />
            </div>
            <div class="col">
              <label for="ProductType">Product Type</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Product Type"
                aria-label="  Product Type"
              />
            </div>
          </div>
        </div>

        <div>
          <div class="form-group mb-4">
            <label for="Key words">Detailed Profile</label>
            <textarea
              class="form-control w-50"
              id="detailed_preferences"
              placeholder="Detailed preferences"
              rows="3"
            ></textarea>
          </div>
        </div>

        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Currency">Currency</label>
              <input
                type="text"
                class="form-control form-control_border w-50"
                placeholder="Currency"
                aria-label="Currency"
              />
            </div>
          </div>
        </div>

        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="MajorSector">Major Sector</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Author's Name"
                aria-label="Author's Name"
              />
            </div>
            <div class="col">
              <label for="MinorSector">Minor Sector</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Author's Name"
                aria-label="Author's Name"
              />
            </div>
          </div>
        </div>

        <div>
          <div class="row mb-4">
            <div class="col">
              <label for="Region">Region</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Region"
                aria-label="  Region"
              />
            </div>
            <div class="col">
              <label for="Country">Country</label>
              <input
                type="text"
                class="form-control form-control_border"
                placeholder="Country"
                aria-label="  Country"
              />
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary align-items-center">
            Save
          </button>
        </div>
      </form>
    </div>
  </body>
</html>

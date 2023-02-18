<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<div class="container text-nowrap bg-white">
      <h1 class="text-center">List of Investors</h1>
      <div class="table-responsive rounded">
        <table class="table table-hover table-bordered mb-0">
          <thead>
            <tr>
              <th class="col-1" id="unmovedtitle">Name</th>
              <th>Keywords</th>
              <th>Risk Rating</th>
              <th>Expiry Date</th>
              <th>Product Type</th>
              <th>Currency</th>
              <th>Major Sector</th>
              <th>Country</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-info" onclick="location.href='./ideapage.html';">
              <td class="col-1">Investor A</td>
              <td class="col-2">low risk ideas onlyzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz</td>
              <td class="col-1">0</td>
              <td class="col-2">3/9/23</td>
              <td class="col-1">Bonds</td>
              <td class="col-1">Pounds</td>
              <td class="col-1">education</td>
              <td class="col-1">UK</td>
            </tr>
            <tr class="table-light" onclick="location.href='./ideapage.html';">
              <td class="col-1">Investor B</td>
              <td class="col-2">risky ideas</td>
              <td class="col-1">7</td>
              <td class="col-2">4/9/28</td>
              <td class="col-1">Bonds</td>
              <td class="col-1">Pounds</td>
              <td class="col-1">education</td>
              <td class="col-1">US</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
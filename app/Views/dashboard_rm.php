<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<div class="container text-nowrap bg-white">
      <h1 class="text-center">List of ideas</h1>
      <div class="table-responsive rounded">
        <table class="table table-hover table-bordered mb-0">
          <thead>
            <tr>
              <th class="col-1" id="unmovedtitle">Title</th>
              <th>Abstract</th>
              <th>Risk Rating</th>
              <th>Published Date</th>
              <th>Expiry Date</th>
              <th>Product Type</th>
              <th>Currency</th>
              <th>Major Sector</th>
              <th>Country</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-info" onclick="location.href='./ideapage.html';">
              <td class="col-1">Idea A</td>
              <td class="col-2">
                Very good investment
                zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz
              </td>
              <td class="col-1">0</td>
              <td class="col-2">7/1/23</td>
              <td class="col-2">7/1/24</td>
              <td class="col-1">Bonds</td>
              <td class="col-1">Pounds</td>
              <td class="col-1">Health</td>
              <td class="col-1">UK</td>
            </tr>

            <tr class="table-light" onclick="location.href='./ideapage.html';">
              <td class="col-1">Idea A</td>
              <td class="col-2">Very good investment aaaaaaa</td>
              <td class="col-1">0</td>
              <td class="col-2">7/1/23</td>
              <td class="col-2">7/1/24</td>
              <td class="col-1">Bonds</td>
              <td class="col-1">Pounds</td>
              <td class="col-1">Health</td>
              <td class="col-1">UK</td>
            </tr>
            <tr
              class="table-warning"
              onclick="location.href='./ideapage.html';"
            >
              <td class="col-1">Idea A</td>
              <td class="col-2">Very old investment aaaaaaa</td>
              <td class="col-1">0</td>
              <td class="col-2">7/1/23</td>
              <td class="col-2">7/1/24</td>
              <td class="col-1">Bonds</td>
              <td class="col-1">Pounds</td>
              <td class="col-1">Health</td>
              <td class="col-1">UK</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr />
      <h1 class="text-center">List of decisions</h1>
      <div class="table-responsive rounded">
        <table class="table table-hover table-bordered mb-0">
          <thead>
            <tr>
              <th id="unmovedtitle">Title</th>
              <th>Abstract</th>
              <th>Risk Rating</th>
              <th>Published Date</th>
              <th>Expiry Date</th>
              <th>Product Type</th>
              <th>Currency</th>
              <th>Major Sector</th>
              <th>Country</th>
              <th id="decision" class="approval">Decision</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="table-success"
              onclick="location.href='./ideapage.html';"
            >
              <td>Idea old</td>
              <td>
                good investment
                zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz
              </td>
              <td>2</td>
              <td>5/5/22</td>
              <td>4/3/23</td>
              <td>Bonds</td>
              <td>Rupees</td>
              <td>Sports</td>
              <td>India</td>
              <td class="approval">Accepted</td>
            </tr>
            <tr class="table-danger" onclick="location.href='./ideapage.html';">
              <td>Idea old</td>
              <td>
                good investment
                zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz
              </td>
              <td>2</td>
              <td>5/5/22</td>
              <td>4/3/23</td>
              <td>Bonds</td>
              <td>Rupees</td>
              <td>Sports</td>
              <td>India</td>
              <td class="approval">Rejected</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<div class="container text-nowrap ideaspage" style="background-color: white; ">
      <h1 class="text-center">List of ideas</h1>
      <div class="table-responsive rounded ">
        <table class="table table-hover table-bordered mb-0 mytable">
          <thead >
            <tr class="text-center">
              <th   id="unmovedtitle">No.</th>
              <th>Title</th>
              <th>Abstract</th>
              <th>Risk Rating</th>
              <th>Published Date</th>
              <th>Author's Name</th>
              <th>Expiry Date</th>
              <th>Product Type</th>
              <th>Instruments</th>
              <th>Currency</th>
              <th>Major Sector</th>
              <th>Minor Sector</th>
              <th>Region</th>
              <th>Country</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ideas as $idea): ?>
              <tr class="<?= /*(date_add(new DateTime('Y-m-d H:i:s',time()),date_interval_create_from_date_string("30 days")) > $idea['expires_on']) ? 'table-warning' :*/'table-info'   ?> fixedhrows" onclick="location.href='./ideapage.html';">
              <td  ><?= $idea['idea_number'] ?></td>
              <td  ><?= $idea['title'] ?></td>
              <td  ><?= $idea['risk']  ?></td>
              <td ><?= $idea['abstract']  ?></td>
              <td  ><?= $idea['published_on']  ?></td>
              <td  ><?= $idea['expires_on']  ?></td>
              <td  ><?= $idea['author_id']  ?></td>
              <td  ><?= $idea['product_type']  ?></td>
              <td  ><?= $idea['instruments']  ?></td>
              <td  ><?= $idea['currency']  ?></td>
              <td  ><?= $idea['major_sector']  ?></td>
              <td  ><?= $idea['minor_sector']  ?></td>
              <td  ><?= $idea['region']  ?></td>
              <td  ><?= $idea['country']  ?></td>
              </tr>
            <?php endforeach; ?>
              <!--            <tr class="table-light" onclick="location.href='./ideapage.html';"> -->
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

<div class="container text-nowrap investorspage d-none" style="background-color: white; ">
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
<script>
let ideastables= document.getElementsByClassName("ideaspage");
let listtbtn= document.getElementsByClassName("listtoggle");
let investorstable= document.getElementsByClassName("investorspage");
function togglelists(){
  if (listtbtn[0].innerHTML == "Investor List") {
    listtbtn[0].innerHTML = "Idea List";
    ideastables[0].className = "container text-nowrap ideaspage d-none";
    investorstable[0].className = "container text-nowrap investorspage";

  } else {
    listtbtn[0].innerHTML = "Investor List";
    ideastables[0].className = "container text-nowrap ideaspage";
    investorstable[0].className = "container text-nowrap investorspage d-none";
  }
  return;
}



</script>

    <style>

    table.mytable tr.fixedhrows{
   height: 10%;
    }
    </style>

<div class="container" 
  <div class="row">
    <div class="col-15">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<input type="button"  class="btn btn-primary" onclick="location.href='/ideaform'" value="Give a new idea" >
<div class="container text-nowrap ideaspage" style="background-color: white; ">
  <h1 class="text-center">List of ideas</h1>
  <div class="table-responsive rounded ">
    <table class="table table-hover table-bordered mb-0 mytable">
      <thead>
        <tr class="text-center">
          <th id="unmovedtitle">Idea No.</th>
          <th>Abstract</th>
          <th>Risk Rating</th>
          <th>Currency</th>
        </tr>
      </thead>
      <tr onclick="location.href='./ideapage.html';">
        <?php foreach ($newideas as $idea) : ?>
      <tr class="fixedhrows <?= comparedates($idea['expires_on'], $idea['published_on'])  ?>" data-bs-toggle="modal" onclick="setideamodal1(<?= $idea['idea_number'] ?>); console.log('flag')" data-bs-target="#investoridealist">
        <td><?= $idea['idea_number'] ?></td>
        <td><?= $idea['title'] ?></td>
        <td><?= $idea['risk']  ?></td>
        <td><?= $idea['currency']  ?></td>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>
</div>

<<<<<<< HEAD
                </tr>
<div style="background-color: white;">
                <tr class="table-info" onclick="location.href='./ideapage.html';">
                    <td>Idea A</td>
                    <td>Very good investment</td>
                    <td>Manufactural items</td>
                    <td>27th of January 2023</td>
                    <td>31st of March 2023S</td>
                    <td>Building Materials</td>
                    <td>Pound Sterling</td>
                    <td>Residents of Cambridge Campus</td>
                    <td>UK</td>
                </tr>
              
            </table>
          </div>
            <table style="width:95%;border:1px solid black">
                <tr>
                <div id="dialogboxes"></div>
=======

<hr>

<div id="dialogboxes"></div>
<div class="container text-nowrap ideaspage" style="background-color: white; ">
>>>>>>> d8e3c0d21fb05000abb59c88261ed38b8e54892f
  <h1 class="text-center">List of ideas invested in</h1>
  <div class="table-responsive rounded ">
    <table class="table table-hover table-bordered mb-0 mytable">
      <thead>
        <tr class="text-center">
          <th>Title</th>
          <th>Abstract</th>
          <th>Risk Rating</th>
          <th>Accepted Date</th>
          <th>Expiry Date</th>
          <th>Product Type</th>
          <th>Currency</th>
          <th>Major Sector</th>
          <th>Country</th>
          <th>Changes</th>
        </tr>
      </thead>
      <tr onclick="location.href='./ideapage.html';">
        <?php foreach ($appideas as $idea) : ?>
      <tr class="fixedhrows <?= comparedates($idea['expires_on'], $idea['published_on'])  ?>" data-bs-toggle="modal" onclick="setideamodal1(<?= $idea['idea_number'] ?>); console.log('flag')" data-bs-target="#investoridealist">
        <td><?= $idea['idea_number'] ?></td>
        <td><?= $idea['title'] ?></td>
        <td><?= $idea['risk']  ?></td>
        <td><?= $idea['currency']  ?></td>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>
</div>


<?php
function comparedates($ideaexp, $ideapub)
{
  $twomonthslater = new DateTime('+2 month');
  $twomonthsago = new DateTime('-2 month');
  $twomonthslaterString = $twomonthslater->format('Y-m-d H:i:s');
  $twomonthsagoString = $twomonthsago->format('Y-m-d H:i:s');

  if (strtotime($ideaexp) < strtotime($twomonthslaterString)) {
    return 'table-danger';
  } else if (strtotime($twomonthsagoString) < strtotime($ideapub)) {
    return 'table-success';
  } else {
    return 'table-info';
  }
}

function accepted($d)
{
  if ($d == 'R') {
    return 'table-danger';
  } else if ($d == 'A') {
    return 'table-success';
  } else {
    return 'table-info';
  }
}
?>

<script>
  function setideamodal1(ideaid) {
    console.log("flag");
    fetch("api/getidea/" + ideaid, {
        method: "get",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest"
        }
      })
      .then((response) => {
        if (response.ok) {
          console.log(response);
          return response.json(); // extract the JSON data from the response
        } else {
          console.log(response); //throw new Error('response was not ok');
        }
      })
      .then((data) => {
        document.getElementById("ideatitleinv").innerHTML = data.ideainfo.title;
        document.getElementById("ideanuminv").innerHTML = data.ideainfo.idea_number;
        document.getElementById("ideauthorinv").innerHTML = data.ideainfo.first_name;
        document.getElementById("ideaabstractinv").innerHTML = data.ideainfo.abstract;
        document.getElementById("idpubinv").innerHTML = data.ideainfo.published_on;
        document.getElementById("idexpyinv").innerHTML = data.ideainfo.expires_on;
        document.getElementById("idriskinv").innerHTML = data.ideainfo.risk;
        document.getElementById("idcurrinv").innerHTML = data.ideainfo.currency;
        document.getElementById("idprotypeinv").innerHTML = data.ideainfo.product_type;
        document.getElementById("idinstrumentinv").innerHTML = data.ideainfo.instruments;
        document.getElementById("idmajsectorinv").innerHTML = data.ideainfo.major_sector;
        document.getElementById("idminsectorinv").innerHTML = data.ideainfo.minor_sector;
        document.getElementById("idregioninv").innerHTML = data.ideainfo.region;
        document.getElementById("idcountryinv").innerHTML = data.ideainfo.country;
        document.getElementById("idcontentinv").innerHTML = data.ideainfo.content;
        console.log("flag", data.ideainfo.expires_on);
      });

  }
</script>

<<<<<<< HEAD
                    <th>Title</th>
                    <th>Abstract</th>
                    <th>Risk Rating</th>
                    <th>Published Date</th>
                    <th>Expiry Date</th>
                    <th>Product Type</th>
                    <th>Currency</th>
                    <th>Major Sector</th>
                    <th>Country</th>
                </tr>
                <tr onclick="location.href='./ideapage.html';">
                    <td>Idea A</td>
                    <td>Very good investment</td>
                    <td>Milk</td>
                    <td>20th March 2023</td>
                    <td>31st March 2023</td>
          
                    <td>Beveragies</td>
                    <td>Pound Sterling</td>
                    <td>Anglia Ruskin University Main Campus Cambridge</td>
                    <td>UK</td>
                </tr>
                </table>
                <br><input type="button"  class="btn btn-primary" onclick="location.href='/ideaform'" value="Give a new idea" 
                <div class="col-4 text-secondary" id="idcountryinv">      
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  
=======
<div class="modal fade" id="investoridealist">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header h5 fw-bold ">
        <div class="col-11 modal-title text-center" id="ideatitleinv"></div>
        <button class="btn-close col-1" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid" id="modalbody">

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Idea Number </div>
            <div class="col-4 text-secondary" id="ideanuminv"> </div>
            <div class="col-2 h6 mb-0 fw-bold">Author </div>
            <div class="col-4 text-secondary" id="ideauthorinv"></div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 h6 mb-0 fw-bold">Abstract</div>
            <div class="col-9 text-secondary" id="ideaabstractinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Published on </div>
            <div class="col-4 text-secondary" id="idpubinv"></div>
            <div class="col-2 h6 mb-0 fw-bold">Expires on </div>
            <div class="col-4 text-secondary" id="idexpyinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Risk
            </div>
            <div class="col-4 text-secondary" id="idriskinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Currency
            </div>
            <div class="col-4 text-secondary" id="idcurrinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Product type
            </div>
            <div class="col-4 text-secondary" id="idprotypeinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Instruments
            </div>
            <div class="col-4 text-secondary" id="idinstrumentinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Major Sector
            </div>
            <div class="col-4 text-secondary" id="idmajsectorinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Minor Sector
            </div>
            <div class="col-4 text-secondary" id="idminsectorinv">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Region
            </div>
            <div class="col-4 text-secondary" id="idregioninv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Countries
            </div>
            <div class="col-4 text-secondary" id="idcountryinv">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Content
            </div>
            <div class="col-10 text-secondary" id="idcontentinv">
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="modal-footer">
      <button class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

>>>>>>> d8e3c0d21fb05000abb59c88261ed38b8e54892f

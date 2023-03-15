<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>
<input type="button" value="Change My Profile" onclick="location.href='./investorform';" style="float: right;"></input>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>
<div id="dialogboxes"></div>
<div class="container text-nowrap ideaspage" style="background-color: white; ">
  <h1 class="text-center">List of ideas</h1>
  <div class="table-responsive rounded ">
    <table class="table table-hover table-bordered mb-0 mytable">
      <thead>
        <tr class="text-center">
          <th id="unmovedtitle">Title</th>
          <th>Abstract</th>
          <!-- <th>Published Date</th> -->
          <!-- <th>Expiry Date</th> -->
          <!-- <th>Author</th> -->
          <!-- <th>Content</th> -->
          <th>Risk Rating</th>
          <!-- <th>Instruments</th> -->
          <th>Currency</th>
          <!-- <th>Major Sector</th> -->
          <!-- <th>Minor Sector</th> -->
          <!-- <th>Region</th> -->
          <!-- <th>Country</th> -->
        </tr>
      </thead>
      <tr onclick="location.href='./ideapage.html';">
      <?php foreach ($ideas as $idea): ?>
              <tr class="fixedhrows <?= comparedates($idea['expires_on'], $idea['published_on'])  ?>" data-bs-toggle="modal" onclick="setideamodal(<?= $idea['idea_number'] ?>)" data-bs-target="#investoridealist">
              <td  ><?= $idea['idea_number'] ?></td>
              <td  ><?= $idea['title'] ?></td>
              <!-- <td  ><?= $idea['published_on']  ?></td> -->
              <!-- <td  ><?= $idea['expires_on']  ?></td> -->
              <!-- <td  ><?= $idea['author_id']  ?></td> -->
              <!-- <td  ><?= $idea['content']  ?></td> -->
              <td  ><?= $idea['risk']  ?></td>
              <!-- <td  ><?= $idea['instruments']  ?></td> -->
              <td  ><?= $idea['currency']  ?></td>
              <!-- <td  ><?= $idea['major_sector']  ?></td> -->
              <!-- <td  ><?= $idea['minor_sector']  ?></td>          -->
              <!-- <td  ><?= $idea['region']  ?></td> -->
              <!-- <td  ><?= $idea['country']  ?></td> -->
              </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>


<hr>

<div id="dialogboxes"></div>
<div class="container text-nowrap ideaspage" style="background-color: white; ">
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
      <tr class="text-center table-success">
        <td>Idea old</td>
        <td>good investment</td>
        <td>2</td>
        <td>15/5/22</td>
        <td>4/3/23</td>
        <td>Bonds</td>
        <td>Rupees</td>
        <td>Sports</td>
        <td>India</td>
        <td>None</td>
      </tr>
    </table>
  </div>
</div>


<?php
function comparedates($ideaexp,$ideapub) {
  $twomonthslater= new DateTime('+2 month');
  $twomonthsago= new DateTime('-2 month');
  $twomonthslaterString = $twomonthslater->format('Y-m-d H:i:s');
  $twomonthsagoString = $twomonthsago->format('Y-m-d H:i:s');
  
  if (strtotime($ideaexp) < strtotime($twomonthslaterString)) {
    return 'table-danger';
  } else if (strtotime($twomonthsagoString) < strtotime($ideapub)) {
    return 'table-success';
  }
  else{
    return 'table-info';
  }

}

function accepted($d){
  if ($d == 'R') {
    return 'table-danger';
  } else if ($d == 'A') {
    return 'table-success';
  }
  else{
    return 'table-info';
  }
}
?>

<script>


function setideamodal(ideaid) {
      fetch("api/getidea/"+ideaid,{
          method: "get",
          headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
          }
        })
        .then((response) => {
            if (response.ok) {
              return response.json(); // extract the JSON data from the response
            } else {
              console.log(response);//throw new Error('response was not ok');
            }
        })
      .then((data) =>{ 
       document.getElementById("ideatitleinv").innerHTML=data.ideainfo.title;
       document.getElementById("ideanuminv").innerHTML=data.ideainfo.idea_number;
       document.getElementById("ideauthorinv").innerHTML=data.ideainfo.first_name;
       document.getElementById("ideaabstractinv").innerHTML=data.ideainfo.abstract;
       document.getElementById("idpubinv").innerHTML=data.ideainfo.published_on;
       document.getElementById("idexpyinv").innerHTML=data.ideainfo.expires_on;
       document.getElementById("idriskinv").innerHTML=data.ideainfo.risk;
       document.getElementById("idcurrinv").innerHTML=data.ideainfo.currency;
       document.getElementById("idprotypeinv").innerHTML=data.ideainfo.product_type;
       document.getElementById("idinstrumentinv").innerHTML=data.ideainfo.instruments;
       document.getElementById("idmajsectorinv").innerHTML=data.ideainfo.major_sector;
       document.getElementById("idminsectorinv").innerHTML=data.ideainfo.minor_sector;
       document.getElementById("idregioninv").innerHTML=data.ideainfo.region;
       document.getElementById("idcountryinv").innerHTML=data.ideainfo.country;
       document.getElementById("idcontentinv").innerHTML=data.ideainfo.content;
       console.log("flag", data.ideainfo.expires_on);
      }
        );
  
}
</script>

<div class="modal fade" id="investoridealist" >
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        
      <div class="modal-header h5 fw-bold "><div class="col-11 modal-title text-center" id="ideatitleinv"></div>
        <button class="btn-close col-1" data-bs-dismiss="modal" ></button>
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
              <div class="col-3 h6 mb-0 fw-bold" >Abstract</div>
              <div class="col-9 text-secondary" id="ideaabstractinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Published on </div>
            <div class="col-4 text-secondary"id="idpubinv"></div>
            <div class="col-2 h6 mb-0 fw-bold">Expires on </div>
            <div class="col-4 text-secondary"id="idexpyinv"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Risk 
            </div>
            <div class="col-4 text-secondary"id="idriskinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Currency 
            </div>
            <div class="col-4 text-secondary"id="idcurrinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Product type 
            </div>
            <div class="col-4 text-secondary"id="idprotypeinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Instruments 
            </div>
            <div class="col-4 text-secondary"id="idinstrumentinv">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Major Sector 
            </div>
            <div class="col-4 text-secondary"id="idmajsectorinv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Minor Sector 
            </div>
            <div class="col-4 text-secondary"id="idminsectorinv">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Region 
            </div>
            <div class="col-4 text-secondary"id="idregioninv">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Countries 
            </div>
            <div class="col-4 text-secondary"id="idcountryinv">
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Content 
            </div>
            <div class="col-10 text-secondary"id="idcontentinv">
            </div>
          </div>
          <hr>


          
        </div>
    </div>
      
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#approvedeny" data-bs-toggle="modal" data-bs-dismiss="modal">Choice</button>
        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


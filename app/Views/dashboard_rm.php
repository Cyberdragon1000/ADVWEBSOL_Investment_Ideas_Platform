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
          <tr class="text-center">
              <th   id="unmovedtitle">No.</th>
              <th>Title</th>
              <th>Abstract</th>
              <th>Risk Rating</th>
              <th>Expiry Date</th>
              <th>Given Investor</th>
              <th id="decision" class="approval">Decision</th>
          </tr>
          </thead>


          <tbody>
          <?php foreach ($decisions as $decision): ?>
              <tr class="table-success fixedhrows" onclick="location.href='./ideapage.html';">
                <td  ><?= $decision['idea_number'] ?></td>
                <td  ><?= $decision['title'] ?></td>
                <td  ><?= $decision['abstract']  ?></td>
                <td  ><?= $decision['risk']  ?></td>
                <td  ><?= $decision['expires_on']  ?></td>
                <td  ><?= $decision['name']  ?></td>
                <td class="approval"><?=$decision['decision']  ?></td>
              </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
</div>

<div class="container text-nowrap investorspage d-none" style="background-color: white; ">
      <h1 class="text-center">List of Investors</h1>
      <div class="table-responsive rounded">
        <table class="table table-hover table-bordered mb-0">
          <thead>
            <tr class="text-center">
              <th id="unmovedtitle">Name</th>
              <th>Key terms</th>
              <th>Risk Rating</th>
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
          <?php foreach ($investorprefs as $investor): ?>
              <tr class="<?= /*(date_add(new DateTime('Y-m-d H:i:s',time()),date_interval_create_from_date_string("30 days")) > $investor['expires_on']) ? 'table-warning' :*/'table-info'   ?> fixedhrows" onclick="location.href='./ideapage.html';">
              <td  ><?= $investor['name'] ?></td>
              <td  ><?= $investor['key_terms'] ?></td>
              <td  ><?= $investor['risk']  ?></td>
              <td  ><?= $investor['expires_on']  ?></td>
              <td  ><?= $investor['product_type']  ?></td>
              <td  ><?= $investor['instruments']  ?></td>
              <td  ><?= $investor['currency']  ?></td>
              <td  ><?= $investor['major_sector']  ?></td>
              <td  ><?= $investor['minor_sector']  ?></td>
              <td  ><?= $investor['region']  ?></td>
              <td  ><?= $investor['country']  ?></td>
              </tr>
            <?php endforeach; ?>
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

<!--
<a class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#firstpopup" role="button">Open first modal</a>

<div class="modal fade" id="firstpopup" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        
      <div class="modal-header h5 fw-bold">Modal 1
        <button class="btn-close" data-bs-dismiss="modal" ></button>
      </div>
      
      <div class="modal-body">
        Show a second modal and hide this one with the button below.
      </div>
      
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#popup2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
      </div>
    
    </div>
  </div>
</div>



<div class="modal fade" id="popup2" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal 2</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#firstpopup" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
  -->



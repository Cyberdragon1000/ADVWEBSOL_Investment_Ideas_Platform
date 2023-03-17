<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>

<div id="dialogboxes"></div>
<div class="container text-nowrap ideaspage" style="background-color: white; ">
      <h1 class="text-center">List of ideas</h1>
      <div class=" rounded  " >
        <table class="table table-hover table-bordered mb-0" id="newideastable">
          <thead >
            <tr class="text-center" >
              <th   id="unmovedtitle" style="background-color: #009879;">No.</th>
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
              <th style="background-color: #009879;">Country</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <hr />
      <h1 class="text-center">List of decisions</h1>
      <div class="table-responsive rounded">
        <table class="table table-hover table-bordered mb-0" id="sentideastable">
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
              <tr class="fixedhrows <?=accepted($decision['decision']) ?>" data-bs-toggle="modal" onclick="setideamodal(<?= $decision['idea_number'] ?>)" data-bs-target="#openidea">
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
        <table class="table table-hover table-bordered mb-0" id="allinvestorstable">
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
              <tr class="<?= /*(date_add(new DateTime('Y-m-d H:i:s',time()),date_interval_create_from_date_string("30 days")) > $investor['expires_on']) ? 'table-warning' :*/'table-info'   ?> fixedhrows" data-bs-toggle="modal" onclick="setinvestormodal(<?= $investor['investor_id'] ?>)" data-bs-target="#openinvestor">
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

let table = new DataTable('#newideastable', {
  pageLength: 1,
  scroller:    true,
  scrollX: true,
  pagingType: "full",
  pagingTag: 'button',
      fixedColumns: {
        left: 1,
        right: 1
    },
  "lengthMenu": [ [1, 5,10,20, 50, -1], [1, 5,10,20, 50, "All"] ],
  "language": {
        "paginate": {
                "first": "<i class=\"bi bi-chevron-double-left\"></i>",
                "last": "<i class=\"bi bi-chevron-double-right\"></i>",
                "previous": "<i class=\"bi bi-caret-left-square\"></i>",
                "next": "<i class=\"bi bi-caret-right-square\"></i>",
                page: 'Page %d',
                pageOf: 'of %d',
                info: 'Displaying records %d - %d of %d',
                infoEmpty: 'No records to display',
                infoFiltered: '(filtered from %d total records)',
          }
    },
    "ajax": {
      "url": "/rmnewideas",
      "dataSrc": "",
      "type": "GET",
      "dataType": "json"
    },
    
    /*
    "createdRow": function( row, data, dataIndex ) {
    if ( data[4] == "A" ) {
      $(row).addClass( 'important' );
    }
    }
    */
    "columns": [
      { "data": "idea_number" },
      { "data": "title" },
      { "data": "risk" },
      { "data": "risk" },
      { "data": "published_on" },
      { "data": "expires_on" },
      { "data": "first_name" },
      { "data": "product_type" },
      { "data": "instruments" },
      { "data": "currency" },
      { "data": "major_sector" },
      { "data": "minor_sector" },
      { "data": "region" },
      { "data": "country" }
    ],
    "createdRow": (row, data, dataIndex) => {
          $(row).addClass(newideasrowcolor(data.published_on,data.expires_on));
          $(row).attr('data-bs-toggle', "modal");
          $(row).attr('data-bs-target', "#openidea");
          $(row).on('click', function() {
              setideamodal(data.idea_number);
          });
          console.log(dataIndex);
    }
  // options
});
function newideasrowcolor(publisheddate,expirydate) {
  const expdate = new Date(expirydate);
  const pubdate = new Date(publisheddate);
  const today = new Date();
  expdate.setMonth(expdate.getMonth() - 2);
  pubdate.setMonth(pubdate.getMonth() + 2);
  if (today>expdate) {
    return "table-danger";
  }
  else if(today>pubdate){
    return "table-info";

  }
  else
    return "table-success";

}


let ideastables= document.getElementsByClassName("ideaspage");
let listtbtn= document.getElementsByClassName("listtoggle");
let investorstable= document.getElementsByClassName("investorspage");
</script>
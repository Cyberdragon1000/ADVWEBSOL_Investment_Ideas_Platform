<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('first_name') ?></h1>
    </div>
  </div>
</div>

<div id="dialogboxes"></div>
<div class="container-fluid text-nowrap " style="">
<div class="row">
  <div class="d-flex align-items-center col-2" style="background-color: white; ">
    <div class="nav flex-column nav-pills" role="tablist"  style="flex-grow:1;">
      <button class="nav-link active"  data-bs-toggle="pill" onclick="$('#newideastable').DataTable().columns.adjust();"  data-bs-target="#newideastab"  role="tab" >New Ideas</button>
      <button class="nav-link"  data-bs-toggle="pill" onclick="$('#sentideastable').DataTable().columns.adjust();" data-bs-target="#sendideastab"  role="tab" >Sent Ideas</button>
      <button class="nav-link"  data-bs-toggle="pill" onclick="$('#investorslisttable').DataTable().columns.adjust();" data-bs-target="#investorspreferencestab"  role="tab" >Investor's Preferences</button>
    </div>
  </div>
  <div class=" col-10 ps-1">
    <div class="tab-content pb-1" style="background-color: white;   min-height: 25em;" >
      <div class="tab-pane fade show active" id="newideastab" role="tabpanel">
        
        <div class="container text-nowrap " >
          <h1 class="text-center">New Ideas</h1>
          <table class="table table-hover mb-0 " id="newideastable">
            <thead >
              <tr class="text-center" >
                <th  style="background-color: #009879;">No.</th>
                <th>Risk</th>
                <th>Publish Date</th>
                <th>Expiry Date</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Author's Name</th>
                <th style="background-color: #009879;">Actions</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
      <div class="tab-pane fade" id="sendideastab" role="tabpanel" >
        <div class="container text-nowrap">
          <h1 class="text-center">Ideas Investment Status</h1>
          <table class="table table-hover  mb-0" id="sentideastable">
            <thead>
            <tr class="text-center">
                <th  style="background-color: #009879;">No.</th>
                <th>Title</th>
                <th>Risk Rating</th>
                <th>Investor Name</th>
                <th>Expiry Date</th>
                <th style="background-color: #009879;">Decision</th>
                <th style="background-color: #009879;" >Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
      <div class="tab-pane fade" id="investorspreferencestab" role="tabpanel" >
        <div class="container text-nowrap">
          <h1 class="text-center">Investors List</h1>
          <table class="table table-hover  mb-0" id="investorslisttable">
              <thead>
                <tr class="text-center">
                  <th  style="background-color: #009879;">Name</th>
                  <th>Risk Rating</th>
                  <th>Key terms</th>
                  <th>Expiry Date</th>
                  <th>Product Type</th>
                  <th>Instruments</th>
                  <th>Currency</th>
                  <th>Major Sector</th>
                  <th>Minor Sector</th>
                  <th style="background-color: #009879;">Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

  
<script>
ideastableinit();
function ideastableinit() {
  let table = new DataTable('#newideastable', {
    scroller:    true,
    scrollX: true,
    scrollY: false,
    pagingType: "full",
    pagingTag: 'button',
        fixedColumns: {
          left: 1,
          right: 1
      },
    "lengthMenu": [ [ 5,10,20, 50, -1], [ 5,10,20, 50, "All"] ],
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
      
      "columns": [
        { "data": "idea_number" },
        { "data": "risk" },
        { "data": "published_on" },
        { "data": "expires_on" },
        { "data": "title" },
        { "data": "abstract" },
        { "data": "first_name" },
        { 
          render: function ( data, type, row, meta) { 
            if(type === 'display'){
              return createactionbuttons(); 
            }           
          },  "defaultContent":"choices"//"country" }

          
        }
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass(newideasrowcolor(data.published_on,data.expires_on));
            $(row).attr('data-bs-toggle', "modal");
            $(row).attr('data-bs-target', "#openidea");
            $(row).on('click', function() {
                setideamodal(data.idea_number);
            });
      }
    // options
  });


  let table2 = new DataTable('#sentideastable', {
    scroller:    true,
    scrollX: true,
    scrollY: false,
    pagingType: "full",
    pagingTag: 'button',
    fixedColumns: {
          left: 1,
          right: 2
      },
    "lengthMenu": [ [ 5,10,20, 50, -1], [ 5,10,20, 50, "All"] ],
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
        "url": "/rmsentideas",
        "dataSrc": "",
        "type": "GET",
        "dataType": "json"
      },
      "columns": [
        { "data": "idea_number" },
        { "data": "title" },
        { "data": "risk" },
        { "data": "expires_on" },
        { "data": "name" },
        { render: function ( data, type, row, meta) { 
            if(type === 'display'){
              if(row.decision=='R')
              return "Rejected"; 
              else if(row.decision=='P')
              return "Pending"; 
              else
              return "Approved"
            }           
          },  "defaultContent":"pending"
         },
        { render: function ( data, type, row, meta) { 
            if(type === 'display'){
              return createactionbuttons(); 
            }           
          },  "defaultContent":"choices"//"country" 
        }

          
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass(sentideasrowcolor(data.decision));
            $(row).attr('data-bs-toggle', "modal");
            $(row).attr('data-bs-target', "#openidea");
            $(row).on('click', function() {
                setideamodal(data.idea_number);
            });
      }
    // options
  });

  let table3 = new DataTable('#investorslisttable', {
    pageLength: 1,
    scroller:    true,
    scrollX: true,
    scrollY: false,
    pagingType: "full",
    pagingTag: 'button',
        fixedColumns: {
          left: 1,right:1
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
        "url": "/rminvestorslist",
        "dataSrc": "",
        "type": "GET",
        "dataType": "json"
      },
      
      "columns": [
        { "data": "name" },
        { "data": "risk" },
        { "data": "key_terms" },
        { "data": "expires_on" },
        { "data": "product_type" },
        { "data": "instruments" },
        { "data": "currency" },
        { "data": "major_sector" },
        { "data": "minor_sector" },
        { render: function ( data, type, row, meta) { 
            if(type === 'display'){
              return `<button type="button" class="btn btn-info">View</button>`; 
            }           
          },  "defaultContent":"choices" }
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass("border-3 border-bottom border-info");
            $(row).attr('data-bs-toggle', "modal");
            $(row).attr('data-bs-target', "#openinvestor");
            $(row).on('click', function() {
                setinvestormodal(data.investor_id);
            });
      }
    // options
  });
}
function newideasrowcolor(publisheddate,expirydate) {
  const expdate = new Date(expirydate);
  const pubdate = new Date(publisheddate);
  const today = new Date();
  expdate.setMonth(expdate.getMonth() - 2);
  pubdate.setMonth(pubdate.getMonth() + 2);
  if (today>expdate) {
    return "border-3 border-bottom border-danger";
  }
  else if(today>pubdate){
    return "border-3 border-bottom border-info";

  }
  else
    return "border-3 border-bottom border-success";

}

function sentideasrowcolor(decision) {
  if (decision=="R") {
    return "border-3 border-bottom border-danger";
  }
  else if(decision=="P"){
    return "border-3 border-bottom border-info";

  }
  else
    return "border-3 border-bottom border-success";

}
function createactionbuttons() {
  var data=`

<div class="btn-group-sm" role="group" aria-label="Basic mixed styles example">
  <button type="button" class="btn btn-info">View</button>
  <button type="button" class="btn btn-danger">Remove</button>
</div>`
return data;
}
/*
$( "#target" ).click(function() {
  alert( "Handler for .click() called." );
});*/
</script>





function setElementInnerHTML(stringa, stringb) {
    var element = document.getElementById(stringa);
      element.innerHTML = stringb;
}
function setElementDisabled(stringa, stringb) {
    var element = document.getElementById(stringa);
      element.disabled = stringb;
}
function setElementValue(stringa, stringb) {
    var element = document.getElementById(stringa);
      element.value = stringb;
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
       setElementInnerHTML("idmodaltitle",data.ideainfo.title);
       setElementInnerHTML("idmodaltitle2","\""+data.ideainfo.title+"\"");
       setElementInnerHTML("ideanum",data.ideainfo.idea_number);
       setElementInnerHTML("idauthor",data.ideainfo.first_name);
       setElementInnerHTML("ideaabstract",data.ideainfo.abstract);
       setElementInnerHTML("idpub",data.ideainfo.published_on);
       setElementInnerHTML("idexpy",data.ideainfo.expires_on);
       setElementInnerHTML("idrisk",data.ideainfo.risk);
       setElementInnerHTML("idcurr",data.ideainfo.currency);
       setElementInnerHTML("idprotype",data.ideainfo.product_type);
       setElementInnerHTML("idinstrument",data.ideainfo.instruments);
       setElementInnerHTML("idmajsector",data.ideainfo.major_sector);
       setElementInnerHTML("idminsector",data.ideainfo.minor_sector);
       setElementInnerHTML("idregion",data.ideainfo.region);
       setElementInnerHTML("idcountry",data.ideainfo.country);
       setElementInnerHTML("idcontent",data.ideainfo.content);
       setElementValue("rejectidea",data.ideainfo.idea_number);

       
       let sento= "<hr>No one yet";
       if (data.investedinfo.length>0){
            sento="<table class=\"table\"><thead ><tr class=\"text-center\"><th>Name</th><th>Decision</th></tr></thead><tbody>"
            for (let index = 0; index < data.investedinfo.length; index++) {
              sento+="<tr class=\"fixedhrows text-center\"><td>"+ data.investedinfo[index].name+"</td><td>"+ data.investedinfo[index].decision +"</td></tr>";
            }
            sento+="</tbody></table>";
        }
       setElementInnerHTML("senttolist",sento);
       setElementDisabled("sendideabutton",true);
       setElementValue("ideaattr",data.ideainfo.idea_number);



       let notsentto="<select class=\"form-select\"disabled><option selected>Sent to every investor already</option></select>";
       if (data.notsentyet.length>0){
            notsentto="<select class=\"form-select\" name=\"rmsentidea\">";
            for (let index = 0; index < data.notsentyet.length; index++) {
              notsentto+="<option value=\""+ data.notsentyet[index].investor_id+"\">"+ data.notsentyet[index].investor_id +" - "+data.notsentyet[index].name+"</option>";
            }
            notsentto+="</select>";
            setElementDisabled("sendideabutton",false);


        }

        setElementInnerHTML("notyetsenttolist",notsentto);
      }
        );
  
}

function setinvestormodal(investorid) {
      fetch("api/getinvestor/"+investorid,{
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
              throw new Error('response was not ok');
            }
        })
      .then((data) =>{ 
       setElementInnerHTML("inmodaltitle",data.investorinfo.name);
       setElementInnerHTML("ineanum",data.investorinfo.investor_id);
       setElementInnerHTML("ineaabstract",data.investorinfo.key_terms);
       setElementInnerHTML("inexpy",data.investorinfo.expires_on);
       setElementInnerHTML("inrisk",data.investorinfo.risk);
       setElementInnerHTML("incurr",data.investorinfo.currency);
       setElementInnerHTML("inprotype",data.investorinfo.product_type);
       setElementInnerHTML("ininstrument",data.investorinfo.instruments);
       setElementInnerHTML("inmajsector",data.investorinfo.major_sector);
       setElementInnerHTML("inminsector",data.investorinfo.minor_sector);
       setElementInnerHTML("inregion",data.investorinfo.region);
       setElementInnerHTML("incountry",data.investorinfo.country);
       setElementInnerHTML("incontent",data.investorinfo.preferences);
       let text= "<hr>No investments yet";
       if (data.investedinfo.length>0){
       text="<table class=\"table\"><thead ><tr class=\"text-center\"><th>Name</th><th>Decision</th></tr></thead><tbody>"
       for (let index = 0; index < data.investedinfo.length; index++) {
              
        text+="<tr class=\"fixedhrows text-center\"><td>"+ data.investedinfo[index].idea_id+"</td><td>"+ data.investedinfo[index].decision +"</td></tr>";
        
       }
       text+="</tbody></table>";
      }
      setElementInnerHTML("sentideaslist",text);

      }
        );
  
}

function toy(){
  console.log("flag");
}

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
              return `<button type="button"  onclick="setideamodal(${row.idea_number})"  data-bs-toggle="modal" data-bs-target="#openidea" class="btn btn-info">View</button>`; 
            }           
          },  "defaultContent":"choices"//"country" }

          
        }
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass(newideasrowcolor(data.published_on,data.expires_on));
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
              return `<button type="button"  onclick="setideamodal(${row.idea_number})"  data-bs-toggle="modal" data-bs-target="#openidea" class="btn btn-info">View</button>`; 
            }           
          },  "defaultContent":"choices"//"country" 
        }

          
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass(sentideasrowcolor(data.decision));
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
              return `<button type="button" onclick="setinvestormodal(${row.investor_id})"  data-bs-toggle="modal" data-bs-target="#openinvestor" class="btn btn-info">View</button>`; 
            }           
          },  "defaultContent":"choices" }
      ],
      "createdRow": (row, data, dataIndex) => {
            $(row).addClass("border-3 border-bottom border-info");
      }
    // options
  });
}


function initpopups() {
  data=`
  <div class="modal fade" id="openidea" >
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        
      <div class="modal-header h5 fw-bold "><div class="col-11 modal-title text-center" id="idmodaltitle"></div>
        <button class="btn-close col-1" data-bs-dismiss="modal" ></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid" id="modalbody">

        <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Idea Number </div>
            <div class="col-4 text-secondary" id="ideanum"> </div>
            <div class="col-2 h6 mb-0 fw-bold">Author </div>
            <div class="col-4 text-secondary" id="idauthor"></div>
        </div>
        <hr>
        
        <div class="row">
              <div class="col-3 h6 mb-0 fw-bold" >Abstract</div>
              <div class="col-9 text-secondary" id="ideaabstract"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Published on </div>
            <div class="col-4 text-secondary"id="idpub"></div>
            <div class="col-2 h6 mb-0 fw-bold">Expires on </div>
            <div class="col-4 text-secondary"id="idexpy"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Risk 
            </div>
            <div class="col-4 text-secondary"id="idrisk">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Currency 
            </div>
            <div class="col-4 text-secondary"id="idcurr">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Product type 
            </div>
            <div class="col-4 text-secondary"id="idprotype">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Instruments 
            </div>
            <div class="col-4 text-secondary"id="idinstrument">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Major Sector 
            </div>
            <div class="col-4 text-secondary"id="idmajsector">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Minor Sector 
            </div>
            <div class="col-4 text-secondary"id="idminsector">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Region 
            </div>
            <div class="col-4 text-secondary"id="idregion">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Countries 
            </div>
            <div class="col-4 text-secondary"id="idcountry">
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Content 
            </div>
            <div class="col-10 text-secondary"id="idcontent">
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-12 h6 mb-0 fw-bold">This idea was sent to: 
            </div>
          </div>
          <div id="senttolist"></div>
          
        </div>
    </div>
      
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#sendidea" data-bs-toggle="modal" data-bs-dismiss="modal">Send to</button>
        <form action="/rejectidea" method="post">
        <input type="hidden" name="id" id="rejectidea"  value="someValue">
        <button class="btn btn-danger" type="submit"  data-bs-dismiss="modal">Reject</button>
        </form>
        <button class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sendidea" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
    <div class="modal-header h5 fw-bold "><div class="col-11 modal-title text-center">Sending this idea to</div>
        <button class="btn-close col-1" data-bs-dismiss="modal" ></button>
      </div>
    <div class="modal-body">
        Sending the idea "<b id="idmodaltitle2"></b>" to <hr>
        <br>
        <form action="/sendidearm" method="post" id="ideasendrm">
        <input type="hidden" name="ideano" id="ideaattr"value="someValue">
        <div id="notyetsenttolist"></div>
  </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" id="sendideabutton" type="submit" form="ideasendrm" value="submit" data-bs-dismiss="modal">Confirm</button>
        <button class="btn btn-primary" data-bs-target="#openidea" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="openinvestor" >
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        
      <div class="modal-header h5 fw-bold "><div class="col-11 modal-title text-center" id="inmodaltitle"></div>
        <button class="btn-close col-1" data-bs-dismiss="modal" ></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid" id="modalbody">

        <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Investor Number </div>
            <div class="col-4 text-secondary" id="ineanum"> </div>
            <div class="col-2 h6 mb-0 fw-bold">Expires on </div>
            <div class="col-4 text-secondary"id="inexpy"></div>
        </div>
        <hr>
        
        <div class="row">
              <div class="col-3 h6 mb-0 fw-bold" >Abstract</div>
              <div class="col-9 text-secondary" id="ineaabstract"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Risk 
            </div>
            <div class="col-4 text-secondary"id="inrisk">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Currency 
            </div>
            <div class="col-4 text-secondary"id="incurr">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Product type 
            </div>
            <div class="col-4 text-secondary"id="inprotype">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Instruments 
            </div>
            <div class="col-4 text-secondary"id="ininstrument">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Major Sector 
            </div>
            <div class="col-4 text-secondary"id="inmajsector">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Minor Sector 
            </div>
            <div class="col-4 text-secondary"id="inminsector">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Region 
            </div>
            <div class="col-4 text-secondary"id="inregion">
            </div>
            <div class="col-2 h6 mb-0 fw-bold">Countries 
            </div>
            <div class="col-4 text-secondary"id="incountry">
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-2 h6 mb-0 fw-bold">Content 
            </div>
            <div class="col-10 text-secondary"id="incontent">
            </div>
          </div>

          <hr>
          <div class="row">
            <div class="col-12 h6 mb-0 fw-bold">The ideas sent to this investor were: 
            </div>
          </div>
          <div id="sentideaslist"></div>

        </div>
    </div>
      
      <div class="modal-footer">
        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  
  `
  setElementInnerHTML("popupmodals",data);
}
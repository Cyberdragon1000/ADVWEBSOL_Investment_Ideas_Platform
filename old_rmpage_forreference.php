
<!--

Too much spaghetti code here......

-->
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
              <tr class="fixedhrows <?= comparedates($idea['expires_on'], $idea['published_on'])  ?>" data-bs-toggle="modal" onclick="setideamodal(<?= $idea['idea_number'] ?>)" data-bs-target="#openidea">
              <td  ><?= $idea['idea_number'] ?></td>
              <td  ><?= $idea['title'] ?></td>
              <td  ><?= $idea['risk']  ?></td>
              <td ></td>
              <td  ><?= $idea['published_on']  ?></td>
              <td  ><?= $idea['expires_on']  ?></td>
              <td  ><?= $idea['first_name']  ?></td>
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
       document.getElementById("idmodaltitle").innerHTML=data.ideainfo.title;
       document.getElementById("idmodaltitle2").innerHTML=data.ideainfo.title;
       document.getElementById("ideanum").innerHTML=data.ideainfo.idea_number;
       document.getElementById("idauthor").innerHTML=data.ideainfo.first_name;
       document.getElementById("ideaabstract").innerHTML=data.ideainfo.abstract;
       document.getElementById("idpub").innerHTML=data.ideainfo.published_on;
       document.getElementById("idexpy").innerHTML=data.ideainfo.expires_on;
       document.getElementById("idrisk").innerHTML=data.ideainfo.risk;
       document.getElementById("idcurr").innerHTML=data.ideainfo.currency;
       document.getElementById("idprotype").innerHTML=data.ideainfo.product_type;
       document.getElementById("idinstrument").innerHTML=data.ideainfo.instruments;
       document.getElementById("idmajsector").innerHTML=data.ideainfo.major_sector;
       document.getElementById("idminsector").innerHTML=data.ideainfo.minor_sector;
       document.getElementById("idregion").innerHTML=data.ideainfo.region;
       document.getElementById("idcountry").innerHTML=data.ideainfo.country;
       document.getElementById("idcontent").innerHTML=data.ideainfo.content;
       
       let sento= "<hr>No one yet";
       if (data.investedinfo.length>0){
            sento="<table class=\"table\"><thead ><tr class=\"text-center\"><th>Name</th><th>Decision</th></tr></thead><tbody>"
            for (let index = 0; index < data.investedinfo.length; index++) {
              sento+="<tr class=\"fixedhrows text-center\"><td>"+ data.investedinfo[index].name+"</td><td>"+ data.investedinfo[index].decision +"</td></tr>";
            }
            sento+="</tbody></table>";
        }
       document.getElementById("senttolist").innerHTML=sento;
       document.getElementById("sendideabutton").disabled = true;
       document.getElementById("ideaattr").value=data.ideainfo.idea_number;



       let notsentto="<select class=\"form-select\"disabled><option selected>Sent to every investor already</option></select>";
       if (data.notsentyet.length>0){
            notsentto="<select class=\"form-select\" name=\"rmsentidea\">";
            for (let index = 0; index < data.notsentyet.length; index++) {
              notsentto+="<option value=\""+ data.notsentyet[index].investor_id+"\">"+ data.notsentyet[index].investor_id +" - "+data.notsentyet[index].name+"</option>";
            }
            notsentto+="</select>";
            document.getElementById("sendideabutton").disabled = false;


        }

       document.getElementById("notyetsenttolist").innerHTML=notsentto;
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
       document.getElementById("inmodaltitle").innerHTML=data.investorinfo.name;
       document.getElementById("ineanum").innerHTML=data.investorinfo.investor_id;
       document.getElementById("ineaabstract").innerHTML=data.investorinfo.key_terms;
       document.getElementById("inexpy").innerHTML=data.investorinfo.expires_on;
       document.getElementById("inrisk").innerHTML=data.investorinfo.risk;
       document.getElementById("incurr").innerHTML=data.investorinfo.currency;
       document.getElementById("inprotype").innerHTML=data.investorinfo.product_type;
       document.getElementById("ininstrument").innerHTML=data.investorinfo.instruments;
       document.getElementById("inmajsector").innerHTML=data.investorinfo.major_sector;
       document.getElementById("inminsector").innerHTML=data.investorinfo.minor_sector;
       document.getElementById("inregion").innerHTML=data.investorinfo.region;
       document.getElementById("incountry").innerHTML=data.investorinfo.country;
       document.getElementById("incontent").innerHTML=data.investorinfo.preferences;
       let text= "<hr>No investments yet";
       if (data.investedinfo.length>0){
       text="<table class=\"table\"><thead ><tr class=\"text-center\"><th>Name</th><th>Decision</th></tr></thead><tbody>"
       for (let index = 0; index < data.investedinfo.length; index++) {
        const element = data.investedinfo[index];
              
        text+="<tr class=\"fixedhrows text-center\"><td>"+ data.investedinfo[index].idea_id+"</td><td>"+ data.investedinfo[index].decision +"</td></tr>";
        
       }
       text+="</tbody></table>";
      }
       document.getElementById("sentideaslist").innerHTML=text;

      }
        );
  
}

  </script>
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
    <style>

    table.mytable tr.fixedhrows{
   height: 10%;
    }
    </style>


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
        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
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
       console.log(document.getElementById("tester1").innerHTML);

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

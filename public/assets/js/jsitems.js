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



const rmdialoguboxes = ReactDOM.createRoot(document.getElementById('dialogboxes'));
rmdialoguboxes.render(<div><Ideacontent/><Investorcontent/><Rmsendboxcontent/></div>);



//-------modal head function---------
function Onerowtitle(props) {
  const { idtitle = '', idmess = '' } = props;
  return <div className="col-11 modal-title text-center" id={ ""+idtitle }> {idmess}</div>;
}
function Closebuttonsymbol(props){
  return <button className="btn-close col-1" data-bs-dismiss="modal" />;
}
//-------modal body function---------
function Onecolrowonlytext(props) {
  return <div className="row"><div className="col-12 h6 mb-0 fw-bold">{ props.displaytext } </div></div>;
}
function Onecolrowholder(props){
  return <div className="row">< Onecolrowheader displaytext={""+ props.rowhead }/><Onecolrowdata idtext={ "" +props.rowdata }/></div>;
}
function Onecolrowheader(props) {
  return <div className="col-2 h6 mb-0 fw-bold">{ props.displaytext } </div>;
}
function Onecolrowdata(props) {
  return <div className="col-10 text-secondary" id={ ""+props.idtext }> </div>;
}
function Twocolrowholder(props){
  return <div className="row">< Twocolrowheader displaytext={""+ props.leftrowhead }/><Twocolrowdata idtext={ "" +props.leftrowdata }/>< Twocolrowheader displaytext={ "" +props.rightrowhead }/><Twocolrowdata idtext={ "" +props.rightrowdata }/></div>;
}
function Twocolrowheader(props) {
  return <div className="col-2 h6 mb-0 fw-bold">{ props.displaytext } </div>;
}
function Twocolrowdata(props) {
  return <div className="col-4 text-secondary" id={ ""+props.idtext }> </div>;
}
//-------modal footer function---------
function Sendtobutton(props) {
  return <button className="btn btn-primary" data-bs-target="#sendidea" data-bs-toggle="modal" data-bs-dismiss="modal">Send to</button>;

}
function Closebutton(props){
return <button className="btn btn-danger" data-bs-dismiss="modal">Close</button>;

}

  //-------idea modal---------
function Ideacontent(props) {
  return  <div className="modal fade" id="openidea" ><div className="modal-dialog modal-dialog-centered modal-lg" ><div className="modal-content">
            <div className="modal-header h5 fw-bold "><Onerowtitle idtitle="idmodaltitle"/><Closebuttonsymbol/></div>
            <div className="modal-body" ><div className="container-fluid">
              <Twocolrowholder leftrowhead="IdeaNumber" leftrowdata="ideanum"  rightrowhead="Author" rightrowdata="idauthor" />
              <hr/>
              <Onecolrowholder rowhead="Abstract " rowdata="ideaabstract"  />
              <hr/>
              <Twocolrowholder leftrowhead="Published on" leftrowdata="idpub"  rightrowhead="Expires on" rightrowdata="idexpy" />
              <hr/>
              <Twocolrowholder leftrowhead="Risk" leftrowdata="idrisk"  rightrowhead="Currency" rightrowdata="idcurr" />
              <hr/>
              <Twocolrowholder leftrowhead="Product type" leftrowdata="idprotype"  rightrowhead="Instruments " rightrowdata="idinstrument" />
              <hr/>
              <Twocolrowholder leftrowhead="Major Sector " leftrowdata="idmajsector"  rightrowhead="Minor Sector " rightrowdata="idminsector" />
              <hr/>
              <Twocolrowholder leftrowhead="Region " leftrowdata="idregion"  rightrowhead="Countries" rightrowdata="idcountry" />
              <hr/>
              <Onecolrowholder rowhead="Content " rowdata="idcontent"  />
              <hr/>
              < Onecolrowonlytext displaytext="This idea was sent to:"/>
              <div id="senttolist"></div>
        </div></div>
          <div className="modal-footer" ><Sendtobutton/><Closebutton/></div>
          </div></div></div>;
}

 //-------investor modal---------
function Investorcontent(props) {

  return  <div className="modal fade" id="openinvestor" ><div className="modal-dialog modal-dialog-centered modal-lg" ><div className="modal-content">
            <div className="modal-header h5 fw-bold "><Onerowtitle idtitle="inmodaltitle"/><Closebuttonsymbol/></div>
            <Investorbody/>
            
  <div className="modal-footer" ><Closebutton/></div>
          </div></div></div>;
}
function Investorbody(props) {
  return <div className="modal-body" ><div className="container-fluid">
              <Twocolrowholder leftrowhead="Investor Number" leftrowdata="ineanum"  rightrowhead="Expires on" rightrowdata="inexpy" />
              <hr/>
              <Onecolrowholder rowhead="Key Interests " rowdata="ineaabstract"  />
              <hr/>
              <Twocolrowholder leftrowhead="Risk" leftrowdata="inrisk"  rightrowhead="Currency" rightrowdata="incurr" />
              <hr/>
              <Twocolrowholder leftrowhead="Product type" leftrowdata="inprotype"  rightrowhead="Instruments " rightrowdata="ininstrument" />
              <hr/>
              <Twocolrowholder leftrowhead="Major Sector " leftrowdata="inmajsector"  rightrowhead="Minor Sector " rightrowdata="inminsector" />
              <hr/>
              <Twocolrowholder leftrowhead="Region " leftrowdata="inregion"  rightrowhead="Countries" rightrowdata="incountry" />
              <hr/>
              <Onecolrowholder rowhead="Detailed  Preferences " rowdata="incontent"  />
              <hr/>
              < Onecolrowonlytext displaytext="The ideas sent to this investor were: "/>
              <div id="sentideaslist"></div>
        </div></div>;
}

 //-------sending idea rm modal---------
function Rmsendboxcontent(props) {
  return  <div className="modal fade" id="sendidea" ><div className="modal-dialog modal-dialog-centered" ><div className="modal-content">
            <div className="modal-header h5 fw-bold "><Onerowtitle idmess="Sending this Idea to"/><Closebuttonsymbol/></div>
            <div className="modal-body" >
            Sending the idea <div className="fw-bold" id="idmodaltitle2"></div> to <hr/>
            <form action="/sendidearm" method="post" id="ideasendrm">
              <input type="hidden" name="ideano" id="ideaattr" value="someValue"/>
              <div id="notyetsenttolist"></div>
            </form>
          </div>
          
          <div className="modal-footer" ><button className="btn btn-success" id="sendideabutton" type="submit" form="ideasendrm" value="submit" data-bs-dismiss="modal">Confirm</button>
  <button className="btn btn-primary" data-bs-target="#openidea" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button></div>
          </div></div></div>;
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

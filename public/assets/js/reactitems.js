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
  return  <div class="modal fade" id="openidea" ><div className="modal-dialog modal-dialog-centered modal-lg" ><div className="modal-content">
            <Ideaheader/>
            <Ideabody/>
            <Ideafooter/>
          </div></div></div>;
}
function Ideaheader(props){
  return <div className="modal-header h5 fw-bold "><Onerowtitle idtitle="idmodaltitle"/><Closebuttonsymbol/></div>;
}
function Ideabody(props) {
  return <div className="modal-body" ><div className="container-fluid">
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
        </div></div>;
  
}
function Ideafooter(props) {

  return <div className="modal-footer" ><Sendtobutton/><Closebutton/></div>;
}

 //-------investor modal---------
function Investorcontent(props) {

  return  <div class="modal fade" id="openinvestor" ><div className="modal-dialog modal-dialog-centered modal-lg" ><div className="modal-content">
            <Investorheader/>
            <Investorbody/>
            <Investorfooter/>
          </div></div></div>;
}
function Investorheader(props){
  return <div className="modal-header h5 fw-bold "><Onerowtitle idtitle="inmodaltitle"/><Closebuttonsymbol/></div>;
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
function Investorfooter(props) {

  return <div className="modal-footer" ><Closebutton/></div>;
  
}

 //-------sending idea rm modal---------
function Rmsendboxcontent(props) {
  return  <div class="modal fade" id="sendidea" ><div className="modal-dialog modal-dialog-centered" ><div className="modal-content">
            <Rmsendboxheader/>
            <Rmsendboxbody/>
            <Rmsendboxfooter/>
          </div></div></div>;
}
function Rmsendboxheader(props){
  return <div className="modal-header h5 fw-bold "><Onerowtitle idmess="Sending this Idea to"/><Closebuttonsymbol/></div>;
}
function Rmsendboxbody(props) {
  return <div className="modal-body" >
            Sending the idea <div class="fw-bold" id="idmodaltitle2"></div> to <hr/>
            <form action="/sendidearm" method="post" id="ideasendrm">
              <input type="hidden" name="ideano" id="ideaattr" value="someValue"/>
              <div id="notyetsenttolist"></div>
            </form>
          </div>;
  
}
function Rmsendboxfooter(props) {

  return <div className="modal-footer" ><button class="btn btn-success" id="sendideabutton" type="submit" form="ideasendrm" value="submit" data-bs-dismiss="modal">Confirm</button>
  <button class="btn btn-primary" data-bs-target="#openidea" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button></div>;
  
}
function showConfirm(mensaje) {
  Swal.fire({
    icon: "success",
    title: mensaje,
    showConfirmButton: false,
  });
}
function showError(mensaje) {
  Swal.fire({
    icon: "error",
    title: "Error",
    text: mensaje,
  });
}
function showModal(nameModal) {
  let cad = "#";
  cad += nameModal;

  $(cad).modal({
    keyboard: false,
    backdrop: false,
  });
  $(cad).modal("show");
}
function closeModal(nameModal) {
  let cad = "#";
  cad += nameModal;
  
 
  $(cad).modal("hide");
}
function limpiaModalIngreso(nameModal){
  
  var inputs=$(nameModal)
  for(var i=0; inputs.length;i++){
    inputs[i].value="";
  }

}
function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  };
}
function httpRequest_POST(url, fr, callback) {
  const http = new XMLHttpRequest();
  http.open("POST", url);
  http.send(fr);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  };
}

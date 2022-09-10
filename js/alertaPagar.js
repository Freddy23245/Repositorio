function Pagar(id){
    swal({
  title: "Desea realizar la compra?",
  text: "Estas a punto de pagar con MercadoPago",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha completado la compra", {
      icon: "success",
    });
  } else {
    swal("Se ha cancelado la compra");

  }
});
}
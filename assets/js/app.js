// app.js - smooth interactions: delete confirm + flash messages
document.addEventListener('DOMContentLoaded', function(){
  // handle delete buttons
  document.querySelectorAll('.js-delete').forEach(function(btn){
    btn.addEventListener('click', function(){
      const id = this.dataset.id;
      Swal.fire({
        title: 'Tem certeza?',
        text: 'Esta ação excluirá o produto permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar',
        customClass: { popup: 'swal2-soft' }
      }).then((result) => {
        if (result.isConfirmed) {
          // redirect to delete action (simple approach)
          window.location.href = 'index.php?action=delete&id=' + encodeURIComponent(id);
        }
      });
    });
  });

  // flash messages from PHP (success)
  const successEl = document.querySelector('.flash[data-success]');
  if (successEl) {
    const msg = successEl.getAttribute('data-success');
    Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2200,
      title: msg,
      icon: 'success'
    });
  }

  const errorsEl = document.querySelector('.flash[data-errors]');
  if (errorsEl) {
    try {
      const errs = JSON.parse(errorsEl.getAttribute('data-errors'));
      Swal.fire({
        title: 'Atenção',
        html: errs.map(e => '<div style="text-align:left;">• ' + e + '</div>').join(''),
        icon: 'error'
      });
    } catch(e){}
  }
});

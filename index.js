
var alert_form = document.getElementById('form');
var btn = document.getElementById('btn-enviar');

if (alert_form && btn != null) {
    alert_form.addEventListener('submit', function(event) {
      event.preventDefault();
      alert(`Magia cadastrado`);
      FormData.submit();

    });
};

console.log(alert_form && btn != null);


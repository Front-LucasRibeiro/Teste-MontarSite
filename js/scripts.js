function hideMessages() {
  setTimeout(function () {
    $('#divInfoSucesso').hide();
  }, 3000)

  setTimeout(function () {
    $('#divInfoErro').hide();
  }, 3000)
}

function validaForm() {
  $('.btn-cadastrar').on('click', function (e) {

    var nome = $('#nome').val().trim();
    var nomeCompleto = nome.split(' ');

    if (nome == '') {
      e.preventDefault();
      $('#msgCampoObrigatorio').show();
      $('#msgNomeCompleto').hide();
    } else if (nomeCompleto.length < 2) {
      e.preventDefault();
      $('#msgCampoObrigatorio').hide();
      $('#msgNomeCompleto').show();
    } else {
      $('#msgNomeCompleto').hide();
      $('#msgCampoObrigatorio').hide();
    }
  });
}

function checkDelete() {
  $('.btn-remover').on('click', function (e) {
    var resp = confirm('Deseja realmente excluir o registro?');

    if (!resp) {
      e.preventDefault();
    }
  })
}

function pesquisar() {
  
  $("#pesquisar").keyup(function () {
    var nomeFiltro = $(this).val().toLowerCase();

    $('table tbody').find('tr').each(function () {
      var conteudoCelula = $(this).find('td').text();
      var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
      $(this).css('display', corresponde ? '' : 'none');
    });
  });
}

$(document).ready(function () {
  validaForm();
  hideMessages();
  checkDelete();
  pesquisar();
})
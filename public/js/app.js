function reorderInputs() {
  $('#answers-fields .form-group').each(function(e) {
    $(this).find(':input').each(function() {
      $this = $(this)

      $name = "answers[" + e + "][" + $this.attr('id') + "]"

      if ($this.is('select')) {
        $name += "[]"
      }

      $this.attr('name', $name)

    })
  })
}

var $template = $('#answer-tmt').html();

if (window.location.pathname.split('/').pop() != 'edit') {
  $('#answers-fields').append($template)
}

reorderInputs()

$('#new-answer').click(function(e) {
  e.preventDefault()
  $('#answers-fields').append($template)
  reorderInputs()
})

$('#answers-fields').on('click', '.remove-answer', function(e) {
  e.preventDefault()

  $this = $(this)

  if ($('.remove-answer').length < 2) {
    alert('Minimum of one answer for each question')
    return false
  }

  var id = $this.parent().find('#id').val()

  if (id != undefined) {
    $('<input>').attr({
      type: 'hidden',
      name: 'to_delete[]',
      value: id
    }).appendTo('form');
  }

  $this.parent().fadeOut().remove()
})

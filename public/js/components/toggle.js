$('input.status-toggle').on('change', function() {
  let $input = $(this);

  $.ajax({
    url: $input.attr('data-url'),
    type: 'PATCH',
    success: function(response) {
      console.log(response.status);
    },
    error: function(xhr,status,error) {
      alert('Something went wrong: ' + error);
    }
  });
});
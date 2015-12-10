$('#city-list').change(function(){
  var selectedValue = $('#city-list').val();
  var value = $('#city-list option:selected').text();
  //Ajax call to fetch movies
  $.ajax({
    type:"POST",
    url:"scripts/fetchMovieScript.php",
    data: {city:value},
    success: function(data){
      $('#movie-list').html(data);
      $('#movie-list').css('display', '');
    }
  });
});

$('#movies').change(function(){
  window.alert("alert");
  var selectedMovie = $('#movies').text();

  //Ajax call to fetch theater
  $.ajax({
    type:"POST",
    url:"scripts/fetchTheatersScripts.php",
    data: {movie: selectedMovie},
    success: function(data){
      $('#theater-list').html(data);
      $('#theater-list').css('display', '');
    }
  });
});

//Movie Choosen
function movieChanged(){
  var selectedMovie = $('#movies option:selected').text();
  //Ajax call to fetch theater
  $.ajax({
    type:"POST",
    url:"scripts/fetchTheatersScript.php",
    data: {movie: selectedMovie},
    success: function(data){
      $('#theatre-list').html(data);
      $('#theatre-list').css('display', '');
    }
  });
}

//Theatre Choosen
function theatreChanged(){
  var selcetedTheatre = $('#theatres option:selected').text();

  //Ajax call to fetch shows
  $.ajax({
    type:"POST",
    url:"scripts/fetchTheatersScript.php",
    data: {theatre: selcetedTheatre},
    success: function(data){
      $('#shows-list').html(data);
      $('#shows-list').css('display', '');
    }
  });
}

//Bookings History
$('#booking-history').click(function(){
  //Ajax call to fetch booking hostory
  getBookingHistory();
});

function getBookingHistory(){

  $.ajax({
    type:"POST",
    url:"scripts/fetchTheatersScript.php",
    data: {bookings: "true"},
    success: function(data){
      $('#history').html(data);
      $('#history').css('display', '');
      $('#bookings').css('display', 'none');
    }
  });

}

function cancelTicket(){

  var bookingId = $('input[name=selectedBooking]:checked').val();
  $.ajax({
    type:"POST",
    url:"scripts/fetchTheatersScript.php",
    data: {cancelId: bookingId},
    success: function(data){
      window.alert("I'm sorry you wont get your money back :P Just kidding your booking is camcelled!");
      getBookingHistory();
    }
  });
}

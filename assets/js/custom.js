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

function changed(){
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

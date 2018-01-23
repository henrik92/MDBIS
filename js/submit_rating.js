$(document).ready(
        function submitrating()
        {
            $('#movie_rating').on('submit', function (e) {
                e.preventDefault();

                var title = $('#mov_title').val();
                
                var user_rating = $('#mov_rating').val();
                var current_rating = $('#rating_score').val();
                var counter = $('#rating_counter').val();
                var rank = $('#rating_rank').val();
                

                $.ajax({
                    type: 'post',
                    url: 'src/processor/process_rating.php',
                    data: {
                        movie_title: title,
                        movie_user_rating: user_rating, 
                        movie_rank: rank, 
                        movie_counter: counter,
                        movie_current_rating: current_rating
                    },
                    success: function (response) {
                       /* if (response.search(/success/) !== -1)*/
                     if (response === "success"){
                            $('#result').html("Success!");
                        } else if (response === "invalid"){
                             $('#result').html("No valid input"); 
                        } else {
                            $('#result').html("No Input"+response);
                        }
                    }
                });
            });
        });
$(document).ready(
        function submitrating()
        {
            $('#movie_rating').on('submit', function (e) {
                e.preventDefault();

                var title = $('#mov_title').val();
                var rating = $('#mov_rating').val();

                $.ajax({
                    type: 'post',
                    url: 'js/search_submit_rating.php',
                    data: {
                        movie_title: title,
                        movie_rating: rating
                    },
                    success: function (response) {
                     if (response.search(/success/) !== -1){
                            $('#result').html("Success!");
                        } else if (response === "invalid"){
                             $('#result').html("No valid input"); 
                        } else {
                            $('#result').html("No Input");
                        }
                        /*else if (response === "invalid") {
                            $('#result').html("Your input is not a number");
                        } else if (response === "none") {
                            $('#result').html("No rating set.");

                        }*/
                    }
                });
            });
        });
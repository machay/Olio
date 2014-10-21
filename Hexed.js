
//And here, our grand function begins, using some elements from SimpleColorPickerUI, a jQuery application/module library
//that included many of the elements needed for our implementation.
(function ($) {
    $.fn.extend({
      //Initialize default settings
        hexed: function (options) {
          var defaults = {
            turns: 10,
            difficulty: 5
          }; 
          //Create the options container infrastructure
          var options = $.extend(defaults, options);
          return this.each(function() {
              
              //Game variable initialization
              var inprogress = false;
              var guessedit = false;
              var turns, score, r, g, b, start;
              var diff = options.difficulty;
              
              
              //HTML Construction Zone
              //Slider elements
              $(this).append('<section id="sliders"></section>');
              $('#sliders').append('<figure id="redSlider"></figure>');
              $('#sliders').append('<figure id="greenSlider"></figure>');
              $('#sliders').append('<figure id="blueSlider"></figure>');
              
              //hexValue elements
              $(this).append('<form id="hexValues"></form>');
              $('#hexValues').append('<input type="text" id="redValue">');
              $('#hexValues').append('<input type="text" id="greenValue">');
              $('#hexValues').append('<input type="text" id="blueValue">');
              
              //Buttons: start, guess, and next
              $(this).append('<section id="buttons"></section>');
              $('#buttons').append('<button type="button" id="start">Start Game</button>');
              $('#buttons').append('<button type="button" id="guess">Got It!</button>');
              $('#buttons').append('<button type="button" id="next">Next</button>');
              
              //Settings: turns and difficulty
              $(this).append('<section id="settings"></section>');
              $('#settings').append('<label for="turns">Number of turns: </label>');
              $('#settings').append('<input type="text" id="turns" min="0" value="' + options.turns + '">');
              $('#settings').append('<label for="difficulty">Difficulty (1 - 10): </label>');
              $('#settings').append('<input type="text" id="difficulty" min="0" max="10" value="' + options.difficulty + '">');
              
              //Swatch elements: User swatch on left, desired swatch on right
              $(this).append('<figure id="swatch"></figure>');
              $('#swatch').append('<figure id="myswatch"></figure>');
              $('#twoswatch').hide();
              
              //Results element
              $(this).append('<section id="results"></section>');
              $('#results').append('<p id="score"></p>');
              $('#results').append('<br><button type="button" id="again">Play Again??</button>');
              //Keeping the ''Play Again?'?' option hidden until the user finishes their game
              $('#again').hide();
              $('#results').append('<p id="percents"></p>');
              
              //Hex and color functions
              //Changes RGB to hex value. Directly from SimpleColorPicker UI
              function hexFromRGB(r, g, b) {
                var hex = [
                  r.toString(16),
                  g.toString(16),
                  b.toString(16)
                ];
                $.each(hex, function(nr, val) {
                  if (val.length === 1) {
                    hex[nr] = "0" + val;
                  }
                });
                return hex.join( "" ).toUpperCase();
              }
              
              //Shows user's swatch color. Directly from SimpleColorPicker UI
              function showSwatch() {
                var red = $("#redSlider").slider("value"),
                  green = $("#greenSlider").slider("value"),
                  blue = $("#blueSlider").slider("value"),
                  hex = hexFromRGB( red, green, blue );
                $("#myswatch").css("background-color", "#" + hex);
              }
              
              //Will update the hex values in textboxes when slider is changed.
              //Based off of SimpleColorPicker UI
              function hexRefresh() {
                if (inprogress === false) {
                  return;
                }
                var red = $( "#redSlider" ).slider( "value" ),
                    green = $( "#greenSlider" ).slider( "value" ),
                    blue = $( "#blueSlider" ).slider( "value" );
                var hex = [
                  red.toString(16),
                  green.toString(16),
                  blue.toString(16)
                ];
                $.each( hex, function( nr, val ) {
                  if ( val.length === 1 ) {
                    hex[nr] = "0" + val;
                  }
                showSwatch(); //We spent an hour here because we forgot that one update function call -.-
                });
                $("#redValue").val(hex[0].toUpperCase());
                $("#greenValue").val(hex[1].toUpperCase());
                $("#blueValue").val(hex[2].toUpperCase());
              }
              
              //Variation on SimpleColorPicker UI's refreshSwatch to generate random swatch
              function randomSwatch() {
                var red = Math.floor( (Math.random()*255) + 1 ),
                    green = Math.floor( (Math.random()*255) + 1 ),
                    blue = Math.floor( (Math.random()*255) + 1 );
                var hex = hexFromRGB (red, green, blue);
                $("#swatch").css("background-color", "#" + hex);
                r = red;
                g = green;
                b = blue;
                //User's swatch will be black (hex value #000000) until a slider is moved
                hex = hexFromRGB (r, g, b);
                $("#myswatch").css("background-color", "#00000");
                return;
              }
              
              
              //Slider Building Zone!
              //Creates the sliders and includes hexRefresh to update hex Values
              $('#redSlider, #greenSlider, #blueSlider').slider({
                  orientation: "vertical",
                  range: "min",
                  max: 255,
                  value: 0,
                  create: hexRefresh,
                  slide: hexRefresh,
                  change: hexRefresh
              });
              
              //Updates the sliders to reflect changes in textboxes
              $('#redValue').change(function() {
                  var value = this.value;
                  if (value === "") {
                    value = 0;
                  }
                  $("#redSlider").slider("value", parseInt(value, 16));
              });
              $('#greenValue').change(function() {
                  var value = this.value;
                  if (value === "") {
                    value = 0;
                  }
                  $("#greenSlider").slider("value", parseInt(value, 16));
              });
              $('#blueValue').change(function() {
                  var value = this.value;
                  if (value === "") {
                    value = 0;
                  }
                  $("#blueSlider").slider("value", parseInt(value, 16));
              });
              
              //Reset sliders to 0
              function resetSliders() {
                $('#redSlider').slider("value", 0);
                $('#greenSlider').slider("value", 0);
                $('#blueSlider').slider("value", 0);
                
              }
              
              
              //Updates the score and returns percentages
              function updateScore(milliseconds_taken) {
                if (milliseconds_taken == -1) {
                  $('#score').html("Score: " + score);
                  return [-1, -1, -1];
                }
                else {
                  var absRed = (Math.abs(r - $('#redSlider').slider("value")) / 255) * 100;
                  var absGreen = (Math.abs(g - $('#greenSlider').slider("value")) / 255) * 100;
                  var absBlue = (Math.abs(b - $('#blueSlider').slider("value")) / 255) * 100;
                  var percent_off = (absRed + absGreen + absBlue) / 3;
                  
                  var ratio = (15 - diff - percent_off)/(15 - diff);
                  var difference = 15000 - milliseconds_taken;
                  var thisScore = Math.floor( ratio * difference );
                  if (ratio < 0 || difference < 0 || thisScore < 0) {
                    thisScore = 0;
                  }
                  score = thisScore + score;
                  $('#score').html('Score: ' + score);
                  $('#score').append('<br>You just earned ' + thisScore + ' for this round!');
                  return [absRed, absGreen, absBlue];
                }
              }
              
              //Displays final score and shows the ''Play Again?'?' button
              function finalScore() {
                $('#score').html('Final Score: ' + score);
                $('#again').show();
                $('#percents').html('');
              }
              
              //Button Functionality Implementation

              //When the 'Play Again?' button is clicked, we alert the user to avoid confusion/ambiguity
              //and push the start button for them
              $('#again').click(function() {
                  $('#start').click();
                  alert('New game started!');
              });

              //When clicked, the start function initializes a new game
              $('#start').click(function() {
                  inprogress = true;
                  guessedit = false;
                  resetSliders();
                  turns = options.turns;
                  $('#turns').val(turns);
                  diff = $('#difficulty').val();
                  score = 0;
                  updateScore(-1);
                  $('#percents').html('');
                  $('#oneswatch').show();
                  $('#twoswatch').hide();
                  start = new Date().getTime();
                  //creates new hex color swatch
                  randomSwatch();
                  showSwatch();
                  //hides 'Play Again?' button in case it was not hidden
                  $('#again').hide();
              });
              
              //When clicked, the guess function updates user's score
              $('#guess').click(function() {
                  //Check to make sure game is running and user did not already guess once
                  if (inprogress && (guessedit === false)) {
                    var milliseconds_taken = new Date().getTime() - start;
                    var a = updateScore(milliseconds_taken);
                    $('#percents').html('Percent off for red: ' + a[0]);
                    $('#percents').append('%<br>Percent off for green: ' + a[1]);
                    $('#percents').append('%<br>Percent off for blue: ' + a[2] + '%');
                    guessedit = true;
                    showSwatch();
                    $('#oneswatch').hide();
                    $('#twoswatch').show();
                  }
              });
              $('#next').click(function() {
                  //if game is in progress and player guessed current swatch
                  if (inprogress && guessedit) {
                    turns = turns - 1;
                    $('#turns').val(turns);
                    resetSliders();
                    if (turns === 0) {
                      inprogress = false;
                      finalScore();
                      return;
                    }
                    $('#score').html('Score: ' + score);
                    $('#percents').html('');
                    start = new Date().getTime();
                    hexRefresh();
                    randomSwatch();
                    guessedit = false;
                    $('#oneswatch').show();
                    $('#twoswatch').hide();
                  }
              });
          });
        }
    });
})( jQuery ); //All done with this mondo function!

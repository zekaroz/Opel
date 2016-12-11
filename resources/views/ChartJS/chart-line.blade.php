@include('autoload::autoload')

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    /**
     * This function is responsible for loading the window.load and instantiate our chart.
     * The parameters of data and options are passed directly to avoid conflict with the
     * variable names when using more than one report.
     */
    addLoadEvent(function() {
        var label = []; // graphic label array
        var infor = []; // graphic data array

        // incremeting labels array
        <?php foreach($labels as $label): ?>
        label.push("<?php echo $label; ?>");
        <?php endforeach; ?>

        var <?php echo $element; ?> = document.getElementById("<?php echo $element; ?>").getContext("2d");

        var options={
              	//Boolean - If we show the scale above the chart data
              	scaleOverlay : false,

              	//Boolean - If we want to override with a hard coded scale
              	scaleOverride : false,

              	//** Required if scaleOverride is true **
              	//Number - The number of steps in a hard coded scale
              	scaleSteps : 1,
              	//Number - The value jump in the hard coded scale
              	scaleStepWidth : 0,
              	//Number - The scale starting value
              	scaleStartValue : 1,
              	//String - Colour of the scale line
              	scaleLineColor : "rgba(20,20,20,.7)",

              	//Number - Pixel width of the scale line
              	scaleLineWidth : 1,

              	//Boolean - Whether to show labels on the scale
              	scaleShowLabels : true,

              	//Interpolated JS string - can access value
              	scaleLabel : "<%=value%>",

              	//String - Scale label font declaration for the scale label
              	scaleFontFamily : "'Arial'",

              	//Number - Scale label font size in pixels
              	scaleFontSize : 12,

              	//String - Scale label font weight style
              	scaleFontStyle : "normal",

              	//String - Scale label font colour
              	scaleFontColor : "#666",

              	///Boolean - Whether grid lines are shown across the chart
              	scaleShowGridLines : false,

              	//String - Colour of the grid lines
              	scaleGridLineColor : "rgba(0,0,0,.3)",

              	//Number - Width of the grid lines
              	scaleGridLineWidth : 1,

              	//Boolean - Whether the line is curved between points
              	bezierCurve : true,

              	//Boolean - Whether to show a dot for each point
              	pointDot : true,

              	//Number - Radius of each point dot in pixels
              	pointDotRadius : 5,

              	//Number - Pixel width of point dot stroke
              	pointDotStrokeWidth : 1,

              	//Boolean - Whether to show a stroke for datasets
              	datasetStroke : true,

              	//Number - Pixel width of dataset stroke
              	datasetStrokeWidth : 2,

              	//Boolean - Whether to fill the dataset with a colour
              	datasetFill : true,

              	//Boolean - Whether to animate the chart
              	animation : false,

              	//Number - Number of animation steps
              	animationSteps : 60,

              	//String - Animation easing effect
              	animationEasing : "easeOutQuart",

              	//Function - Fires when the animation is complete
              	onAnimationComplete : function(){ },

                responsive: true
              };

        window.myLine = new Chart(<?php echo $element; ?>).Line(
                    // ---------------------------------------------------------------
                    // Data sections
                    // ---------------------------------------------------------------
                    {
                    labels: label,
                    datasets:
                            [
                                <?php
                                $i = 0; // responsible for iteration
                                foreach($dataset as $dado):
                                    echo '{';
                                ?>

                                    label: "<?php echo $legends[$i]; ?>",
                                    fillColor: "<?php echo $colours[$i]; ?>",
                                    strokeColor: "<?php echo $colours[$i]; ?>",
                                    pointColor: "<?php echo $colours[$i]; ?>",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "<?php echo $colours[$i]; ?>",
                                    data : [<?php echo $dado; ?>]

                                    <?php
                                    ($i+1) == $qtdDatasets ? print '}' : print '}, ';
                                    $i++;
                                endforeach;
                                ?>
                            ]
                    },
                    // End data section

                    // ---------------------------------------------------------------
                    // Options section
                    // ---------------------------------------------------------------
                    options);
                    var legendHolder= document.getElementById('js-legend-line_<?php echo $element; ?>');

                    if(legendHolder)
                        legendHolder.innerHTML = myLine.generateLegend();
                    // End options section

    });
</script>

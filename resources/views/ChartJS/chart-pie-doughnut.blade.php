@include('autoload::autoload')

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    addLoadEvent(function() {
        var <?php echo $element; ?> = document.getElementById("<?php echo $element; ?>").getContext("2d");

        var type = '<?php echo $type; ?>';

        var options = {
               segmentShowStroke : true,
               segmentStrokeColor : "#fff",
               segmentStrokeWidth : 2,
               percentageInnerCutout : type=='Pie'? 0: 80,
               animation : true,
               animationSteps : 100,
               animationEasing : "easeInOutCubic",
               animateRotate : true,
               animateScale : false,
               onAnimationComplete :  function(){},
               labelFontFamily : "Arial",
               labelFontStyle : "normal",
               labelFontSize : 24,
               labelFontColor : "#666",
               responsive: true
        };

        var PizzaChart = new Chart(<?php echo $element; ?>).<?php echo $type; ?>(

                    // ---------------------------------------------------------------
                    // Data sections
                    // ---------------------------------------------------------------
                    [
                            <?php
                                $i = 0; // responsible for iteration
                                foreach($data as $label => $d):
                                    echo '{';
                            ?>
                                value: <?php echo $d['value']; ?>,
                                color:"<?php echo $d['colour']; ?>",
                                highlight: "<?php echo $d['highlight']; ?>",
                                label: "<?php echo $d['label']; ?>"

                            <?php
                              ($i+1) == $qtdData ? print '}' : print '},';
                              $i++;
                              endforeach;
                            ?>
                        ],
                        // End data section
                    // ---------------------------------------------------------------
                    // Options section
                    // ---------------------------------------------------------------
                      options
                );
                // End options section
                console.log(PizzaChart);
                var legendHolder = document.getElementById('js-legend-pie_<?php echo $element; ?>');

                if(legendHolder)
                    legendHolder.innerHTML = PizzaChart.generateLegend();
    });
</script>

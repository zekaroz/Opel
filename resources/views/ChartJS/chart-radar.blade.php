@include('autoload::autoload')

<!--suppress BadExpressionStatementJS -->
<script type="text/javascript">

    var label = []; // graphic label array
    var infor = []; // graphic data array

    // incremeting labels array
    <?php foreach($labels as $label): ?>
        label.push("<?php echo $label; ?>");
    <?php endforeach; ?>


    /**
     * This function is responsible for loading the window.load and instantiate our chart.
     * The parameters of data and options are passed directly to avoid conflict with the
     * variable names when using more than one report.
     */
    addLoadEvent(function() {
        var <?php echo $element; ?> = document.getElementById("<?php echo $element; ?>").getContext("2d");

        var options = {
           scaleOverlay : false,
           scaleOverride : false,
           scaleSteps : null,
           scaleStepWidth : null,
           scaleStartValue : null,
           scaleShowLine : true,
           scaleLineColor : "rgba(0,0,0,.1)",
           scaleLineWidth : 1,
           scaleShowLabels : false,
           scaleLabel : "<%=value%>",
           scaleFontFamily : "'Arial'",
           scaleFontSize : 12,
           scaleFontStyle : "normal",
           scaleFontColor : "#666",
           scaleShowLabelBackdrop : true,
           scaleBackdropColor : "rgba(255,255,255,0.75)",
           scaleBackdropPaddingY : 2,
           scaleBackdropPaddingX : 2,
           angleShowLineOut : true,
           angleLineColor : "rgba(0,0,0,.1)",
           angleLineWidth : 1,
           pointLabelFontFamily : "'Arial'",
           pointLabelFontStyle : "normal",
           pointLabelFontSize : 12,
           pointLabelFontColor : "#666",
           pointDot : true,
           pointDotRadius : 3,
           pointDotStrokeWidth : 1,
           datasetStroke : true,
           datasetStrokeWidth : 2,
           datasetFill : true,
           animation : true,
           animationSteps : 60,
           animationEasing : "easeOutQuart",
           onAnimationComplete : null,
           responsive: true
        };

        window.myRadar = new Chart(<?php echo $element; ?>).Radar(
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

                    var legendHolder = document.getElementById('js-legend-radar_<?php echo $element; ?>');

                    if(legendHolder)
                        legendHolder.innerHTML = myRadar.generateLegend();
                    // End options section

    });
</script>

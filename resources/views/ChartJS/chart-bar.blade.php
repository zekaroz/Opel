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

        var options = {
          scaleOverlay : false,
          scaleOverride : false,
          scaleSteps : null,
          scaleStepWidth : null,
          scaleStartValue : null,
          scaleLineColor : "rgba(0,0,0,.1)",
          scaleLineWidth : 1,
          scaleShowLabels : true,
          scaleLabel : "<%=value%>",
          scaleFontFamily : "'Arial'",
          scaleFontSize : 12,
          scaleFontStyle : "normal",
          scaleFontColor : "#666",
          scaleShowGridLines : true,
          scaleGridLineColor : "rgba(0,0,0,.05)",
          scaleGridLineWidth : 1,
          barShowStroke : true,
          barStrokeWidth : 2,
          barValueSpacing : 5,
          barDatasetSpacing : 1,
          animation : true,
          animationSteps : 60,
          animationEasing : "easeOutQuart",
          onAnimationComplete : function(){} ,
          responsive: true
        };

        var dataSet = [
                  <?php
                  $i = 0; // responsible for iteration
                  foreach($dataset as $dado):
                      echo '{';
                  ?>

                      label: "<?php echo $legends[$i]; ?>",
                      fillColor: "<?php echo $colours[$i]; ?>",
                      strokeColor: "<?php echo $colours[$i]; ?>",
                      highlightFill: "<?php echo $colours[$i]; ?>",
                      highlightStroke: "<?php echo $colours[$i]; ?>",
                      data : [<?php echo $dado; ?>]

                      <?php
                      ($i+1) == $qtdDatasets ? print '}' : print '}, ';
                      $i++;
                  endforeach;
                  ?>
              ];

        window.myBar = new Chart(<?php echo $element; ?>).Bar({
                                                                labels: label,
                                                                datasets:dataSet
                                                              },
                                                              options);

        var legendHolder = document.getElementById('js-legend-bar_<?php echo $element; ?>');

        if(legendHolder)
            legendHolder.innerHTML = myBar.generateLegend();
        // End options section

    });
</script>

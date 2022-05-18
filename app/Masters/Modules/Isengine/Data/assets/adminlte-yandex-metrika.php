<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view->get('display')->addBuffer("
<script>
$(function () {
  'use strict'
");

// month

$n = 2592000;
$a = [];
while ($n > 0) {
	$a[] = date('d.m', time() - $n);
	$n -= 86400;
}

$view->get('display')->addBuffer("
  // Get context with jQuery - using jQuery's .get() method.
  var monthlyChartCanvas = $('#monthlyChart').get(0).getContext('2d')

  var monthlyChartData = {
    labels: ['" . Strings::join($a, "','") . "'],
    datasets: jQuery.parseJSON( $('#monthlyChartData').text() )
  }

  var monthlyChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var monthlyChart = new Chart(monthlyChartCanvas, {
    type: 'line',
    data: monthlyChartData,
    options: monthlyChartOptions
  }
  )
");

// year

$n = 31104000; // year
$a = [];
while ($n > 0) {
	$a[] = date('m.Y', time() - $n);
	$n -= 2592000; //month
}

$view->get('display')->addBuffer("
  // Get context with jQuery - using jQuery's .get() method.
  var yearlyChartCanvas = $('#yearlyChart').get(0).getContext('2d')

  var yearlyChartData = {
    labels: ['" . Strings::join($a, "','") . "'],
    datasets: jQuery.parseJSON( $('#yearlyChartData').text() )
  }

  var yearlyChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var yearlyChart = new Chart(yearlyChartCanvas, {
    type: 'line',
    data: yearlyChartData,
    options: yearlyChartOptions
  }
  )
");

$view->get('display')->addBuffer("
})
</script>
");
?>
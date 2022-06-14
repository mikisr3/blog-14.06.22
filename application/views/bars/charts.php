
	
		<div class="col-md-12">


                    	<div class="mt-3 ml-5">
                    		<?php 


                    	echo form_open('bars');
            $options = array(
                            
                             '01' => 'January',
                             '02' => 'February',
                             '03' => 'March',
                             '04' => 'April',
                             '05' => 'May',
                             '06' => 'June',
                             '07' => 'July',
                             '08' => 'August',
                             '09' => 'September',
                             '10' => 'October',
                             '11' => 'November',
                             '12' => 'December'

                         );
            echo '<div class="d-inline">'.form_dropdown('sel',$options,$option_selected,'class = "select"','id = "myselect"').'</div>';
            echo '<div class="d-inline">'.form_submit('submit','GO','class="x"').'</div>';






                    	 ?>
                    	</div>

			<div id="chartdiv" style="width:100%; height: 500px;"></div>
		
		    <div id="chartdiv" style="width:100%; height: 500px;"></div>

		</div>

		<script type = "text/javascript">
		 var jsonfile = JSON.parse(`<?php echo $json; ?>`);

		 var posts_per_month = JSON.parse(`<?php echo $json_post_month; ?>`);

		 //console.log(posts_per_month);

			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "created_at",
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[created_at]]:[[value]]",
							
							"fillAlphas":1,
							"lineAlpha":1,
							"gridAlpha":1,
							"id": "AmGraph-1",
							"title": "graph 1",
							"type":"column",
							"valueField": "total"
						}
						
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Posts Created"

							
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": false,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Posts Created : ".concat(posts_per_month)
						}
					],
					"dataProvider": jsonfile
						
						
					
				}
			);
		

				
            
		</script>		

		